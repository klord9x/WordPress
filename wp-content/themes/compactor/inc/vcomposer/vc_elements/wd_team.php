<?php

global $vc_add_css_animation;
/*********---------team--------------------------*/
vc_map(array(
    "name" => esc_html__("Team", 'compactor'), // add a name
    "base" => "wd_team", // bind with our shortcode
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "category" => 'Webdevia',
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Style", 'compactor'),
            "param_name" => "team_style",
            "value" => array(
                'Style I' => 'style1',
                'Style II' => 'style2',
                'Style III' => 'style3'
            ),

        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Columns", 'compactor'),
            "param_name" => "columns",
            "value" => '4',
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items Per Page", 'compactor'),
            "param_name" => "itemperpage",
        ),


        $vc_add_css_animation
    )
));