<?php

/*********---------testimonial--------------------------*/
add_action('admin_init', 'compactor_testimonial_init');

function compactor_testimonial_init()
{
    global $vc_add_css_animation;
    global $wd_fonts_array;
    vc_map(array(
        "name" => esc_html__("Testimonials", 'compactor'), // add a name
        "base" => "webdevia_testimonials", // bind with our shortcode
        "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
        "content_element" => true, // set this parameter when element will has a content
        "is_container" => false, // set this param when you need to add a content element in this element
        // Here starts the definition of array with parameters of our compnent
        "category" => 'Webdevia',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Items To Display", 'compactor'),
                "param_name" => "testimonial_items_to_show",
            ),
            array(
                "type" => "dropdown",
                "param_name" => "testimonials_layout",
                "value" => array(
                    'Testimonials layout 1 (Default)' => "layout_1",
                    'Testimonials layout 2' => "layout_2",
                    'Testimonials layout 3' => "layout_3",
                ),
            ),
            $vc_add_css_animation
        )
    ));
}