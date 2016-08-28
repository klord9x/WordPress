<?php 

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' );

// TODO Custom Woocommerce.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
// TODO Shop page:
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_all_actions( 'woocommerce_before_shop_loop');
remove_all_actions( 'woocommerce_archive_description');
remove_all_actions( 'woocommerce_sidebar');
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );


//Disable the default stylesheet
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// add_action( 'woocommerce_before_single_product_summary', 'comments_template', 30);
add_action( 'wpt_footer', 'wpt_footer_cart_link' );
add_action ('wpt_right_column', 'wpt_get_right');
add_action ('wpt_single_title', 'woocommerce_template_single_title');
add_action ('wpt_add_breadcrumb', 'woocommerce_breadcrumb');
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );

function register_my_menus() {
  register_nav_menus(
    array(
      'header_links' => __( 'Header Menu' ),
      'footer_menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// TODO Create menu:

if ( ! function_exists( 'wpt_get_menu' ) ) {

	/**
	 * Get menu.
	 *
	 */
	function wpt_get_menu($menu) {

		$defaults  = array(
			'theme_location' => $menu,
			'container' => 'ul',
			'container_class' => $menu,
			'items_wrap'     => '<ul id="header_links" >%3$s</ul>'
		);
		wp_nav_menu( $defaults );
	}
}

function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    unset($tabs['additional_information']);
    return $tabs;
}

if ( ! function_exists( 'wpt_get_right' ) ) {

	/**
	 * Get the shop sidebar template.
	 *
	 */
	function wpt_get_right() {
		wc_get_template( 'common/right_column.php' );
	}
}

if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

function wpt_cutom_billing_fields ($fields = array()) {

	unset($fields['billing_company']);
	// echo "<pre>";
	// var_export($fields);
	// echo "</pre>";

	return $fields;
}
add_filter( 'woocommerce_billing_fields', 'wpt_cutom_billing_fields');

function wpt_footer_cart_link() {
	global $woocommerce;

	if ( ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) && ( !is_cart() && !is_checkout() ) ) :
		echo '<a class="btn alt" href="' . $woocommerce->cart->get_cart_url() . '" title="' . __( 'Cart' ) . '">' . __( 'Cart' ) . '</a>';

		echo '<a class="btn" href="' . $woocommerce->cart->get_checkout_url() . '" title="' . __( 'Checkout' ) . '">' . __( 'Checkout' ) . '</a>';
	endif;	
}

function wpt_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );

function register_theme_menus() {

	register_nav_menus(
		array(
			'primary-menu' 	=> __( 'Primary Menu', 'treehouse-portfolio' )			
		)
	);

}
add_action( 'init', 'register_theme_menus' );


function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


function wpt_theme_styles() {

	// wp_enqueue_style( 'foundation_css', get_template_directory_uri() . '/css/foundation.css' );
	// wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

function wpt_theme_js() {

	// wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );	
	// wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
	// wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true );		
	// wp_enqueue_script( 'product_js', get_template_directory_uri() . '/js/product.js', '', '', true );		
	// wp_enqueue_script( 'ajax-cart_js', get_template_directory_uri() . '/js/ajax-cart.js', '', '', true );
	// wp_register_script('jquery-min', get_template_directory_uri().'/js/jquery-1.4.4.min.js', 'all');
	// wp_register_script('tool-js', get_template_directory_uri().'/js/tools.js', 'all');
	wp_enqueue_script('slider_js', get_template_directory_uri().'/js/jquery.nivo.slider.pack.js', '', '', false );		
	// wp_enqueue_script('idTabs', get_template_directory_uri().'/js/jquery.idTabs.modified.js', '', '', false );
	wp_enqueue_script('scrollTo', get_template_directory_uri().'/js/jquery.scrollTo-1.4.2-min.js', '', '', false );
	wp_enqueue_script('serialScroll', get_template_directory_uri().'/js/jquery.serialScroll-1.2.2-min.js', '', '', false );
	// wp_enqueue_script('product', get_template_directory_uri().'/js/product.js', '', '', false );
	wp_enqueue_script('wrapfirstword', get_template_directory_uri().'/js/wrapfirstword.js', '', '', false );	

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );








?>