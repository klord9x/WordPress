<?php

/*****WOOCOMERCE**********/
add_theme_support('woocommerce');
add_filter('woocommerce_enqueue_styles', '__return_false');
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_shop_loop_tool', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop_tool', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.safeguard_pix_get_option('safeguard_pix_products_per_page','6').';' ), 20 );

function safeguard_pix_override_page_title(){
	return false;
}

add_filter('woocommerce_show_page_title', 'safeguard_pix_override_page_title');


if (!function_exists('safeguard_pix_loop_columns')) {
	function safeguard_pix_loop_columns() {
		return 3; // 3 products per row
	}
}
add_filter('loop_shop_columns', 'safeguard_pix_loop_columns');


function safeguard_pix_woocommerce_breadcrumbs(){
	return array(
		'delimiter' => '&nbsp;&nbsp;|&nbsp;&nbsp;',
		'wrap_before' => '  <div class="breadcrumbsBox path">',
		'wrap_after' => '</div>',
		'before' => '',
		'after' => '',
		'home' => wp_kses_post( __('Home', 'safeguard') ),
	);
}

add_filter('woocommerce_breadcrumb_defaults', 'safeguard_pix_woocommerce_breadcrumbs');



?>