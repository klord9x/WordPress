<?php

if(file_exists(get_template_directory() .'/one-click-demo-install/init.php'))
	require get_template_directory() .'/one-click-demo-install/init.php';

function safeguard_pix_extended_upload ( $mime_types =array() ) { 
   // The MIME types listed here will be allowed in the media library.
   // You can add as many MIME types as you want.
   $mime_types['gz']  = 'application/x-gzip';
   $mime_types['zip']  = 'application/zip';
   return $mime_types;
}
 
add_filter('upload_mimes', 'safeguard_pix_extended_upload');


if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url('admin.php?page=adminpanel'));
	unregister_sidebar('header-sidebar');
}

/*************** AFTER THEME SETUP FUNCTIONS ****************/
function safeguard_pix_setup(){
	
	// Language support
	load_theme_textdomain('safeguard', get_template_directory() . '/languages');

	// ADD SUPPORT FOR POST THUMBS
	add_theme_support('post-thumbnails');

	// Define various thumbnail sizes
	add_image_size('safeguard_pix-post-thumb-large', 555, 300, true);
	add_image_size('safeguard_pix-post-thumb-small', 277, 135, true);
	add_image_size('safeguard_pix-services-thumb', 350, 233, true);
	add_image_size('safeguard_pix-preview-thumb', 100, 100, true);
	add_image_size('safeguard_pix-blog-thumb', 59, 59, true);
	add_theme_support("title-tag");
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array(
		'gallery',
		'quote'
	));

	// ADD SUPPORT FOR WORDPRESS 3 MENUS ************/
	add_theme_support('menus');

	// Register Navigations	
	function safeguard_pix_custom_menus()	{
		register_nav_menus(array(
			'primary_nav' => esc_html__('Primary Navigation', 'safeguard') ,
			'top_nav' => esc_html__('Top Navigation', 'safeguard') ,
			'footer_nav' => esc_html__('Footer Navigation', 'safeguard')
		));
	}
	
	add_action('init', 'safeguard_pix_custom_menus');
}
	
add_action('after_setup_theme', 'safeguard_pix_setup');


$args = array(
	'flex-width' => true,
	'width' => 350,
	'flex-height' => true,
	'height' => 'auto',
	'default-image' => get_template_directory_uri() . '/images/logo.jpg'
);

add_theme_support('custom-header', $args);


$args = array(
	'default-color' => 'FFFFFF'
);

add_theme_support('custom-background', $args);

/************************************************************/

function safeguard_pix_wp_get_attachment( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

function safeguard_pix_footer_staticblock( $post_ID ){
	
	$fpost = isset($post_ID) && $post_ID>0 ? $post_ID : '';
	$footerBlockId = in_array(get_post_meta($fpost, 'safeguard_pix_footer_staticblock', true), array("global", "")) || $fpost == '' ? safeguard_pix_get_option('safeguard_pix_footer_staticblock') : get_post_meta($fpost, 'safeguard_pix_footer_staticblock', true);
	
	if ($footerBlockId){
		$out = '';
		$footpost = get_post( $footerBlockId );
		$fslug = is_object($footpost) ? esc_attr($footpost->post_name) : '';
			
		$safeguard_pix_preset = get_post_meta($footerBlockId, 'homepage_preset', true);
		$safeguard_pix_preset_text = get_post_meta($footerBlockId, 'homepage_preset_text', true);
		
		$safeguard_pix_slider = get_post_meta($footerBlockId, 'homepage_slider', true);
		$out_slider = "";
		
		if($safeguard_pix_slider)
			foreach($safeguard_pix_slider as $slide) {
				$out_slider .= '<li><div style="background-image:url(' . esc_url($slide['url']) . ')" class="bg-slide"></div></li>';			
			}	
		$custom_color = get_post_meta($footerBlockId, 'cs_homepage_bgcolor', true);
		$bg_image = get_post_meta($footerBlockId, 'homepage_bgimage', true);
		$src = wp_get_attachment_image_src($bg_image, 'full');
		
		$style = ($bg_image) ?'background-image:url('.esc_url($src[0]).');':''; 
		$bg_color = ($custom_color) ? 'background-color:'.esc_attr($custom_color) : '';
		$class_preset = ($safeguard_pix_preset) ? 'no-bg-color-parallax parallax-'.$safeguard_pix_preset.' ' : '';
		$class_preset_text = ($safeguard_pix_preset_text) ? ' '.$safeguard_pix_preset_text : '';
		
		$_no_padding = get_post_meta($footerBlockId, 'safeguard_pix_page_section_nopadding', true);
		
		$class_preset_padding = ($_no_padding) ? ' no-padding' : '';
		$class = $class_preset.'home-section'.$class_preset_text.$class_preset_padding;
		$page_template_name = get_post_meta($footerBlockId,'_wp_page_template',true);
		
		$shortcodes_custom_css = get_post_meta( $footpost->ID, '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
		   $out .= '<style scoped type="text/css" data-type="vc_shortcodes-custom-css">';
		   $out .= esc_html($shortcodes_custom_css);
		   $out .= '</style>';
		}
		$out .= apply_filters('the_content', $footpost->post_content);
		
		echo $out;
	}
}
add_action( 'safeguard_pix_static_footer', 'safeguard_pix_footer_staticblock' );


function safeguard_pix_footer_script( $script ){
	$out = '';
	if ( !empty($script) ) {
		$out = $script;
	}
	return $out;
}
add_filter( 'safeguard_pix_script_footer', 'safeguard_pix_footer_script' );

?>