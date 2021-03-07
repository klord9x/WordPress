<?php 
function wd_pricing_table($atts) {
    @$plan_options = vc_param_group_parse_atts($atts['plan_options']);
    @$sub_options = vc_param_group_parse_atts($atts['sub_options']);
    extract(shortcode_atts(array(
        'style' => 'pricing1',
        'text_color' => '',
        'product_icon' => '',
        'title' => 'Buy Now',
        'lines_min' => '#',
        'price' => '',
        'sub_price' => '10',
        'currency' => '$',
        'per_value' => '',
        'sub_options' => '',
        'plan_options' => '',
        'featured' => '',
        'button_link' => '',
        'button_text_color' => '',
        'button_bg_color' => '',
        'table_css' => '',
        //___________animation___________
        'css_animation' => 'no'

    ), $atts));
    $style_btn_bg = $style_btn_text = '';
    if ($button_bg_color != '')
        $style_btn_bg = "background:$button_bg_color;";
    if ($button_text_color != '')
        $style_btn_text = "color:$button_text_color;";


    $animation_classes = $data_animated = "";
    if(($css_animation != 'no')){
        $animation_classes =  " animated ";
        $data_animated = "data-animated=$css_animation";
    }

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $table_css, ' ' ), 'wd_pricing_table', $atts );
    $button_link = vc_build_link( $button_link );
    if ( $featured == 'featured') {
        $featured = ' pricing-table--featured ';
    }

    $sub_options = vc_param_group_parse_atts( $sub_options );
    $plan_options = vc_param_group_parse_atts( $plan_options );

    ob_start();

    include( plugin_dir_path( __FILE__ ).'pricingtable/'.$style.'.php');


  return ob_get_clean();
}
add_shortcode( 'wd_pricing_table', 'wd_pricing_table' );