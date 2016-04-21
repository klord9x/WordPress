<?php
/**
* Header Template
*
* Here we setup all logic and XHTML that is required for the header section of all screens.
*
* @package WooFramework
* @subpackage Template
*/
?>
<!DOCTYPE html>
<html class="noIE" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if(safeguard_pix_get_option('safeguard_pix_responsive','1')):?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php endif?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php  $safeguard_pix_options = get_option('safeguard_pix_general_settings'); ?>
<?php
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
	   echo '<link rel="shortcut icon" href="'.esc_url(safeguard_pix_get_option('safeguard_pix_favicon','')).'" />';
	}
?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>   >
<?php 
	$color_sheme = isset($post->ID) && $post->ID>0 && get_post_meta($post->ID, 'color_sheme', 1) != '' ? get_post_meta($post->ID, 'color_sheme', 1) : safeguard_pix_get_option('safeguard_pix_color_sheme','color1');
	$header_type = isset($post->ID) && $post->ID>0 && get_post_meta($post->ID, 'header_type', 1) != '' ? get_post_meta($post->ID, 'header_type', 1) : safeguard_pix_get_option('safeguard_pix_header_type','layout-header1');
	$header_sticky = safeguard_pix_get_option('safeguard_pix_header_sticky','sticky');
	$page_layout = isset($post->ID) && $post->ID>0 && get_post_meta($post->ID, 'page_layout', 1) != '' ? get_post_meta($post->ID, 'page_layout', 1) : safeguard_pix_get_option('safeguard_pix_page_layout','layout-wide');
?>
	<div data-header-top="300" data-header="<?php echo esc_attr($header_sticky);?>" class="layout-theme <?php echo esc_attr($color_sheme);?> <?php echo esc_attr($header_type);?> <?php echo esc_attr($page_layout);?> animated-css">

<?php 
	
	if (safeguard_pix_get_option('safeguard_pix_color_switcher','0')) { 
		require_once(get_template_directory() .'/template-parts/header/color_switcher.php');
	}

	if( (safeguard_pix_get_option('safeguard_pix_loader','1') == 1 && is_front_page()) || safeguard_pix_get_option('safeguard_pix_loader','1') == 2){
		echo '<div id="page-preloader"><span class="spinner"></span></div>';
	}

	if($header_type == 'layout-header3'){
		require_once(get_template_directory() .'/template-parts/header/header_type_3.php');
	}elseif($header_type == 'layout-header2'){
		require_once(get_template_directory() .'/template-parts/header/header_type_2.php');
	}else{
		require_once(get_template_directory() .'/template-parts/header/header_type_1.php');
	}

	if (!is_page_template('fullwidth.php')){
		require_once(get_template_directory() .'/template-parts/header/header_bgimage.php'); 
	} 
?>

<!--#content-->
<div class="content" id="content">

<!-- HEADER -->
