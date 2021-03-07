<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package compactor
 * @since compactor 1.0.0
 */

function compactor_load_js_css_file() {

	/*----------google -fonts ------------------*/
	$compactor_font_body_name = compactor_get_option('body_font_family');
	$compactor_font_weight_style = compactor_get_option('body_font_to_load');
	$compactor_main_text_font_subsets = compactor_get_option('body_font_subsets');

	$font_header_name = compactor_get_option('head_font_family');
	$compactor_heading_font_weight_style = compactor_get_option('head_font_to_load');
	$compactor_heading_text_font_subsets = compactor_get_option('head_font_subsets');

	$compactor_navigation_font_familly = compactor_get_option('nav_font_family', "default");
	$compactor_navigation_font_weight_style = compactor_get_option('nav_font_to_load');
	$compactor_navigation_text_font_subsets = compactor_get_option('nav_font_subsets');



	$compactor_font_weight_style = str_replace(" ", ",", "$compactor_font_weight_style");
	$compactor_heading_font_weight_style = str_replace(" ", ",", "$compactor_heading_font_weight_style");
	$compactor_navigation_font_weight_style = str_replace(" ", ",", "$compactor_navigation_font_weight_style");



	$compactor_protocol = is_ssl() ? 'https' : 'http';
	if (is_rtl()) {
		wp_enqueue_style('compactor-body-google-fonts', $compactor_protocol . '://fonts.googleapis.com/earlyaccess/droidarabickufi.css');
	} elseif ($compactor_font_body_name != "") {
		wp_enqueue_style('compactor-body-google-fonts', compactor_fonts_url($compactor_font_body_name, $compactor_font_weight_style, $compactor_main_text_font_subsets), array(), '1.0.0');
	} else {
		wp_enqueue_style('compactor-nav-body-google-fonts', $compactor_protocol . '://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700');
	}


	if ($font_header_name != "") {
		wp_enqueue_style('compactor-header-google-fonts', compactor_fonts_url($font_header_name, $compactor_heading_font_weight_style, $compactor_main_text_font_subsets), array(), '1.0.0');
	}

	if ($compactor_navigation_font_familly != "") {
		wp_enqueue_style('compactor-nav-navigation-google-fonts', compactor_fonts_url($compactor_navigation_font_familly, $compactor_navigation_font_weight_style, $compactor_navigation_text_font_subsets), array(), '1.0.0');
	}


	wp_enqueue_style('select2', get_template_directory_uri() . '/css/select2.min.css');
	wp_enqueue_style('animate-custom', get_template_directory_uri() . "/css/vendor/animate-custom.css");
	wp_enqueue_style('foundation', get_template_directory_uri() . "/css/vendor/foundation.min.css");
    wp_enqueue_style('compactor-app', get_template_directory_uri() . "/css/app.css");
	wp_enqueue_style('compactor-style', get_template_directory_uri() . '/style.css');

	wp_enqueue_style('lightbox', get_template_directory_uri() . "/css/vendor/lightbox.min.css");

	wp_enqueue_style('all', get_template_directory_uri() . "/css/vendor/all.min.css");


	if (is_singular() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');





	wp_enqueue_script('wd-script', get_template_directory_uri() . "/js/wd-script.min.js", array('jquery', 'hoverIntent'), '1.0.0', true);

  // localize the Filter Models script with new data
  $wnm_custom = array('template_url' => esc_url(home_url('/')));
  wp_localize_script('wd-script', 'urltheme', $wnm_custom);

	include_once(get_template_directory() . '/inc/custom-style/custom-style.php');

	wp_add_inline_style('compactor-style', $compactor_custom_css);
	//*********/inline style***************/

}

add_action('wp_enqueue_scripts', 'compactor_load_js_css_file');
