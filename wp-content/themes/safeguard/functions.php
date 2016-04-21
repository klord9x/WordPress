<?php
/********************* DEFINE MAIN VERIABLES ********************/
$safeguard_pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('safeguard_pix_general_settings');
if(class_exists('WP_Session'))
    $safeguard_pix_customize_live_preview = WP_Session::get_instance();
/********************* DEFINE MAIN PATHS ********************/
require_once (get_template_directory() . '/library/includes/menu_walker.php');
require_once (get_template_directory() . '/library/functions/helper.php');
require_once (get_template_directory() . '/library/includes/portfolio_walker.php');
require_once (get_template_directory() . '/library/functions/post-types.php');
require_once (get_template_directory() . '/library/functions/widgets.php');
require_once (get_template_directory() . '/library/admin/custom-fields.php');
require_once (get_template_directory() . '/library/admin/scripts.php');
require_once (get_template_directory() . '/library/admin/admin-panel/admin-panel.php');
require_once (get_template_directory() . '/library/admin/admin-panel/class-tgm-plugin-activation.php');
require_once (get_template_directory() . '/library/functions/functions.php');
require_once (get_template_directory() . '/library/functions/filters.php');
require_once (get_template_directory() . '/library/functions/common.php');

require_once (get_template_directory() . '/pixinit/loadscripts.php');
require_once (get_template_directory() . '/pixinit/fonts.php');
require_once (get_template_directory() . '/pixinit/setup.php');
require_once (get_template_directory() . '/pixinit/tgm_plugin.php');
require_once (get_template_directory() . '/pixinit/customize.php');
require_once (get_template_directory() . '/pixinit/woo.php');
?>