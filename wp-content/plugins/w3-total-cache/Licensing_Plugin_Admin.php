<?php
namespace W3TC;

class Licensing_Plugin_Admin {
	private $site_inactivated = false;
	private $site_activated = true;
	/**
	 * Config
	 */
	private $_config = null;

	function __construct() {
		$this->_config = Dispatcher::config();
		$state = Dispatcher::config_state();
		$state->set( 'license.status', 'active' );  // host_valid
		$state->set( 'license.next_check', strtotime('+1200 days') + $check_timeout );
		$state->set( 'license.terms', true );
		$state->save();
	}

	/**
	 * Runs plugin
	 */
	function run() {
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'wp_ajax_w3tc_verify_plugin_license_key', array( $this, 'action_verify_plugin_license_key' ) );
		add_action( "w3tc_config_ui_save-w3tc_general", array( $this, 'possible_state_change' ), 2, 10 );

		add_action( 'w3tc_message_action_licensing_upgrade',
			array( $this, 'w3tc_message_action_licensing_upgrade' ) );

		add_filter( 'w3tc_admin_bar_menu', array( $this, 'w3tc_admin_bar_menu' ) );
	}



	public function w3tc_admin_bar_menu( $menu_items ) {
		if ( !Util_Environment::is_w3tc_pro( $this->_config ) ) {
			$menu_items['00020.licensing'] = array(
				'id' => 'w3tc_overlay_upgrade',
				'parent' => 'w3tc',
				'title' => __(
					'<span style="color: red; background: none;">Upgrade Performance</span>',
					'w3-total-cache'
				),
				'href' => wp_nonce_url( network_admin_url(
						'admin.php?page=w3tc_dashboard&amp;' .
						'w3tc_message_action=licensing_upgrade' ), 'w3tc' )
			);
		}

		if ( defined( 'W3TC_DEBUG' ) && W3TC_DEBUG ) {
			$menu_items['90040.licensing'] = array(
				'id' => 'w3tc_debug_overlay_upgrade',
				'parent' => 'w3tc_debug_overlays',
				'title' => __( 'Upgrade', 'w3-total-cache' ),
				'href' => wp_nonce_url( network_admin_url(
						'admin.php?page=w3tc_dashboard&amp;' .
						'w3tc_message_action=licensing_upgrade' ), 'w3tc' )
			);
		}

		return $menu_items;
	}

	public function w3tc_message_action_licensing_upgrade() {
		add_action( 'admin_head', array( $this, 'admin_head_licensing_upgrade' ) );
	}

	public function admin_head_licensing_upgrade() {
?>
		<script type="text/javascript">
		jQuery(function() {
			w3tc_lightbox_upgrade(w3tc_nonce, 'topbar_performance');
			jQuery('#w3tc-license-instruction').show();
		});
		   </script>
		<?php
	}

	/**
	 *
	 *
	 * @param Config  $config
	 * @param Config  $old_config
	 */
	function possible_state_change( $config, $old_config ) {
		$changed = false;
		$this->site_activated = true;
		$changed = true;
		$state = Dispatcher::config_state();
		$state->set( 'license.next_check', 0 );
		$state->save();
	}

	/**
	 * Setup notices actions
	 */
	function admin_init() {
		$capability = apply_filters( 'w3tc_capability_admin_notices',
			'manage_options' );

		$this->maybe_update_license_status();

		if ( current_user_can( $capability ) ) {
			if ( is_admin() ) {
				/**
				 * Only admin can see W3TC notices and errors
				 */
				if ( !Util_Environment::is_wpmu() ) {
					add_action( 'admin_notices', array(
							$this,
							'admin_notices'
						), 1, 1 );
				}
				add_action( 'network_admin_notices', array(
						$this,
						'admin_notices'
					), 1, 1 );

				if ( Util_Admin::is_w3tc_admin_page() ) {
					add_filter( 'w3tc_notes', array( $this, 'w3tc_notes' ) );
				}
			}
		}
	}

	private function _status_is( $s, $starts_with ) {
		$s .= '.';
		$starts_with .= '.';
		return substr( $s, 0, strlen( $starts_with ) ) == $starts_with;
	}



	/**
	 * Run license status check and display messages
	 */
	function admin_notices() {
		$message = '';

		$state = Dispatcher::config_state();
		$status = 'active';

		if ( defined( 'W3TC_PRO' ) ) {
		} elseif ( $status == 'no_key' ) {
		} elseif ( $this->_status_is( $status, 'inactive.expired' ) ) {
			$message = sprintf( __( 'It looks like your W3 Total Cache Pro License has expired. %s to continue using the Pro Features', 'w3-total-cache' ),
				'<input type="button" class="button-primary button-buy-plugin"' .
				' data-nonce="'. wp_create_nonce( 'w3tc' ) . '"' .
				' data-renew-key="' . esc_attr( $this->get_license_key() ) . '"' .
				' data-src="licensing_expired" value="'.__( 'Renew Now', 'w3-total-cache' ) . '" />' );
		} elseif ( $this->_status_is( $status, 'invalid' ) ) {
			$message = __( 'The W3 Total Cache license key you entered is not valid.', 'w3-total-cache' ) .
				'<a href="' . ( is_network_admin() ? network_admin_url( 'admin.php?page=w3tc_general#licensing' ):
				admin_url( 'admin.php?page=w3tc_general#licensing' ) ) . '"> ' . __( 'Please enter it again.', 'w3-total-cache' ) . '</a>';
		} elseif ( $this->_status_is( $status, 'inactive.by_rooturi.activations_limit_not_reached' ) ) {
			$message = __( 'The W3 Total Cache license key is not active for this site.', 'w3-total-cache' );
		} elseif ( $this->_status_is( $status, 'inactive.by_rooturi' ) ) {
			$message = __( 'The W3 Total Cache license key is not active for this site. ', 'w3-total-cache' ) .
				sprintf(
				__( 'You can switch your license to this website following <a class="w3tc_licensing_reset_rooturi" href="%s">this link</a>', 'w3-total-cache' ),
				Util_Ui::url( array( 'page' => 'w3tc_general', 'w3tc_licensing_reset_rooturi' => 'y' ) )
			);
		} elseif ( $this->_status_is( $status, 'inactive' ) ) {
			$message = __( 'The W3 Total Cache license key is not active.', 'w3-total-cache' );
		} elseif ( $this->_status_is( $status, 'active' ) ) {
		} else {
			$message = __( 'The W3 Total Cache license key can\'t be verified.', 'w3-total-cache' );
		}

		if ( $message ) {
			if ( !Util_Admin::is_w3tc_admin_page() ) {
				echo '<script src="' . plugins_url( 'pub/js/lightbox.js', W3TC_FILE ) . '"></script>';
				echo '<link rel="stylesheet" id="w3tc-lightbox-css"  href="' . plugins_url( 'pub/css/lightbox.css', W3TC_FILE ) . '" type="text/css" media="all" />';
			}

			Util_Ui::error_box( sprintf( "<p>$message. <a class='w3tc_licensing_check' href='%s'>" . __( 'check license status again' ) . '</a></p>',
					Util_Ui::url( array( 'page' => 'w3tc_general', 'w3tc_licensing_check_key' => 'y' ) ) )
			);
		}

	}



	function w3tc_notes( $notes ) {
		$terms = '';
		$state_master = Dispatcher::config_state_master();
		$terms = 'accept';
		return $notes;
	}



	/**
	 *
	 *
	 * @return string
	 */
	private function maybe_update_license_status() {
		$state = Dispatcher::config_state();
		return;
		

		$check_timeout = 3600 * 24 * 5;
		$status = '';
		$terms = '';
		$license_key = $this->get_license_key();

		$old_plugin_type = $this->_config->get_string( 'plugin.type' );
		$plugin_type = '';

		if ( !empty( $license_key ) || defined( 'W3TC_LICENSE_CHECK' ) ) {
			$license = Licensing_Core::check_license( $license_key, W3TC_VERSION );

			if ( $license ) {
				$status = $license->license_status;
				$terms = $license->license_terms;
				if ( $this->_status_is( $status, 'active' ) ) {
					$plugin_type = 'pro';
				} elseif ( $this->_status_is( $status, 'inactive.by_rooturi' ) &&
					Util_Environment::is_w3tc_pro_dev() ) {
					$status = 'valid';
					$plugin_type = 'pro_dev';
				}
			}

			$this->_config->set( 'plugin.type', $plugin_type );
		} else {
			$status = 'no_key';
		}

		if ( $status == 'no_key' ) {
		} elseif ( $this->_status_is( $status, 'invalid' ) ) {
		} elseif ( $this->_status_is( $status, 'inactive' ) ) {
		} elseif ( $this->_status_is( $status, 'active' ) ) {
		} else {
			$check_timeout = 60;
		}

		$state->set( 'license.status', $status );
		$state->set( 'license.next_check', time() + $check_timeout );
		$state->set( 'license.terms', $terms );
		$state->save();

		if ( $old_plugin_type != $plugin_type ) {
			try {
				$this->_config->set( 'plugin.type', $plugin_type );
				$this->_config->save();
			} catch ( \Exception $ex ) {
			}
		}
		return $status;
	}



	function get_license_key() {
		$license_key = 'NULLED-BY-GANJAPARKER';
		if ( $license_key == '' )
			$license_key = ini_get( 'w3tc.license_key' );
		return $license_key;
	}



	function action_verify_plugin_license_key() {
		$license = 'NULLED-BY-GANJAPARKER';

		
		$status = 'active';
		echo $status->license_status;
		exit();
	}
}
