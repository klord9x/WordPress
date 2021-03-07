<?php

global $vc_add_css_animation;
global $wd_fonts_array;

/* our client
---------------------------------------------------------- */
vc_map(array(
    "name" => esc_html__("Models Search", 'compactor'),
    "base" => "compactor_models",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "heading" => esc_html__("Title", 'compactor'),
            "type" => "textfield",
            'value' => 'I am a title change me',
            "param_name" => "headings_title",
        ),
        array(
            "heading" => esc_html__("Alignment", 'compactor'),
            "type" => "dropdown",
            "param_name" => "headings_alignment",
            "value" => array('Center' => "center",
                'Left' => "left",
                'Right' => "right"),
            "group" => "Title Typography"
        ),
        //////////// Title Typography
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Family", 'compactor'),
            "param_name" => "compactor_heading_font_family",
            'value' => $wd_fonts_array,
            "group" => "Title Typography",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Style", 'compactor'),
            "param_name" => "compactor_heading_font_style",
            'value' => array(
                esc_html__('Normal', 'compactor') => 'normal',
                esc_html__('Italic', 'compactor') => 'italic',
                esc_html__('Inherit', 'compactor') => 'inherit',
                esc_html__('Initial', 'compactor') => 'initial',
            ),
            "group" => "Title Typography"
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Weight", 'compactor'),
            "param_name" => "compactor_heading_font_weight",
            'value' => array(
                esc_html__('Default', 'compactor') => '400',
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
            ),
            "group" => "Title Typography"
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Font Size", 'compactor'),
            "param_name" => "compactor_heading_font_size",
            "min" => 14,
            "suffix" => "px",
            "group" => "Title Typography",
        ),
        array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_html__("Font Color", 'compactor'),
            "param_name" => "compactor_heading_color",
            "value" => "",
            "group" => "Title Typography",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Transform", 'compactor'),
            "param_name" => "compactor_heading_text_transform",
            'value' => array(
                esc_html__('Default', 'compactor') => 'None',
                'lowercase' => 'Lowercase',
                'uppercase' => 'Uppercase',
                'capitalize' => 'Capitalize',
                'inherit' => 'Inherit',
            ),
            "group" => "Title Typography"
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Line Height", 'compactor'),
            "param_name" => "compactor_heading_line_height",
            "value" => "",
            "suffix" => "px",
            "group" => "Title Typography"
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Letter spacing", 'compactor'),
            "param_name" => "compactor_heading_letter_spacing",
            "value" => "",
            "suffix" => "px",
            "group" => "Title Typography"
        ),

        // Button
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", 'compactor'),
            "param_name" => "compactor_button_text",
            "value" => "Click Me",
            "group" => "Button Typography",
        ),

        $vc_add_css_animation
    )
));