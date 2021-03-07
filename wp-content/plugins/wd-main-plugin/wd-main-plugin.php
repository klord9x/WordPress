<?php 

/**
 * Plugin Name: Webdevia main plugin
 * Plugin URI: http://www.themeforest.net/user/Mymoun
 * Description: Add features to Mymoun themes.
 * Version: 3.2
 * Author: Mymoun
 * Author URI: http://www.themeforest.net/user/Mymoun
 */

class WebdeviaMainPlugin {
  function __construct() {

    require_once(  plugin_dir_path( __FILE__ ).'post-types.php' );
    require_once(  plugin_dir_path( __FILE__ ).'image-size.php' );

    require_once(  plugin_dir_path( __FILE__ ).'widgets/widget.php' );
    require_once(  plugin_dir_path( __FILE__ ).'widgets/adress.php' );
    require_once(  plugin_dir_path( __FILE__ ).'widgets/instagram.php' );
    require_once(  plugin_dir_path( __FILE__ ).'/import/wd-import.php' );


    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_pricing_table.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_pricingtable2.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_client.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_team.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_portfolio.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_testimonial.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_countup.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_icon_text.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_blog.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_progress_bars.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_headings.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_empty_spaces.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-maps.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_svg-code.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-button.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd-banner.php' );
    include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_case_studies.php' );
    include_once( plugin_dir_path( __FILE__ ).'meta-box.php' );


    //include_once( plugin_dir_path( __FILE__ ).'gutenberg/gutenberg.php' );
  }
}

new WebdeviaMainPlugin;




// retrieves the attachment ID from the file URL
function compactor_get_image_id($image_url) {
    global $wpdb;
    $image_url   = esc_sql( $image_url );
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    if (isset($attachment[0])) {
        return $attachment[0];
    }
}




add_action( 'wp_ajax_wdgetproduct', 'compactor_get_products_ajax_callback' ); // wp_ajax_{action}
function compactor_get_products_ajax_callback(){

	// we will pass post IDs and titles to this array
	$return = array();

	// you can use WP_Query, query_posts() or get_posts() here - it doesn't matter
	$search_results = new WP_Query( array(
		'post_type'             => 'product',
		'post_status'           => 'publish',
		's'=> $_GET['q'], // the search query
		'post_status' => 'publish', // if you don't want drafts to be returned
		'ignore_sticky_posts' => 1,
		'category_name' => $_GET['term'],
		'posts_per_page' => 50 // how much to show at once
	) );
	if( $search_results->have_posts() ) :
		while( $search_results->have_posts() ) : $search_results->the_post();
			// shorten the title a little
			$title = ( mb_strlen( $search_results->post->post_title ) > 50 ) ? mb_substr( $search_results->post->post_title, 0, 49 ) . '...' : $search_results->post->post_title;
			$return[] = array( $search_results->post->ID, $title, get_the_post_thumbnail_url( $search_results->post->ID, 'full' ) ); // array( Post ID, Post Title )
		endwhile;
	endif;
	echo json_encode( $return );
	die;
}



//----------- Add SVG to media ---------------
function compactor_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'compactor_mime_types');


//------------ Tags size ---------------
function compactor_custom_tag_cloud_widget($args) {
	$args['largest'] = 15; //largest tag
	$args['smallest'] = 15; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'compactor_custom_tag_cloud_widget' );


//------------ Allow Span tags in editor ------------
function compactor_tinymce_allow_span( $init ) {
	// Command separated string of extended elements
	$ext = 'span[id|name|class|style]';

	// Add to extended_valid_elements if it alreay exists
	if ( isset( $init['extended_valid_elements'] ) ) {
		$init['extended_valid_elements'] .= ',' . $ext;
	} else {
		$init['extended_valid_elements'] = $ext;
	}

	// Super important: return $init!
	return $init;
}

add_filter( 'tiny_mce_before_init', 'compactor_tinymce_allow_span' );
