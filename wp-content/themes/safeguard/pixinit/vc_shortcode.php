<?php
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
 
add_action( 'init', 'Safeguard_integrateWithVC', 200 );
function Safeguard_integrateWithVC() {

	vc_remove_element( "vc_gallery" );
	vc_remove_element( "vc_images_carousel" );
	vc_remove_element( "vc_posts_slider" );

	$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
	$categories = get_categories($args);
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if(is_object($category)){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->name] = $category->term_id;
		}
	}
	
	if ( class_exists( 'WooCommerce' ) ) {
		$args = array( 'taxonomy' => 'product_cat', 'hide_empty' => '0');
		$categories_woo = get_categories($args);
		$cats_woo = array();
		$i = 0;
		foreach($categories_woo as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats_woo[$category->name] = $category->term_id;
		}
	}
	
	$args = array( 'taxonomy' => 'services_category', 'hide_empty' => '0');
	$categories_serv = get_categories($args);
	$cats_serv = array();
	if(empty($categories_serv['errors'])){
		foreach($categories_serv as $category){
			$cats_serv[$category->name] = $category->term_id;
		}
	}
	
	$args = array( 'post_type' => 'services');
	$services = get_posts($args);
	$serv = array();
	if(empty($services['errors'])){
		foreach($services as $service){		
			$serv[$service->post_title] = $service->ID;
		}
	}
	
	$args = array( 'post_type' => 'portfolio');
	$portfolio = get_posts($args);
	$port = array();
	if(empty($portfolio['errors'])){
		foreach($portfolio as $port_card){		
			$port[$port_card->post_title] = $port_card->ID;
		}
	}
	
	$args = array( 'post_type' => 'wpcf7_contact_form');
	$forms = get_posts($args);
	$cform7 = array();
	if(empty($forms['errors'])){
		foreach($forms as $form){		
			$cform7[$form->post_title] = $form->ID;
		}
	}

	$icon_attributes = array(
		array(
			"type" => "textarea_html",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__( "Content", 'safeguard' ),
			"param_name" => "content",
			"value" => '',
			"description" => '',
		),
	);

	vc_add_params( 'vc_icon', $icon_attributes );
	
	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'CSS Animation', 'safeguard' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			esc_html__( 'No', 'safeguard' ) => '',
			esc_html__( 'bounce', 'safeguard' ) => 'bounce',
			esc_html__( 'flash', 'safeguard' ) => 'flash',
			esc_html__( 'pulse', 'safeguard' ) => 'pulse',
			esc_html__( 'rubberBand', 'safeguard' ) => 'rubberBand',
			esc_html__( 'shake', 'safeguard' ) => 'shake',
			esc_html__( 'swing', 'safeguard' ) => 'swing',
			esc_html__( 'tada', 'safeguard' ) => 'tada',
			esc_html__( 'wobble', 'safeguard' ) => 'wobble',
			esc_html__( 'jello', 'safeguard' ) => 'jello',
			
			esc_html__( 'bounceIn', 'safeguard' ) => 'bounceIn',
			esc_html__( 'bounceInDown', 'safeguard' ) => 'bounceInDown',
			esc_html__( 'bounceInLeft', 'safeguard' ) => 'bounceInLeft',
			esc_html__( 'bounceInRight', 'safeguard' ) => 'bounceInRight',
			esc_html__( 'bounceInUp', 'safeguard' ) => 'bounceInUp',
			esc_html__( 'bounceOut', 'safeguard' ) => 'bounceOut',
			esc_html__( 'bounceOutDown', 'safeguard' ) => 'bounceOutDown',
			esc_html__( 'bounceOutLeft', 'safeguard' ) => 'bounceOutLeft',
			esc_html__( 'bounceOutRight', 'safeguard' ) => 'bounceOutRight',
			esc_html__( 'bounceOutUp', 'safeguard' ) => 'bounceOutUp',
			
			esc_html__( 'fadeIn', 'safeguard' ) => 'fadeIn',
			esc_html__( 'fadeInDown', 'safeguard' ) => 'fadeInDown',
			esc_html__( 'fadeInDownBig', 'safeguard' ) => 'fadeInDownBig',
			esc_html__( 'fadeInLeft', 'safeguard' ) => 'fadeInLeft',
			esc_html__( 'fadeInLeftBig', 'safeguard' ) => 'fadeInLeftBig',
			esc_html__( 'fadeInRight', 'safeguard' ) => 'fadeInRight',
			esc_html__( 'fadeInRightBig', 'safeguard' ) => 'fadeInRightBig',
			esc_html__( 'fadeInUp', 'safeguard' ) => 'fadeInUp',
			esc_html__( 'fadeInUpBig', 'safeguard' ) => 'fadeInUpBig',			
			esc_html__( 'fadeOut', 'safeguard' ) => 'fadeOut',
			esc_html__( 'fadeOutDown', 'safeguard' ) => 'fadeOutDown',
			esc_html__( 'fadeOutDownBig', 'safeguard' ) => 'fadeOutDownBig',
			esc_html__( 'fadeOutLeft', 'safeguard' ) => 'fadeOutLeft',
			esc_html__( 'fadeOutLeftBig', 'safeguard' ) => 'fadeOutLeftBig',
			esc_html__( 'fadeOutRight', 'safeguard' ) => 'fadeOutRight',
			esc_html__( 'fadeOutRightBig', 'safeguard' ) => 'fadeOutRightBig',
			esc_html__( 'fadeOutUp', 'safeguard' ) => 'fadeOutUp',
			esc_html__( 'fadeOutUpBig', 'safeguard' ) => 'fadeOutUpBig',
			
			esc_html__( 'flip', 'safeguard' ) => 'flip',
			esc_html__( 'flipInX', 'safeguard' ) => 'flipInX',
			esc_html__( 'flipInY', 'safeguard' ) => 'flipInY',
			esc_html__( 'flipOutX', 'safeguard' ) => 'flipOutX',
			esc_html__( 'flipOutY', 'safeguard' ) => 'flipOutY',
			
			esc_html__( 'lightSpeedIn', 'safeguard' ) => 'lightSpeedIn',
			esc_html__( 'lightSpeedOut', 'safeguard' ) => 'lightSpeedOut',
			
			esc_html__( 'rotateIn', 'safeguard' ) => 'rotateIn',
			esc_html__( 'rotateInDownLeft', 'safeguard' ) => 'rotateInDownLeft',
			esc_html__( 'rotateInDownRight', 'safeguard' ) => 'rotateInDownRight',
			esc_html__( 'rotateInUpLeft', 'safeguard' ) => 'rotateInUpLeft',
			esc_html__( 'rotateInUpRight', 'safeguard' ) => 'rotateInUpRight',			
			esc_html__( 'rotateOut', 'safeguard' ) => 'rotateOut',
			esc_html__( 'rotateOutDownLeft', 'safeguard' ) => 'rotateOutDownLeft',
			esc_html__( 'rotateOutDownRight', 'safeguard' ) => 'rotateOutDownRight',
			esc_html__( 'rotateOutUpLeft', 'safeguard' ) => 'rotateOutUpLeft',
			esc_html__( 'rotateOutUpRight', 'safeguard' ) => 'rotateOutUpRight',
			
			esc_html__( 'slideInUp', 'safeguard' ) => 'slideInUp',
			esc_html__( 'slideInDown', 'safeguard' ) => 'slideInDown',
			esc_html__( 'slideInLeft', 'safeguard' ) => 'slideInLeft',
			esc_html__( 'slideInRight', 'safeguard' ) => 'slideInRight',
			esc_html__( 'slideOutUp', 'safeguard' ) => 'slideOutUp',			
			esc_html__( 'slideOutDown', 'safeguard' ) => 'slideOutDown',
			esc_html__( 'slideOutLeft', 'safeguard' ) => 'slideOutLeft',
			esc_html__( 'slideOutRight', 'safeguard' ) => 'slideOutRight',
			
			esc_html__( 'zoomIn', 'safeguard' ) => 'zoomIn',
			esc_html__( 'zoomInDown', 'safeguard' ) => 'zoomInDown',
			esc_html__( 'zoomInLeft', 'safeguard' ) => 'zoomInLeft',
			esc_html__( 'zoomInRight', 'safeguard' ) => 'zoomInRight',
			esc_html__( 'zoomInUp', 'safeguard' ) => 'zoomInUp',			
			esc_html__( 'zoomOut', 'safeguard' ) => 'zoomOut',
			esc_html__( 'zoomOutDown', 'safeguard' ) => 'zoomOutDown',
			esc_html__( 'zoomOutLeft', 'safeguard' ) => 'zoomOutLeft',
			esc_html__( 'zoomOutRight', 'safeguard' ) => 'zoomOutRight',
			esc_html__( 'zoomOutUp', 'safeguard' ) => 'zoomOutUp',
			
			esc_html__( 'hinge', 'safeguard' ) => 'hinge',			
			esc_html__( 'rollIn', 'safeguard' ) => 'rollIn',
			esc_html__( 'rollOut', 'safeguard' ) => 'rollOut',
			
		),
		'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'safeguard' )
	);	

	$pix_libs = $pix_fonts = $pix_fonts_str = $params = $params1 = $params2 = array();

	if(function_exists('fil_init')){

		if( array_key_exists( 'vc_iconpicker-type-pixflaticon' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Flaticon', 'safeguard' )] = 'pixflaticon';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixfontawesome' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Font Awesome', 'safeguard' )] = 'pixfontawesome';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixelegant' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Elegant', 'safeguard' )] = 'pixelegant';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixicomoon' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Icomoon', 'safeguard' )] = 'pixicomoon';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixsimple' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Simple', 'safeguard' )] = 'pixsimple';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixcustom1' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Custom 1', 'safeguard' )] = 'pixcustom1';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixcustom2' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Custom 2', 'safeguard' )] = 'pixcustom2';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixcustom3' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Custom 3', 'safeguard' )] = 'pixcustom3';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixcustom4' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Custom 4', 'safeguard' )] = 'pixcustom4';
		}
		if( array_key_exists( 'vc_iconpicker-type-pixcustom5' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'Custom 5', 'safeguard' )] = 'pixcustom5';
		}
		if( array_key_exists( 'vc_iconpicker-type-fontawesome' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'VC Font Awesome', 'safeguard' )] = 'fontawesome';
		}
		if( array_key_exists( 'vc_iconpicker-type-openiconic' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'VC Open Iconic', 'safeguard' )] = 'openiconic';
		}
		if( array_key_exists( 'vc_iconpicker-type-typicons' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'VC Typicons', 'safeguard' )] = 'typicons';
		}
		if( array_key_exists( 'vc_iconpicker-type-entypo' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'VC Entypo', 'safeguard' )] = 'entypo';
		}
		if( array_key_exists( 'vc_iconpicker-type-linecons' , $GLOBALS['wp_filter']) ) {
			$pix_libs[esc_html__( 'VC Linecons', 'safeguard' )] = 'linecons';
		}

		$add_icon_libs = array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'safeguard' ),
			'param_name' => 'type',
			'value' => $pix_libs,
			'admin_label' => true,
			'description' => esc_html__( 'Select icon library.', 'safeguard' ),
		);

		if( is_array($pix_libs) ){
			$pix_fonts_str[] = $add_icon_libs;

			foreach( $pix_libs as $val ){
				if($val != '')
				$pix_fonts[$val] = array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'safeguard' ),
					'param_name' => 'icon_'.$val,
					'value' => '',
					'settings' => array(
						'emptyIcon' => true,
						'type' => $val,
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'type',
						'value' => $val,
					),
					'description' => esc_html__( 'Select icon from library.', 'safeguard' ),
				);
				$pix_fonts_str[] = $pix_fonts[$val];
			}
		}
	}

		
	$attributes2 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding', 'safeguard' ),
			'param_name' => 'ppadding',
			'value' => array(
				esc_html__( "Both", 'safeguard' ) => 'vc_pixrow-padding-both',				
				esc_html__( "Top", 'safeguard' ) => 'vc_pixrow-padding-top',
				esc_html__( "Bottom", 'safeguard' ) => 'vc_pixrow-padding-bottom',
				esc_html__( "No Padding", 'safeguard' ) => 'vc_pixrow-no-padding',
			),
			'description' => esc_html__( 'Top, bottom, both', 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => "Text Color",
			'param_name' => 'ptextcolor',
			'value' => array("Default" , "White" , "Black"),
			'description' => esc_html__( "Text Color", 'safeguard' ),
			'group' => esc_html__( 'Row Options', 'safeguard' ),
		),
		
		      
	);
	if(!function_exists('fil_init')){
		$attributes = $attributes2;
	}else{
		$attributes = array_merge($pix_fonts_str, $attributes2);
	}
	vc_add_params( 'vc_row', $attributes );
	
	vc_map(
		array(
			'name' => esc_html__( 'Title', 'safeguard' ),
			'base' => 'block_title',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'safeguard' ),
					'description' => esc_html__( 'Title param.', 'safeguard' )
				),
				 
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title Position', 'safeguard' ),
					'param_name' => 'titlepos',
					'value' => array(
						esc_html__( 'Center', 'safeguard' ) => 'text-center',
						esc_html__( 'Left', 'safeguard' ) => 'text-left',						
						esc_html__( 'Right', 'safeguard' ) => 'text-right',
					),
					'description' => esc_html__( 'Center, left or right', 'safeguard' ),
				),	
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Title Color', 'safeguard' ),
					'param_name' => 'title_color',
					'value' => '',
					'description' => '',
				),	
				$add_css_animation,
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'safeguard' ),
					'param_name' => 'content',
					'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
					'description' => esc_html__( 'Enter your content.', 'safeguard' )
				)
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Title extends WPBakeryShortCode {
			
		}
	}


	/// box_title
	vc_map(
		array(
			'name' => esc_html__( 'Title Box', 'safeguard' ),
			'base' => 'box_title',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'safeguard'),
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'I am Title', 'safeguard' ),
					'description' => esc_html__( 'Title param.', 'safeguard' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title Position', 'safeguard' ),
					'param_name' => 'titlepos',
					'value' => array(
						esc_html__( 'Center', 'safeguard' ) => 'text-center',
						esc_html__( 'Left', 'safeguard' ) => 'text-left',						
						esc_html__( 'Right', 'safeguard' ) => 'text-right',
					),
					'description' => esc_html__( 'Center, left or right', 'safeguard' ),
				),	
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Title Color', 'safeguard' ),
					'param_name' => 'title_color',
					'value' => '',
					'description' => '',
				),	
				$add_css_animation,
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'safeguard' ),
					'param_name' => 'content',
					'value' => wp_kses_post(__( '<p>I am test text block. Click edit button to change this text.</p>', 'safeguard' )),
					'description' => esc_html__( 'Enter your content.', 'safeguard' )
				)
			)
		) 
	);
	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Title extends WPBakeryShortCode {
			
		}
	}
	
///////////////////////////////////// BOX /////////////////////////////////////	




	// box_amount
	$params1 = array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'Project', 'safeguard' ),
					'description' => esc_html__( 'Title.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Amount', 'safeguard' ),
					'param_name' => 'amount',
					'value' => esc_html__( '999', 'safeguard' ),
					'description' => esc_html__( 'Amount.', 'safeguard' )
				),
			);
	$params2 = array(
				$add_css_animation,
			);
	if(!function_exists('fil_init')){
		$params = array_merge($params1, $params2);
	}else{
		$params = array_merge($params1, $pix_fonts_str, $params2);
	}
	vc_map(
		array(
			'name' => esc_html__( 'Amount Box', 'safeguard' ),
			'base' => 'box_amount',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'safeguard'),
			'params' => $params,
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Amount extends WPBakeryShortCode {
			
		}
	}
	

	vc_map(
		array(
			'name' => esc_html__( 'Banner', 'safeguard' ),
			'base' => 'section_banner',
			'class' => 'pix-theme-icon',
			'category' => esc_html__( 'Templines', 'safeguard'),
			'params' => array(
				
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Banner Color', 'safeguard' ),
					'param_name' => 'banner_color',
					'value' => esc_html__( '#549404', 'safeguard' ),
					'description' => esc_html__( 'Banner background color', 'safeguard' ),
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'value' => esc_html__( 'WE PROVIDE FASTEST & AFFORDABLE CARGO SERVICES', 'safeguard' ),
					'description' => esc_html__( 'Banner Title', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Button Text', 'safeguard' ),
					'param_name' => 'btn_text',
					'value' => esc_html__( 'REQUEST A FREE QUOTE', 'safeguard' ),
					'description' => esc_html__( 'Button Title', 'safeguard' )
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'value' => esc_html__( 'https:/templines.com', 'safeguard' ),
					'description' => esc_html__( 'Button link', 'safeguard' )
				),
				
				$add_css_animation,
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Content', 'safeguard' ),
					'param_name' => 'content',
					'value' => '',
					'description' => esc_html__( 'Banner Text', 'safeguard' ),
				)
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Banner extends WPBakeryShortCode {
			
		}
	}
	

	
	/// section_color3
	vc_map(
		array(
			"name" => esc_html__( "3 Colors Text Section", 'safeguard' ),
			"base" => "section_color3",
			"class" => "pix-theme-icon",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__( 'Left Block Color', 'safeguard' ),
					'param_name' => 'left_color',
					'value' => esc_html__( '#549404', 'safeguard' ),
					'description' => esc_html__( 'Select bg color.', 'safeguard' )
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Left Text Block', 'safeguard' ),
					'param_name' => 'left_text',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__( 'Right Block Color', 'safeguard' ),
					'param_name' => 'right_color',
					'value' => esc_html__( '#a91605', 'safeguard' ),
					'description' => esc_html__( 'Select bg color.', 'safeguard' )
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Right Text Block', 'safeguard' ),
					'param_name' => 'right_text',
					'value' => '',
					'description' => '',
				),
				
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__( 'Center Block Color', 'safeguard' ),
					'param_name' => 'center_color',
					'value' => esc_html__( '#333333', 'safeguard' ),
					'description' => esc_html__( 'Select bg color.', 'safeguard' )
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Center Text Block", 'safeguard' ),
					"param_name" => "content",
					"value" => '',
					"description" => '',
				),
						
				$add_css_animation,			
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Color3 extends WPBakeryShortCode {
			
		}
	}

	
	/// box_teammember
	vc_map( array(
		"name" => esc_html__( "Team Member Box", 'safeguard' ),
		"base" => "box_teammember",
		"class" => "pix-theme-icon",
		"category" => esc_html__( "Templines", 'safeguard'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'safeguard' ),
				'param_name' => 'name',
				'description' => esc_html__( 'Team member name.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'safeguard' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Member position.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 1', 'safeguard' ),
				'param_name' => 'scn1',
				'description' => esc_html__( 'https://www.facebook.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 1', 'safeguard' ),
				'param_name' => 'scn_icon1',
				'description' => wp_kses_post(__( 'Add icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 2', 'safeguard' ),
				'param_name' => 'scn2',
				'description' => esc_html__( 'https://twitter.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 2', 'safeguard' ),
				'param_name' => 'scn_icon2',
				'description' => wp_kses_post(__( 'Add icon fa-twitter <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'safeguard' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://plus.google.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'safeguard' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post(__( 'Add icon fa-google-plus <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'safeguard' ),
				'param_name' => 'scn4',
				'description' => esc_html__( '//www.w3.org/TR/html5/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'safeguard' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post(__( 'Add icon fa-html5 <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 5', 'safeguard' ),
				'param_name' => 'scn5',
				'description' => esc_html__( 'https://github.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 5', 'safeguard' ),
				'param_name' => 'scn_icon5',
				'description' => wp_kses_post(__( 'Add icon fa-github <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 6', 'safeguard' ),
				'param_name' => 'scn6',
				'description' => esc_html__( 'https://github.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 6', 'safeguard' ),
				'param_name' => 'scn_icon6',
				'description' => esc_html__( 'Add icon fa-github <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' )
			),
			$add_css_animation,
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Info", 'safeguard' ),
				"param_name" => "content", 
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter information.", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Teammember extends WPBakeryShortCode {
		}
	}
	////////////////////////


	/// section_imagescarousel
	vc_map(
		array(
			"name" => esc_html__( "Images Carousel", 'safeguard' ),
			"base" => "section_imagescarousel",
			"class" => "pix-theme-icon",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					'type' => 'attach_images',
					'heading' => esc_html__( 'Images', 'safeguard' ),
					'param_name' => 'images',
					'value' => '',
					'description' => esc_html__( 'Select images from media library.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'safeguard' ),
					'param_name' => 'img_size',
					'value' => 'thumbnail',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'safeguard' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Auto Play', 'safeguard' ),
					'param_name' => 'autoplay',
					'value' => '4000',
					'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'safeguard' ),
				),
				$add_css_animation,
			)
		) 
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Imagescarousel extends WPBakeryShortCode {
			
		}
	}
	

	/// section_brands
	vc_map( array(
		'name' => esc_html__( 'Brands Section', 'safeguard' ),
		'base' => 'section_brands',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'section_brand'), 
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'safeguard'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Brands per page', 'safeguard' ),
				'param_name' => 'brands_per_page',
				'description' => esc_html__( 'Select number of columns. Default 4.', 'safeguard' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Carousel', 'safeguard' ),
				'param_name' => 'disable_carousel',
				'value' => array(
					esc_html__('Enable', 'safeguard') => 1,
					esc_html__('Disable', 'safeguard') => 0,
				),
				'description' => esc_html__( 'On/off carousel', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Auto Play', 'safeguard' ),
				'param_name' => 'autoplay',
				'value' => '4000',
				'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'safeguard' ),
			),
			/*
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Carousel Controls', 'safeguard' ),
				'param_name' => 'controls',
				'value' => array(
					esc_html__( "Default", 'safeguard' ) => '',
					esc_html__( "Controls Right", 'safeguard' ) => 'control-right',
					esc_html__( "Controls Left", 'safeguard' ) => 'control-left',
				),
				'description' => esc_html__( 'Select controls position.', 'safeguard' )
			),
			*/
			$add_css_animation,
		),	
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => esc_html__( 'Brand', 'safeguard' ),
		'base' => 'section_brand',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'section_brands'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'safeguard' )
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "url", 'safeguard' ),
				"param_name" => "url",
				"value" => esc_html__( "https://wordpress.com", 'safeguard' ), 
				"description" => '',
			),
			$add_css_animation,
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Brands extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Brand extends WPBakeryShortCode {
		}
	}
	////////////////////////	
	
	
	/// section_tabs
	vc_map( array(
		'name' => esc_html__( 'Tabs', 'safeguard' ),
		'base' => 'section_tabs',
			'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'section_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => false,
		'category' => esc_html__( 'Templines', 'safeguard'),
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			$add_css_animation,
		),
		'js_view' => 'VcColumnView', // must be added for all Containers ( or should be extended in js ). VC Dev team
	) );
	vc_map( array(
		'name' => esc_html__( 'Tab', 'safeguard' ),
		'base' => 'section_tab',
		'as_child' => array('only' => 'section_tabs'),
		'content_element' => true,
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Tab title.', 'safeguard' )
			),
			array(
				'type' => 'tab_id',
				'heading' => esc_html__( 'Tab ID', 'safeguard' ),
				'param_name' => "tab_id",
			),		
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Select image from media library.', 'safeguard' )
			),
			array(
				'type' => 'vc_link',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Link', 'safeguard' ),
				'param_name' => 'link',
				'value' => esc_html__( 'https:/templines.com', 'safeguard' ),
				'description' => esc_html__( 'Button link', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Button Text', 'safeguard' ),
				'param_name' => 'btn_text',
				'value' => '',
				'description' => esc_html__( 'Leave empty to hide the button.', 'safeguard' ),
			),	
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Content", 'safeguard' ),
				"param_name" => "content",
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter your content.", 'safeguard' )
			),
		),
		'js_view' => 'VcTabView',
		
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Tabs extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Tab extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////	
	
	
	/// box_service
	vc_map(
		array(
			"name" => esc_html__( "Service Box", 'safeguard' ),
			"base" => "box_service",
			"class" => "pix-theme-icon",
			"category" => esc_html__( "Templines", 'safeguard'),
			'params' => array(
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'safeguard' ),
					'param_name' => 'image',
					'description' => esc_html__( 'Select image.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'safeguard' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Title info.', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'safeguard' ),
					'param_name' => 'button_text',
					'value' => esc_html__('Read More', 'safeguard'),
					'description' => esc_html__( 'Button info text.', 'safeguard' )
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Info link.', 'safeguard' )
				),
				$add_css_animation,
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Info", 'safeguard' ),
					"param_name" => "content", 
					"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
					"description" => esc_html__( "Enter information.", 'safeguard' )
				),
			)
		) 
	);	
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Service extends WPBakeryShortCode {
			
		}
	}
	/////////////////////////////////
	
	
	//////// Carousel Reviews ////////
	vc_map( array(
		'name' => esc_html__( 'Reviews', 'safeguard' ),
		'base' => 'section_reviews',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'section_review'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'safeguard'),
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Reviews per page', 'safeguard' ),
				'param_name' => 'reviews_per_page',
				'value' => array(
					esc_html__( "1", 'safeguard' ) => 1,
					esc_html__( "2", 'safeguard' ) => 2,
				),
				'description' => esc_html__( 'Select number of columns.', 'safeguard' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Carousel', 'safeguard' ),
				'param_name' => 'disable_carousel',
				'value' => array(
					esc_html__('Enable', 'safeguard') => 1,
					esc_html__('Disable', 'safeguard') => 0,
				),
				'description' => esc_html__( 'On/off carousel', 'safeguard' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Color scheme', 'safeguard' ),
				'param_name' => 'skin',
				'value' => array(
					esc_html__( "Light", 'safeguard' ) => 'pix-reviews-light',
					esc_html__( "Dark", 'safeguard' ) => 'pix-reviews-dark',
				),
				'description' => '',
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Auto Play', 'safeguard' ),
				'param_name' => 'autoplay',
				'value' => '4000',
				'description' => esc_html__( 'Enter autoplay speed in milliseconds. 0 is turn off autoplay.', 'safeguard' ),
			),
		),
		
		
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => esc_html__( 'Review', 'safeguard' ),
		'base' => 'section_review',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'section_reviews'),
		'content_element' => true,
		'front_enqueue_js' => get_template_directory_uri() . '/library/functions/shortcodes/shortcode.js',
		'params' => array(
			/*
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			*/
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Person name.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'safeguard' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Text under the name.', 'safeguard' )
			),
			/*
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Link', 'safeguard' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Author link.', 'safeguard' )
			),
			*/
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Review Text", 'safeguard' ),
				"param_name" => "content",
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter text.", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Reviews extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Review extends WPBakeryShortCode {
		}
	}
	/////////////////////////////////	
	
	/// section_team
	//////// Our Team ////////
	vc_map( array(
		'name' => esc_html__( 'Team Members', 'safeguard' ),
		'base' => 'section_team',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'section_team_member'),
		'content_element' => true,
		'show_settings_on_create' => true,
		'category' => esc_html__( 'Templines', 'safeguard'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Team Dysplay Style', 'safeguard' ),
				'param_name' => 'per_row',
				'value' => array(
					esc_html__( "3 Items with 'SEND MAIL' button", 'safeguard' ) => 3,
					esc_html__( "4 Items with social buttons only", 'safeguard' ) => 4,
				),
				'description' => '',
			),
			$add_css_animation,
		),
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => esc_html__( 'Team Member', 'safeguard' ),
		'base' => 'section_team_member',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'section_team'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'Image', 'safeguard' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Select image.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Name', 'safeguard' ),
				'param_name' => 'name',
				'description' => esc_html__( 'Team member name.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Position', 'safeguard' ),
				'param_name' => 'position',
				'description' => esc_html__( 'Member position.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Mail Button Text', 'safeguard' ),
				'param_name' => 'btn_txt',
				'value' => '',
				'description' => esc_html__( 'Leave empty to hide button.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'E-mail address', 'safeguard' ),
				'param_name' => 'email',
				'description' => esc_html__( 'Member E-mail.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 1', 'safeguard' ),
				'param_name' => 'scn1',
				'description' => esc_html__( 'https://www.facebook.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 1', 'safeguard' ),
				'param_name' => 'scn_icon1',
				'description' => wp_kses_post(__( 'Add icon social_facebook_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 2', 'safeguard' ),
				'param_name' => 'scn2',
				'description' => esc_html__( 'https://twitter.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 2', 'safeguard' ),
				'param_name' => 'scn_icon2',
				'description' => wp_kses_post(__( 'Add icon social_twitter_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 3', 'safeguard' ),
				'param_name' => 'scn3',
				'description' => esc_html__( 'https://www.pinterest.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 3', 'safeguard' ),
				'param_name' => 'scn_icon3',
				'description' => wp_kses_post(__( 'Add icon social_pinterest_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Link 4', 'safeguard' ),
				'param_name' => 'scn4',
				'description' => esc_html__( 'https://plus.google.com/', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Social Network Icon 4', 'safeguard' ),
				'param_name' => 'scn_icon4',
				'description' => wp_kses_post(__( 'Add icon social_googleplus_circle <a href="//fontawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			$add_css_animation,
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Info", 'safeguard' ),
				"param_name" => "content", 
				"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
				"description" => esc_html__( "Enter information.", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Section_Team extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Team_Member extends WPBakeryShortCode {
		}
	}
	////////////////////////
	
	
	//////// Social Buttons ////////
	vc_map( array(
		'name' => esc_html__( 'Social Buttons', 'safeguard' ),
		'base' => 'socialbuts',
		'class' => 'pix-theme-icon', 
		'as_parent' => array('only' => 'socialbut'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element' => true,
		'show_settings_on_create' => false,
		'category' => esc_html__( 'Templines', 'safeguard'),		
		'js_view' => 'VcColumnView',
		
	) );
	vc_map( array(
		'name' => esc_html__( 'Social Button', 'safeguard' ),
		'base' => 'socialbut',
		'class' => 'pix-theme-icon', 
		'as_child' => array('only' => 'socialbuts'),
		'content_element' => true,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'safeguard' ),
				'param_name' => 'title',
				'description' => esc_html__( 'Social title.', 'safeguard' )
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Icon', 'safeguard' ),
				'param_name' => 'icon',
				'description' => wp_kses_post(__( 'Add social icon fa-facebook <a href="//fortawesome.github.io/Font-Awesome/icons/" target="_blank">See all icons</a>', 'safeguard' ))
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Link', 'safeguard' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Social link.', 'safeguard' )
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => esc_html__( "Color", 'safeguard' ),
				"param_name" => "color", 
				"description" => esc_html__( "Select bg color.", 'safeguard' )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Socialbuts extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Socialbut extends WPBakeryShortCode {
		}
	}
	//////////////////////////////////////////////////////////////////////


///////////////////////////////////// Theme Post Types Widgets /////////////////////////////////////

	/// block_posts
	vc_map(
		array(
			"name" => esc_html__( "News Block", 'safeguard' ),
			"base" => "block_posts",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'safeguard' ),
					"param_name" => "title",
					"value" => esc_html__( "Latest News", 'safeguard' ),
					"description" => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button Text', 'safeguard' ),
					'param_name' => 'btn_text',
					'value' => esc_html__( 'READ ALL NEWS', 'safeguard' ),
					'description' => esc_html__( 'Leave empty to hide bytton.', 'safeguard' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'Link For All News', 'safeguard' ),
					'param_name' => 'link',
					'value' => '',
					'description' => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Color scheme', 'safeguard' ),
					'param_name' => 'skin',
					'value' => array(
						esc_html__( "Light", 'safeguard' ) => 'pix-lastnews-light',
						esc_html__( "Dark", 'safeguard' ) => 'pix-lastnews-dark',
					),
					'description' => '',
				),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Title Content", 'safeguard' ),
					"param_name" => "content",
					"value" => esc_html__( "READ our latest blog news", 'safeguard' ),
					"description" => esc_html__( "Enter your title content.", 'safeguard' ),
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Posts extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	/// section_services_cat
	vc_map(
		array(
			"name" => esc_html__( "Departments", 'safeguard' ),
			"base" => "section_services_cat",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Departments', 'safeguard' ),
					'param_name' => 'cats',
					'value' => $cats_serv,
					'description' => esc_html__( 'Select departments to show', 'safeguard' ),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Items Per Row', 'safeguard' ),
					'param_name' => 'per_row',
					'value' => array(
						"3" => 3,
						"2" => 2,
					),
					'description' => '',
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Services_Cat extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	/// section_services
	vc_map(
		array(
			"name" => esc_html__( "Services", 'safeguard' ),
			"base" => "section_services",
			"class" => "pix-theme-icon3",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Use Template With', 'safeguard' ),
					'param_name' => 'template',
					'value' => array(
						esc_html__( "With Department Menu", 'safeguard' ) => 'menu',
						esc_html__( "Isotop Filter", 'safeguard' ) => 'isotop',
						esc_html__( "Without Menu And Filter", 'safeguard' ) => 'landing',
					),
					'description' => 'In "With Department Menu" template you can\'t select departments.',
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Departmens', 'safeguard' ),
					'param_name' => 'cat_serv',
					'value' => $cats_serv,
					'description' => esc_html__( 'Select departmens to show their services.', 'safeguard' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('isotop', 'landing'),
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Items Count', 'safeguard' ),
					'param_name' => 'count',
					'description' => esc_html__( 'Select number services to show.', 'safeguard' ),
					'dependency' => array(
						'element' => 'template',
						'value' => array('menu', 'landing'),
					),
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Button text', 'safeguard' ),
					'param_name' => 'buttext',
					'value' => esc_html__( 'READ MORE', 'safeguard' ),
					'description' => '',
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Section_Services extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////



///////////////////////////////////// Third Party Widgets /////////////////////////////////////


	/// box_mailchimp
	vc_map(
		array(
			"name" => esc_html__( "Mailchimp Box", 'safeguard' ),
			"base" => "box_mailchimp",
			"class" => "pix-theme-icon2",
			"category" => esc_html__( "Templines", 'safeguard'),
			"show_settings_on_create" => false,
			"content_element" => true,
			"params" => array(),
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Mailchimp extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	/// block_cform7
	vc_map(
		array(
			"name" => esc_html__( "Contact Form 7", 'safeguard' ),
			"base" => "block_cform7",
			"class" => "pix-theme-icon2",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Contact Form', 'safeguard' ),
					'param_name' => 'form_id',
					'value' => $cform7,
					'description' => esc_html__( 'Select contact form to show', 'safeguard' )
				),
				$add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Block_Cform7 extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////


	/// flickr
	vc_map(
		array(
			"name" => esc_html__( "Flickr", 'safeguard' ),
			"base" => "flickr",
			"class" => "pix-theme-icon2",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Title", 'safeguard' ),
					"param_name" => "title",
					"value" => 'Flickr Feed',
					"description" => ''
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Flickr ID", 'safeguard' ),
					"param_name" => "id",
					"value" => '7992704@N05',
					"description" => esc_html__( "Get your flickr ID from: //idgettr.com/", 'safeguard' )
				 ),
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Number of photos", 'safeguard' ),
					"param_name" => "number",
					"value" => '9',
					"description" => esc_html__( "Default 9.", 'safeguard' )
				 ),
				 $add_css_animation,
			)
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Flickr extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////



///////////////////////////////////// Standart Templines Widgets /////////////////////////////////////

	/// box_icon
	$params1 = array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Title", 'safeguard' ),
					"param_name" => "title",
					"value" => esc_html__( "I am title", 'safeguard' ),
					"description" => esc_html__( "Add Title ", 'safeguard' )
				),
			);
	$params2 = array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon Position', 'safeguard' ),
					'param_name' => 'position',
					'value' => array(
						esc_html__( "Left", 'safeguard' ) => 'icon-left',
						esc_html__( "Right", 'safeguard' ) => 'icon-right',
						esc_html__( "Center", 'safeguard' ) => 'icon-center',
					),
					'description' => '',
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Link', 'safeguard' ),
					'param_name' => 'link',
					'value' => esc_html__( 'https:/templines.com', 'safeguard' ),
					'description' => esc_html__( 'Button link', 'safeguard' )
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Button Text', 'safeguard' ),
					'param_name' => 'btn_text',
					'value' => '',
					'description' => '',
				),
				$add_css_animation,
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Content", 'safeguard' ),
					"param_name" => "content",
					"value" => wp_kses_post(__( "<p>I am test text block. Click edit button to change this text.</p>", 'safeguard' )),
					"description" => esc_html__( "Enter your content.", 'safeguard' )
				)
			);
	if(!function_exists('fil_init')){
		$params = array_merge($params1, $params2);
	}else{
		$params = array_merge($params1, $pix_fonts_str, $params2);
	}
	vc_map(
		array(
			"name" => esc_html__( "Icon Box", 'safeguard' ),
			"base" => "box_icon",
			"class" => "pix-theme-icon4",
			"category" => esc_html__( "Templines", 'safeguard'),
			"params" => $params,
		)
	);
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Box_Icon extends WPBakeryShortCode {

		}
	}
	//////////////////////////////////////////////////////////////////////
	

	if(isset($_GET['vc_action']) && $_GET['vc_action'] == 'vc_inline'){
		wp_enqueue_style('safeguard_pix-theme', get_template_directory_uri() . '/css/editor_styles.css');
	}
	
}