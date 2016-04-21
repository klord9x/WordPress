<?php
/**
 * The template for registering metabox.
 *
 * @package Safeguard
 * @since 1.0
 */
add_filter( 'rwmb_meta_boxes', 'safeguard_pix_register_meta_boxes' );
add_filter( 'walker_nav_menu_start_el', 'safeguard_pix_one_page_nav_walker', 10, 4 );
//add_filter( 'pre_get_posts', 'safeguard_pix_SearchFilter' );

function safeguard_pix_register_meta_boxes( $meta_boxes ) {
	
	$meta_boxes[] = array(

		'id' => 'product_options',
		'title' => esc_html__( 'Additional Title', 'safeguard' ),
		'pages' => array( 'services', 'portfolio', 'post', 'page', 'product'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'name'    => esc_html__( 'Text', 'safeguard' ),
				'id'      => "add_title",
				'desc'  => "",
				'type'    => 'textarea',
				'std'   => ''
			),

		)
	);


	$meta_boxes[] = array(
		'id' => 'post_types',
		'title' => esc_html__( 'Portfolio Option', 'safeguard' ),
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name'  => esc_html__( 'Position', 'safeguard' ),
				'id'    => 'portfolio_position',
				'type'  => 'text',
				'desc' => 'Enter additional info'
			),
			array(
				'name'  => esc_html__( 'Phone', 'safeguard' ),
				'id'    => 'portfolio_phone',
				'type'  => 'text',
				'desc' => 'Enter phone number'
			),
			array(
				'name'  => esc_html__( 'E-mail', 'safeguard' ),
				'id'    => 'portfolio_email',
				'type'  => 'text',
				'desc' => 'Enter e-mail'
			),
			array(
				'name'  => esc_html__( 'Facebook', 'safeguard' ),
				'id'    => 'portfolio_facebook',
				'type'  => 'text',
				'desc' => 'Enter facebook link eg (https://www.facebook.com/)'
			),
			array(
				'name'  => esc_html__( 'Twitter', 'safeguard' ),
				'id'    => 'portfolio_twitter',
				'type'  => 'text',
				'desc' => 'Enter twitter link eg (https://twitter.com/)'
			),
			array(
				'name'  => esc_html__( 'Google+', 'safeguard' ),
				'id'    => 'portfolio_googleplus',
				'type'  => 'text',
				'desc' => 'Enter google+ link eg (https://www.google.com/)'
			),
			array(
				'name'  => esc_html__( 'LinkedIn', 'safeguard' ),
				'id'    => 'portfolio_linkedin',
				'type'  => 'text',
				'desc' => 'Enter linkedin link eg (https://www.linkedin.com/)'
			),
		)
	);
	

	$meta_boxes[] = array(
		
		'id' => 'post_format',
		'title' => esc_html__( 'Post Format Options', 'safeguard' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Post Standared:', 'safeguard' ),
				'id'   => "post_standared",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'application,audio,video',
			),
			array(
				'name' => esc_html__('Post Gallery:','safeguard'),
				'id'   => "post_gallery",
				'type' => 'plupload_image',
				'max_file_uploads' => 25,
			),
			array(
				'name'  => esc_html__('Quote Source:', 'safeguard'),
				'id'    => "post_quote_source",
				'desc'  => '',
				'type'  => 'text',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Quote Content:', 'safeguard'),
				'id'    => "post_quote_content",
				'desc'  => '',
				'type'  => 'textarea',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Video','safeguard'),
				'id'    => "post_video",
				'desc'  => 'Video URL',
				'type'  => 'textarea',
				'std'   => '',
			)
		)
		
	);


	return $meta_boxes;
}

function safeguard_pix_one_page_nav_walker($output, $item, $depth, $args) {
	
	if ( is_object($item) && has_nav_menu( 'primary' ) ) {  // Exectue only when it's in menu items
		
		$home_childs = array();  // Default value for home children

		$home_id = safeguard_pix_get_home_ID();
		
		if ( !empty($home_id ) && $depth == '0' ) {  // If home page was set

			$pages = get_pages( 'child_of=' . $home_id );
			foreach ($pages as $child) {  // Store all the child pages included in Homepage
				array_push( $home_childs, $child->ID );
			}


		}
		
		// If menu item's page is included in home page or menu item points to Homepage (frontpage)
		if ( in_array( $item->object_id , $home_childs ) || $item->url === safeguard_pix_get_home_front_page_url() ) {
			
			if ( $item->url === safeguard_pix_get_home_front_page_url() && !is_page_template('template-home.php') ) {  // Detect home menu item in other pages
				$url = home_url('/');
				$pattern = '/(?<=href\=")[^]]+?(?=")/';
				$output = preg_replace($pattern, $url, $output);
			} else {
				$url = home_url('/#') . safeguard_pix_get_slug($item->object_id);
				$pattern = '/(?<=href\=")[^]]+?(?=")/';
				$output = preg_replace($pattern, $url, $output);
			}

		} else {  // If it's a normal link to other pages add a class to it

			$dom = new DOMDocument;
			$dom->encoding = 'utf-8';
			$dom->loadHTML( mb_convert_encoding($output, "HTML-ENTITIES", "UTF-8") );

			$dom->removeChild($dom->firstChild);  // Remove <!DOCTYPE 
			$dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild); // Remove <html><body></body></html> 

			$anchors = $dom->getElementsByTagName('a');
			foreach($anchors as $anchor) {
				$anchor->setAttribute('class', 'external');
			}

			$output = $dom->saveHTML();

		}

	}
	
    return $output;
}

function safeguard_pix_SearchFilter($query) {
    if ($query->is_search) {
    	$query->set('post_type', 'post');
    }
    return $query;
}
