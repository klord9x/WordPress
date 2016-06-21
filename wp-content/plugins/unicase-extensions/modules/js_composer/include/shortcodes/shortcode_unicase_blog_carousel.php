<?php
if ( !function_exists( 'shortcode_vc_blog_carousel' ) ):

function shortcode_vc_blog_carousel( $atts, $content = null ){

	extract(shortcode_atts(array(
		'title'				=> '',
		'limit'				=> '',
		'orderby' 			=> 'date',
	    'order' 			=> 'desc',
	    'disable_touch_drag'=> false,
    ), $atts));

    $html = '';
    if( function_exists( 'unicase_blog_carousel' ) ) {
		ob_start();
		unicase_blog_carousel( $title, $limit, $orderby, $order, $disable_touch_drag );
		$html = ob_get_clean();
    }

    return $html;
}

add_shortcode( 'unicase_blog_carousel' , 'shortcode_vc_blog_carousel' );

endif;