<?php

global $vc_add_css_animation;
vc_map(array(
    "name" => esc_html__("Advanced Search", 'compactor'), // add a name
    "base" => "wd_advanced_search", // bind with our shortcode
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "category" => 'Webdevia',
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "category" => 'Webdevia',
    "params" => array(
        array(
            "heading" => esc_html__("Search Layout", 'compactor'),
            "type" => "dropdown",
            "param_name" => "search_layout",
            "value" => array(
                'One Line' => 'one_line',
                'Multi-line' => 'multi_line',
            )
        ),
        array(
            "heading" => esc_html__("Text (HTML) Before", 'compactor'),
            "type" => "textarea_raw_html",
            'value' => 'I am a text change me',
            "param_name" => "text_before",
        ),
        array(
            "heading" => esc_html__("Text (HTML) after", 'compactor'),
            "type" => "textarea_raw_html",
            'value' => 'I am a text change me',
            "param_name" => "text_after",
        ),
        array(
            "heading" => esc_html__("Button Text", 'compactor'),
            "type" => "textfield",
            'value' => 'I am a title change me',
            "param_name" => "button_text",
        ),
        array(
            'type' => 'css_editor',
            'heading' => __('Css', 'compactor'),
            'param_name' => 'css',
            'group' => __('Design options', 'compactor'),
        ),
    )
));