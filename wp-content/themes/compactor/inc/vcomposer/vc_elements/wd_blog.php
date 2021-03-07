<?php

global $vc_add_css_animation;
/* recent blog
---------------------------------------------------------- */
vc_map(array(
    "name" => esc_html__("Recent Blog Posts", 'compactor'),
    "base" => "wd_blog",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items to display", 'compactor'),
            "param_name" => "itemperpage",
        ),
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Columns", 'compactor'),
            "param_name" => "columns",
            "value" => array('1', '2', '3', '4', '5', '6', '7'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display thumbnail", 'compactor'),
            "param_name" => "show_thumbnail",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display Category", 'compactor'),
            "param_name" => "show_category",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display content", 'compactor'),
            "param_name" => "show_content",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display Post info", 'compactor'),
            "discription" => esc_html__("Display Date / user / category", 'compactor'),
            "param_name" => "show_meta",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display Read more button", 'compactor'),
            "param_name" => "show_readmore",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),
        $vc_add_css_animation


    )
));