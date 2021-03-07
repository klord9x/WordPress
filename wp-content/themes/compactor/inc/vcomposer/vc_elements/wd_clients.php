<?php

global $vc_add_css_animation;
/* our client
---------------------------------------------------------- */


vc_map(array(
    "name" => esc_html__("Clients", 'compactor'),
    "base" => "wd_client",
    "category" => __("Webdevia", 'compactor'),
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            'type' => 'attach_images',
            'heading' => esc_html__('Images', 'compactor'),
            'param_name' => 'images',

        )
    , array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Layout Style", 'compactor'),
            "param_name" => "layout_style",
            "value" => array('Carousel' => 'carousel',
                'Grid' => 'grid'),
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Carousel Style", 'compactor'),
            "param_name" => "carousel_style",
            "value" => array(
                'Style 1 (Default)' => 'style_1',
                'Style 2' => 'style_2'),
            "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Elements To Show", 'compactor'),
            "param_name" => "elements_to_show",
            "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Image size", 'compactor'),
            "param_name" => "image_size",
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display nav arrow", 'compactor'),
            "param_name" => "nav_arrow",
            "value" => array(esc_html__('Yes, please', 'compactor') => 'yes'),
            "dependency" => Array("element" => "layout_style", "value" => array('carousel'))
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Hover gray scale", 'compactor'),
            "param_name" => "grayscale",
            "value" => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display as Marquee (infinite loop)", 'compactor'),
            "param_name" => "marquee",
            "value" => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Columns", 'compactor'),
            "param_name" => "columns",
            "dependency" => Array("element" => "layout_style", "value" => array('grid'))
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Shadow", 'compactor'),
            "param_name" => "box_shadow",
            "value" => array(
                "None" => "none",
                "Small" => "small-shadow",
                "Medium" => "medium-shadow",
                "Large" => "large-shadow",
            ),
            'group' => __('Box style', 'compactor'),
        ),


        $vc_add_css_animation
    )
));