<?php

global $vc_add_css_animation;

vc_map(array(
    "name" => esc_html__("Image Box", 'compactor'),
    "base" => "wd_image_with_text",
    "icon" => get_template_directory_uri() . "/inc/images/icon/greenenergy_icon.png",
    "content_element" => true,
    "is_container" => FALSE,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'compactor'),
            "param_name" => "title",
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Text", 'compactor'),
            "param_name" => "text",
        ),
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", 'compactor'),
            "param_name" => "image",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'compactor'),
            'param_name' => 'layout',
            'value' => array('Layout 1' => 1,
                'Layout 2' => 2,
                'Layout 3' => 3,
                'Layout 4' => 4),
            'description' => esc_html__('Select the box style.', 'compactor'),
            'admin_label' => true
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'compactor'),
            'param_name' => 'icon',
            'settings' => array(
                'emptyIcon' => true, // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
            ),
            "dependency" => Array(
                "element" => "layout",
                "value" => array('3', '4')
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("URL to :", 'compactor'),
            "param_name" => "url",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Classes", 'compactor'),
            "param_name" => "extra_classes",
        ),
        $vc_add_css_animation
    )
));