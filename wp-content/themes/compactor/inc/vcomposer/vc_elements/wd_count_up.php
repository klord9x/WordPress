<?php

global $vc_add_css_animation;
// COUNTUP
// -------------------------------------------------------------------
vc_map(array(
    "name" => esc_html__("Count UP", 'compactor'),
    "base" => "wd_count_up",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(

//___________icon_______________________________
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Switcher Icon/Image', 'compactor'),
            'param_name' => 'wd_countup_switch',
            'value' => array(
                __('None', 'compactor') => 'None',
                'Icon' => 'wd_countup_icon',
                'Image / SVG' => 'wd_countup_image',
                'SVG Code' => 'wd_countup_svg',
            ),
        ),
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", 'compactor'),
            "param_name" => "wd_countup_image",
            "dependency" => Array("element" => "wd_countup_switch", "value" => array('wd_countup_image')),
        ),
        array(
            "type" => "textarea_raw_html", // it will bind a textfield in WP
            "heading" => esc_html__("SVG Code", 'compactor'),
            "param_name" => "svg_code",

            "dependency" => Array("element" => "wd_countup_switch", "value" => array('wd_countup_svg'))
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'compactor'),
            'param_name' => 'wd_coundup_fontawesome',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            'description' => esc_html__('Select icon from library.', 'compactor'),
            "dependency" => Array("element" => "wd_countup_switch", "value" => array('wd_countup_icon')),
        ),

        array(
            "heading" => esc_html__("Icon Color", 'compactor'),
            "type" => "colorpicker",
            "param_name" => "wd_countup_icon_color",
            "dependency" => Array("element" => "wd_countup_switch", "value" => array('wd_countup_icon')),
        ),


        //_______________Number ____________________
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Number", 'compactor'),
            "param_name" => "wd_countup_number",
        ),

        array(
            "heading" => esc_html__("Number Color", 'compactor'),
            "type" => "colorpicker",
            "param_name" => "wd_countup_number_color",
        ),
//___________Title ______________________________
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", 'compactor'),
            "param_name" => "wd_countup_title",
        ),
        array(
            "heading" => esc_html__("Title Text Color", 'compactor'),
            "type" => "colorpicker",
            "param_name" => "wd_countup_title_color",
        ),


        $vc_add_css_animation
    )
));