<?php
/*
Plugin Name: Unicase Extensions
Plugin URI: http://transvelo.github.io/unicase/
Description: Extensions for Unicase Wordpress Theme. Supplied as a separate plugin so that the customer does not find empty shortcodes on changing the theme.
Version: 1.1.1
Author: Ibrahim Ibn Dawood
Author URI: http://transvelo.com/
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) die( '-1' );

define( 'UNICASE_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
define( 'UNICASE_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );

if( !class_exists( 'Unicase_Extensions' ) ) :

	class Unicase_Extensions {
		public function __construct() {
			
			#-----------------------------------------------------------------
			# Theme Shortcodes
			#-----------------------------------------------------------------

			require_once UNICASE_EXTENSIONS_DIR . '/modules/theme-shortcodes/theme-shortcodes.php';
		
			#-----------------------------------------------------------------
			# Static Block Post Type
			#-----------------------------------------------------------------

			require_once UNICASE_EXTENSIONS_DIR . '/modules/post-types/static-block.php';

			#-----------------------------------------------------------------
			# Visual Composer Extensions
			#-----------------------------------------------------------------

			require_once UNICASE_EXTENSIONS_DIR . '/modules/js_composer/js_composer.php';

			#-----------------------------------------------------------------
			# Product Taxonomies
			#-----------------------------------------------------------------

			require_once UNICASE_EXTENSIONS_DIR . 'modules/product-taxonomies/class-uc-product-taxonomies.php';
		}
	}

	new Unicase_Extensions();

endif;
