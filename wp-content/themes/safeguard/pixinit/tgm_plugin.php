<?php
/******* TGM Plugin ********/
function safeguard_pix_theme_register_required_plugins(){
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		
		array(
			'name' => 'Contact Form 7', // The plugin name
			'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/contact-form-7.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'Mailchimp', // The plugin name
			'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/mailchimp-for-wp.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'Revolution Slider', // The plugin name
			'slug' => 'revslider', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/revslider.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'WPBakery Visual Composer', // The plugin name
			'slug' => 'js_composer', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/js_composer.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'Regenerate Thumbnails', // The plugin name
			'slug' => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/regenerate-thumbnails.zip', // The plugin source
			'required' => false, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
			array(
			'name' => 'PixthemeCustom', // The plugin name
			'slug' => 'pixtheme-custom', // The plugin slug (typically the folder name)
			'source' => get_stylesheet_directory() . '/library/includes/plugins/pixtheme-custom.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_deactivation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'Font Icons Loader', // The plugin name
			'slug' => 'font-icons-loader', // The plugin slug (typically the folder name)
			'source' => get_stylesheet_directory() . '/library/includes/plugins/font-icons-loader.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'Meta Box', // The plugin name
			'slug' => 'meta-box', // The plugin slug (typically the folder name)
			'source' => 'https://downloads.wordpress.org/plugin/meta-box.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		array(
			'name' => 'WordPress Importer', // The plugin name
			'slug' => 'wordpress-importer', // The plugin slug (typically the folder name)
			'source' => 'http://envato.templines.com/plugins/wordpress-importer.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
		
		array(
			'name' => 'Envato WordPress Toolkit', // The plugin name
			'slug' => 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
			'source' =>  'http://envato.templines.com/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
			'required' => true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_activation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' => ''

			// If set, overrides default API URL and points to an external URL

		) ,
	
	);
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id' => 'safeguard', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to pre-packaged plugins.
		'menu' => 'tgmpa-install-plugins', // Menu slug.
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false, // Automatically activate plugins after installation or not.
		'message' => '', // Message to output right before the plugins table.
		'strings' => array(
			'page_title' => esc_html__('Install Required Plugins', 'safeguard') ,
			'menu_title' => esc_html__('Install Plugins', 'safeguard') ,
			'installing' => esc_html__('Installing Plugin: %s', 'safeguard') , // %s = plugin name.
			'oops' => esc_html__('Something went wrong with the plugin API.', 'safeguard') ,
			'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'safeguard') , // %1$s = plugin name(s).
			'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'safeguard') , // %1$s = plugin name(s).
			'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'safeguard') , // %1$s = plugin name(s).
			'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'safeguard') , // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'safeguard') , // %1$s = plugin name(s).
			'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'safeguard') , // %1$s = plugin name(s).
			'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'safeguard') , // %1$s = plugin name(s).
			'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'safeguard') , // %1$s = plugin name(s).
			'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'safeguard') ,
			'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'safeguard') ,
			'return' => esc_html__('Return to Required Plugins Installer', 'safeguard') ,
			'plugin_activated' => esc_html__('Plugin activated successfully.', 'safeguard') ,
			'complete' => esc_html__('All plugins installed and activated successfully. %s', 'safeguard') , // %s = dashboard link.
			'nag_type' => 'updated'

			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.

		)
	);
	tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'safeguard_pix_theme_register_required_plugins');


function safeguard_pix_vcSetAsTheme(){
	vc_set_as_theme();
	get_template_part( '/pixinit/vc_shortcode' );
}

add_action('vc_before_init', 'safeguard_pix_vcSetAsTheme');

?>