<?php

global $vc_add_css_animation;
vc_map(array(
    "name" => esc_html__("Pricing Table", 'compactor'), // add a name
    "base" => "wd_pricing_table", // bind with our shortcode
    "description" => "You can add a prince table",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", 'compactor'),
            "param_name" => "style",
            "value" => array(
                'Style I' => 'pricing1',
                'Style II' => 'pricing2',
            ),
            'edit_field_class' => 'vc_col-xs-6',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", 'compactor'),
            "param_name" => "text_color",
            'edit_field_class' => 'vc_col-xs-6',
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Icon/Image/SVG", 'compactor'),
            "param_name" => "product_icon",
            "dependency" => Array("element" => "style", "value" => array('pricing2')),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'compactor'),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Min Lines (default ' 10 Lines Min ' )", 'compactor'),
            "param_name" => "lines_min",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", 'compactor'),
            "param_name" => "price",
            'edit_field_class' => 'vc_col-xs-4',
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Sub Price", 'compactor'),
            "param_name" => "sub_price",
            'edit_field_class' => 'vc_col-xs-4',
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Currency", 'compactor'),
            "param_name" => "currency",
            'edit_field_class' => 'vc_col-xs-4',
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Per Text default 'Mo Per User '", 'compactor'),
            "param_name" => "per_value",
        ),


        array(
            'type' => 'param_group',
            "heading" => esc_html__("Plan Options", 'compactor'),
            'param_name' => 'sub_options',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter your Sub Options Head Option(multiple field)',
                    'param_name' => 'sub_option',
                )
            )
        ),
        array(
            'type' => 'param_group',
            "heading" => esc_html__("Plan Options", 'compactor'),
            'param_name' => 'plan_options',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter your Plan Option(multiple field)',
                    'param_name' => 'plan_option',
                ),
                array(
                    'type' => 'dropdown',
                    'value' => '',
                    'heading' => 'Shoose Value Of Option',
                    'param_name' => 'has_value',
                    "value" => array(
                        'Default' => 'default',
                        'Close' => 'has-close',
                        'Add On' => 'has-addon',
                        'Close' => 'has-close',
                    ),
                )
            ),
            "dependency" => Array("element" => "style", "value" => array('pricing1')),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Set this table as featured", 'compactor'),
            "param_name" => "featured",
            "value" => array(esc_html__('Yes, please', 'compactor') => 'pricing-table--featured'),
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button Link", 'compactor'),
            "param_name" => "button_link",
            'edit_field_class' => 'vc_col-xs-5',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Text Color", 'compactor'),
            "param_name" => "button_text_color",
            'edit_field_class' => 'vc_col-xs-3',
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button background Color", 'compactor'),
            "param_name" => "button_bg_color",
            'edit_field_class' => 'vc_col-xs-4',
        ),

        array(
            'type' => 'css_editor',
            'heading' => __('Css', 'compactor'),
            'param_name' => 'table_css',
            'group' => __('Design options', 'compactor'),
        ),
        $vc_add_css_animation
    )
));