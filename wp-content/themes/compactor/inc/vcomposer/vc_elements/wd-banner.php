<?php
global $vc_add_css_animation;

vc_map(array(
    "name" => esc_html__("Banner", 'compactor'),
    "base" => "wd_banner",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'compactor'),
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Image File", 'compactor'),
            "param_name" => "image",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Image Size", 'compactor'),
            "param_name" => "image_size",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Box Layout', 'compactor'),
            'param_name' => 'box_layout',
            'value' => array(
                'Text Bottom style 1' => 'style_1',
                'Text Bottom style 2' => 'style_2',
                'Banner Text Holder' => 'style_3',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Align', 'compactor'),
            'param_name' => 'text_align',
            'value' => array(
                'Text left' => 'text-left',
                'Text Center' => 'text-center',
                'Text Right' => 'text-right',
            ),
            "dependency" => Array("element" => "box_layout", "value" => array('style_1', 'style_2'))
        ),
        array(
            "type" => "vc_link", // it will bind a textfield in WP
            "heading" => esc_html__("Link", 'compactor'),
            "param_name" => "box_link",
        ),
        array(
            'type' => 'css_editor',
            'heading' => __('Css', 'compactor'),
            'param_name' => 'css',
            'group' => __('Design options', 'compactor'),
        ),
    )
));

wdevia_vc_add_animation_param("wd_banner");