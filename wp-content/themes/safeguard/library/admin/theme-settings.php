<?php 
/**** THEME SETTINGS ***/
	
$args = array(
	'post_type'        => 'staticblocks',
	'post_status'      => 'publish',
);
$staticBlocks = array();
$staticBlocksData = get_posts( $args );
foreach($staticBlocksData as $_block){
	$staticBlocks[] = array( "value" => $_block->ID, "text" => $_block->post_title);
}	

$shortname = 'safeguard_pix';	
$options = array(
	
	array(
		'type' => 'open',
		'tab_name' => 'General settings',
		'tab_id' => 'general-settings'
	) ,
	
	array(
		'name' => 'Purchase Code',
		'id' => $shortname . '_purchase_code',
		'type' => 'text',
		'std' => '',
		'desc' => '<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Can-I-Find-my-Purchase-Code-">Where Can I Find my Purchase Code?</a>'
	) ,

	array(
		'name' => 'Templines News',
		'id' => $shortname . '_banner',
		'type' => 'select',
		'desc' => 'Display news',
		'options' => array(
			array( "value" => "0", "text" => "Hide"),
			array( "value" => "1", "text" => "Show"),

		)
	) ,

	array(
		'name' => 'Logo image',
		'id' => $shortname . '_logo',
		'type' => 'upload',
		'img_w' => '400',
		'img_h' => '250',
		'std' => '',
		'desc' => 'Upload a logo from your hard drive or specify an existing url (Recommended size: 290x88)'
	),	
	
	array(
		'name' => 'Logo Text',
		'id' => $shortname . '_logotext',
		'type' => 'text',
		'std' => '',
		'desc' => 'Logo Image alt text'
	) ,
			
	array(
		'name' => 'Header image',
		'id' => $shortname . '_header_img',
		'type' => 'upload',
		'img_w' => '1600',
		'img_h' => '140',
		'std' => '',
		'desc' => 'Upload an image from your hard drive or specify an existing url (Recommended size: 1600x140)'
	),

	array(
        'name' => 'Show Customizer Switcher',
        'id' => $shortname . '_color_switcher',
        'type' => 'select',
        'desc' => 'Change colors in customizer',
        'options' => array(
            array( "value" => "0", "text" => "Off"),
            array( "value" => "1", "text" => "On")
        )
    ) ,

	array(
		'type' => 'close'
	) ,
    
    
    /*************** HEADER ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Header',
		'tab_id' => 'header-section'
	) ,	
	
	array(
		'name' => 'Show Search',
		'id' => $shortname . '_header_search',
		'type' => 'select',
		'desc' => 'On/off header search',
		'options' => array(
			array( "value" => "1", "text" => "On"),	
			array( "value" => "0", "text" => "Off")			
		)
	) ,		
    
    array(
		'name' => 'Heder Button Text',
		'id' => $shortname . '_header_btntxt',
		'type' => 'text',
		'std' => '',
		'desc' => 'Leave empty to hide button'
	) ,
	
	array(
		'name' => 'Heder Button Link',
		'id' => $shortname . '_header_btnlink',
		'type' => 'text',
		'std' => '',
		'desc' => 'Button link'
	) ,
    
	array(
		'name' => 'Show sections',
		'id' => $shortname . '_section_show',
		'type' => 'select',
		'desc' => 'On/off sections',
		'options' => array(
			array( "value" => "1", "text" => "On"),	
			array( "value" => "0", "text" => "Off")			
		)
	) ,
	
	array(
		'name' => 'Section Title Left',
		'id' => $shortname . '_section_title_left',
		'type' => 'text',
		'std' => 'Email Support',
		'desc' => 'Section title'
	) ,
	
	array(
		'name' => 'Section Left',
		'id' => $shortname . '_section_left',
		'type' => 'textarea',
		'std' => '<a href="mailto:info@domain.com">info@domain.com</a>',
		'height' => '100',
		'desc' => 'information in the left section'
	) ,	
	
	array(
		'name' => 'Section Title Middle',
		'id' => $shortname . '_section_title_middle',
		'type' => 'text',
		'std' => 'Call Support',
		'desc' => 'Section title'
	) ,
		
	array(
		'name' => 'Section Middle',
		'id' => $shortname . '_section_middle',
		'type' => 'textarea',
		'std' => '0800.123.9876',
		'height' => '100',
		'desc' => 'information in the middle section'
	) ,
	
	array(
		'name' => 'Section Title Right',
		'id' => $shortname . '_section_title_right',
		'type' => 'text',
		'std' => 'Working Hours',
		'desc' => 'Section title'
	) ,
	
	array(
		'name' => 'Section Right',
		'id' => $shortname . '_section_right',
		'type' => 'textarea',
		'std' => 'Mon - Sat 0900 - 1900',
		'height' => '100',
		'desc' => 'information in the right section'
	) ,
		
	array(
		'type' => 'close'
	) ,
    /*****************************************/
    
    
		
	/*************** FOOTER ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Footer',
		'tab_id' => 'footer-section'
	) ,
	
	array(
		'name' => 'StaticBlock',
		'id' => $shortname . '_footer_staticblock',
		'type' => 'select',
		'desc' => 'Choose staticblock to use',
		'options' => $staticBlocks		
			
	) ,
	
	array(
		'name' => 'Footer Copyright',
		'id' => $shortname . '_footer_copy',
		'type' => 'textarea',
		'std' => 'Copyrights &copy; '.date("Y").' '.ucwords(wp_get_theme()).'  |  All rights reserved.',
		'height' => '40',
		'desc' => 'site copyright'
	) ,
	
	
			
	array(
		'type' => 'close'
	) ,
    /*****************************************/
	
	
	
	/*******************  BLOG  ******************/
	array(
		'type' => 'open',
		'tab_name' => 'Blog',
		'tab_id' => 'blog'
	) ,
	/*
	array( 
		"name" => "Blog Layout",
		"desc" => "Show list or grid posts page.",
		"id" => $shortname."_blog_layout",
		"type" => "select",
		'options' => array(
			array( "value" => "0", "text" => "List"),
			array( "value" => "1", "text" => "Grid")
		)
	),
	*/
	array( 
		"name" => "Show date",
		"desc" => "Date on blog posts listing page.",
		"id" => $shortname."_blog_show_date",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),	
	
	array( 
		"name" => "Show share buttons",
		"desc" => "Show share buttons on single post.",
		"id" => $shortname."_blog_share",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),	
	
	array( 
		"name" => "Show comments",
		"desc" => "Show comments on single post.",
		"id" => $shortname."_blog_show_comments",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Categories",
		"desc" => "Show Categories list.",
		"id" => $shortname."_blog_show_category",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	array( 
		"name" => "Show Tags",
		"desc" => "Show Tags list.",
		"id" => $shortname."_blog_show_tag",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),

	array(
		"name" => "Show Image Placeholders",
		"desc" => "Show Noimage.",
		"id" => $shortname."_blog_show_img_placeholders",
		"type" => "select",
		'options' => array(
			array( "value" => "1", "text" => "Yes"),
			array( "value" => "0", "text" => "No")
		)
	),
	
	
	array( "type" => "close"),
	/*********************************************/
		
	/**************  SOCIAL  ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Social',
		'tab_id' => 'social'
	) ,
	
	array(
		'name' => 'Facebook',
		'id' => $shortname . '_facebook',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'VK',
		'id' => $shortname . '_vk',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Youtube',
		'id' => $shortname . '_youtube',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Vimeo',
		'id' => $shortname . '_vimeo',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Twitter',
		'id' => $shortname . '_twitter',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Google+',
		'id' => $shortname . '_google',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Tumblr',
		'id' => $shortname . '_tumblr',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'WordPress',
		'id' => $shortname . '_wordpress',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Instagram',
		'id' => $shortname . '_instagram',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Pinterest',
		'id' => $shortname . '_pinterest',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Linkedin',
		'id' => $shortname . '_linkedin',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 1 link',
		'id' => $shortname . '_custom1_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 1 icon',
		'id' => $shortname . '_custom1_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 2 link',
		'id' => $shortname . '_custom2_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 2 icon',
		'id' => $shortname . '_custom2_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 3 link',
		'id' => $shortname . '_custom3_link',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	array(
		'name' => 'Custom 3 icon',
		'id' => $shortname . '_custom3_icon',
		'type' => 'text',
		'std' => '',
		'desc' => ''
	) ,
	
	
	array(
		'type' => 'close'
	) ,
	/*****************************************************/	
	
	/****** Styles ****/
	array(
		'type' => 'open',
		'tab_name' => 'Page',
		'tab_id' => 'page_style'
	) ,
		
		array(
			'name' => 'Page Layout',
			'id' => $shortname . '_page_layout',
			'type' => 'select',
			'desc' => 'Wide or boxed',
			'options' => array(
				array( "value" => "wide", "text" => "Wide"),	
				array( "value" => "boxed", "text" => "Boxed"),								
			)
		) ,	
		
		array(
			'name' => 'Loader',
			'id' => $shortname . '_loader',
			'type' => 'select',
			'desc' => 'Choose loader use',
			'options' => array(
				array( "value" => "0", "text" => "Off"),
				array( "value" => "1", "text" => "Use on main"),
				array( "value" => "2", "text" => "Use on all pages")		
			)		
		) ,
		
		array(
			'name' => 'Responsive',
			'id' => $shortname . '_responsive',
			'type' => 'select',
			'desc' => 'Choose responsive use',
			'options' => array(
				array( "value" => "1", "text" => "On"),	
				array( "value" => "0", "text" => "Off")			
			)		
		) ,	
	
	array(
		'type' => 'close'
	) ,
	
	/*****************************************************/	
	
	/**************  Miscellaneous  ***************/
	array(
		'type' => 'open',
		'tab_name' => 'Custom CSS / JS',
		'tab_id' => 'misc'
	) ,
		array(
			'name' => 'Custom CSS',
			'id' => $shortname.'_custom_css',
			'type' => 'textarea',
			'std' => '',
			'desc' => 'Add any custom css here. It will override the default values and will not be overwritten when the theme is updated. <br /> e.g.; .region1wrap{background:#000}'
		),
		
		array(
			'name' => 'Custom JS',
			'id' => $shortname.'_custom_js',
			'type' => 'textarea',
			'std' => '',
			'desc' => 'Add any custom javascript code here.'
		),

	array(
		'type' => 'close'
	) ,
	/*****************************************************/	
);

add_action( 'init', 'safeguard_pix_theme_options', 1 );

function safeguard_pix_theme_options($return = false) {
	
	global $options;
	
	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'safeguard_pix_general_settings' );
	$options_array = array();
	foreach($options as $value) {
		if (isset($value['id']) && isset($value['std'])) {
			$options_array[$value['id']] = stripslashes($value['std']);		
		}
		elseif(isset($value['id']))
			$options_array[$value['id']] = '';	
	}
	//update_option('safeguard_pix_general_settings', $options_array);

	
	//print_r($saved_settings);
	//echo "<br>";
	//print_r($options_array);
	
	if(empty($saved_settings)) {
	   update_option( 'safeguard_pix_general_settings', $options_array );
	}

}


?>