<?php
add_action('admin_init', 'compactor_portfolio_init');

function compactor_portfolio_init() {
	global $vc_add_css_animation;
//-----------------portfolio------------------*/


	vc_map( array(
		"name"            => esc_html__( "Portfolio", 'compactor' ),
		"base"            => "wd_vc_portfolio",
		"icon"            => get_template_directory_uri() . "/images/icon/meknes.png",
		"content_element" => true,
		"is_container"    => true,
		"category"        => 'Webdevia',
		"params"          => array(
			array(
				"type"        => "dropdown", // it will bind a textfield in WP
				"heading"     => esc_html__( "Layout", 'compactor' ),
				"param_name"  => "layout",
				"value"       => array(
					'Grid Layout'     => 'grid',
					'Masonry Layout'  => 'masonry',
					'Carousel Layout' => 'carousel',
				),
				"admin_label" => true,
			),
			array(
				"type"        => "dropdown", // it will bind a textfield in WP
				"heading"     => esc_html__( "Style", 'compactor' ),
				"param_name"  => "hover_style",
				"value"       => array(
					'Style I'  => 'style-1',
					'Style II' => 'style-2',
				),
				"dependency"  => Array( "element" => "layout", "value" => array( 'grid', 'carousel' ) ),
				"admin_label" => true,
			),
			array(
				"type"       => "checkbox",
				"heading"    => esc_html__( "Categories", 'compactor' ),
				"param_name" => "portfolio_categories",
				'value'      => compactor_get_categories( 'portfolio_categories' ),
			),
			array(
				"type"             => "textfield", // it will bind a textfield in WP
				"heading"          => esc_html__( "Items to Load", 'compactor' ),
				"param_name"       => "itemperpage",
				'edit_field_class' => 'vc_col-xs-6',
				"admin_label"      => true,
			),
			//------------- Option for grid & masonry
			array(
				"type"             => "textfield", // it will bind a textfield in WP
				"heading"          => esc_html__( "Columns", 'compactor' ),
				"param_name"       => "columns",
				"dependency"       => Array( "element" => "layout", "value" => array( 'grid', 'masonry' ) ),
				'edit_field_class' => 'vc_col-xs-6',
			),
			//------------- Option for masonry
			array(
				"type"             => "checkbox", // it will bind a textfield in WP
				"heading"          => esc_html__( "Show Category Filter", 'compactor' ),
				"param_name"       => "category_filter",
				"dependency"       => Array( "element" => "layout", "value" => array( 'masonry' ) ),
				"value"            => array( 'yes, Please' => true ),
				'edit_field_class' => 'vc_col-xs-4',
			),
			//------------- Option for Carousel --------
			array(
				"type"             => "textfield", // it will bind a textfield in WP
				"heading"          => esc_html__( "Item to display", 'compactor' ),
				"param_name"       => "number",
				"dependency"       => Array( "element" => "layout", "value" => array( 'carousel' ) ),
				'edit_field_class' => 'vc_col-xs-6',
			),
			array(
				"type"             => "checkbox", // it will bind a textfield in WP
				"heading"          => esc_html__( "Auto Play", 'compactor' ),
				"param_name"       => "auto_play",
				"dependency"       => Array( "element" => "layout", "value" => array( 'carousel' ) ),
				'edit_field_class' => 'vc_col-xs-4',
			),


			$vc_add_css_animation

		)
	) );
}