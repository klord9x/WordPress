<?php
/**
 * The template for displaying page blocks.
 *
 * @package Safeguard
 * @since 1.0
 */

if ( !function_exists('safeguard_pix_site_menu')) {
	function safeguard_pix_site_menu($class = null) {
		if (function_exists('wp_nav_menu')) {
			wp_nav_menu(array(
					'theme_location' => 'primary_nav',
					'container' => false,
					'menu_id' => 'main-menu',
					'menu_class' => $class
			));
		}
	}
}


function safeguard_pix_get_option($slug,$_default = false){
	$safeguard_pix_options = get_option('safeguard_pix_general_settings');
	if (isset($safeguard_pix_options[$slug]) && $safeguard_pix_options[$slug] == '' && in_array($_default, array('1', '0')))
		$safeguard_pix_options[$slug] = $_default;
	if (isset($safeguard_pix_options[$slug])){
		return wp_kses($safeguard_pix_options[$slug],'default');
	}else{
		if ($_default)
			return wp_kses($_default,'default');	  	 		
		else
			return false;	
	}
	
}


?>