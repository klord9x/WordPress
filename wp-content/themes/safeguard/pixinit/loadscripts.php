<?php

/************* LOAD REQUIRED SCRIPTS AND STYLES *************/
function safeguard_pix_loadscripts(){

	$safeguard_pix_options = isset($_POST['options']) ? $_POST['options'] : get_option('safeguard_pix_general_settings');
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()){
		
		/* MAIN CSS */
		wp_enqueue_style('style', get_stylesheet_uri());
		//wp_enqueue_style('safeguard_pix-theme', get_template_directory_uri() . '/css/theme.css');
		if ( class_exists( 'WooCommerce' )){
			wp_enqueue_style('safeguard-woocommerce', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css');
			wp_enqueue_style('safeguard-woocommerce-layout', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce-layout.css');
		}

		if (safeguard_pix_get_option('safeguard_pix_responsive','1')){
			wp_enqueue_style('safeguard-responsive', get_template_directory_uri() . '/css/responsive.css');
		}else{
			wp_enqueue_style('safeguard-no-responsive', get_template_directory_uri() . '/css/no-responsive.css');
		}
		
		/* MASTER CSS */
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('skin-bootstrap', get_template_directory_uri() . '/css/skin-bootstrap.css');
		wp_enqueue_style('safeguard-theme', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style('safeguard-color', get_template_directory_uri() . '/css/color.css');
		wp_enqueue_style('safeguard-dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.php');
		
		/* PLUGIN CSS */
		wp_enqueue_style('owl', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.css');
		wp_enqueue_style('owltheme', get_template_directory_uri() . '/assets/owl-carousel/owl.theme.css');
		wp_enqueue_style('isotope', get_template_directory_uri() . '/assets/isotope/isotope.css');
		
		if(isset($_GET['get_scheme'])){
			$wp_session['color-scheme'] = $_GET['get_scheme'];
			wp_enqueue_style('safeguard-color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.$wp_session['color-scheme'].'.css');
		}elseif(!empty($wp_session['color-scheme'])){
			wp_enqueue_style('safeguard-color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.$wp_session['color-scheme'].'.css');
		}elseif (safeguard_pix_get_option('safeguard_pix_color_switcher','0') == 0 && !isset($_GET['get_scheme']) && !isset($wp_session['color-scheme'])) {
            wp_enqueue_style('safeguard-color-scheme', get_template_directory_uri() . '/assets/switcher/css/'.safeguard_pix_get_option('safeguard_pix_color_scheme','color1').'.css');
        }


		// jQuery
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery') , '3.3', false);


		// Bootstrap Core JavaScript
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') , '3.3', false);
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery') , '3.3', false);


		// User agent
		wp_enqueue_script('cssua', get_template_directory_uri() . '/js/cssua.min.js', array() , '3.3', true);
		
		
		// Isotope filter
		wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/isotope/jquery.isotope.min.js', array() , '3.3', true);
		wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/events/masonry.pkgd.min.js', array() , '3.3', true);
		wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array() , '3.3', true);
		wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.js', array() , '3.3', true);
		
		
		// Ios Fix
		wp_enqueue_script('ios-orientationchange-fix', get_template_directory_uri() . '/js/ios-orientationchange-fix.js', array() , '3.3', true);
		
		
		// Bx Slider
		wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.min.js', array() , '3.3', true);


		// Flex Slider
		wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array() , '3.3', true);
		
		
		// Owl Carousel
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', array() , '3.3', true);
		

		// Pretty Photo
		wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/assets/prettyphoto/js/jquery.prettyPhoto.js', array() , '3.6', true);
		
		
		
		// doubletaptogo
		wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/doubletaptogo/doubletaptogo.js', array() , '1.0', true);

		
		
		
		
		// Switcher	
		if (safeguard_pix_get_option('safeguard_pix_color_switcher','0')){

        	wp_enqueue_script('dmss-js', get_template_directory_uri() . '/assets/switcher/js/dmss.js', array(), '3.3', true);
        	wp_enqueue_style('css-switcher', get_template_directory_uri() . '/assets/switcher/css/switcher.css');

		}
		
		
		wp_enqueue_script('flickrfeed', get_template_directory_uri() . '/assets/jflickrfeed/jflickrfeed.min.js', array() , '1.1', true);
		wp_enqueue_script('placeholder', get_template_directory_uri() . '/js/jquery.placeholder.min.js', array() , '1.1', true);
		wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/js/jquery.smooth-scroll.js', array() , '1.1', true);
		wp_enqueue_script('safeguard-theme', get_template_directory_uri() . '/js/theme.js', array() , '1.1', true);
		
				
	}
}

add_action('wp_enqueue_scripts', 'safeguard_pix_loadscripts'); //Load All Scripts


function safeguard_pix_load_custom_wp_admin_style(){
	wp_register_script('custom_wp_admin_script', get_template_directory_uri() . '/js/custom-admin.js', false, '1.0.0');
	wp_enqueue_script('custom_wp_admin_script');
}

add_action('admin_enqueue_scripts', 'safeguard_pix_load_custom_wp_admin_style');


function safeguard_pix_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/css/editor_styles.css' );
}

//add_action( 'current_screen', 'safeguard_pix_add_editor_styles' );
/************************************************************/

?>