<?php

global $vc_add_css_animation;
vc_map(array(
    "name" => esc_html__("SVG", 'compactor'), // add a name
    "base" => "wd_svg_code", // bind with our shortcode
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "category" => 'Webdevia',
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textarea_raw_html", // it will bind a textfield in WP
            "heading" => esc_html__("SVG Code", 'compactor'),
            "param_name" => "svg_code",

            'description' => __('Enter your SVG content.', 'compactor'),
            "admin_label" => false,
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Max width", 'compactor'),
            "param_name" => "max_width",
            'value' => '500px',
        ),

        $vc_add_css_animation
    )
));