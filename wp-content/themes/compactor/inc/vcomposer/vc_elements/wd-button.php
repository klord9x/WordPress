<?php
global $vc_add_css_animation;
global $compactor_fonts_array;

vc_map(array(
    "name" => esc_html__("Button", 'compactor'),
    "base" => "compactor_button",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", 'compactor'),
            "param_name" => "compactor_btn_text",
            "value" => "Read More",
            "admin_label" => true,
        ),
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button Link", 'compactor'),
            "param_name" => "compactor_btn_link",
            "value" => "#",
        ),
        array(
            "heading" => esc_html__("Button Style", "compactor"),
            "param_name" => "compactor_btn_style",
            "type" => "dropdown",
            'value' => array(
                'Solid' => "btn-solid",
                'Border' => "btn-border",
                'Underline' => "btn-underline",
                'Shadow' => "btn-shadow",
            ),
        ),
        array(
            "heading" => esc_html__("Normal Color", "compactor"),
            "param_name" => "compactorbtn_bg_color",
            "type" => "dropdown",
            'value' => array(
                'Color 1' => "btn-color-1",
                'Color 2' => "btn-color-2",
                'Color 3' => "btn-color-3",
                'Color 4' => "btn-color-4",
                'Color 5' => "btn-color-5",
            ),
        ),
        array(
            "heading" => esc_html__("Hover Color", "compactor"),
            "param_name" => "compactor_btn_hover_bg_color",
            "type" => "dropdown",
            'value' => array(
                'Color 1' => "hover-color-1",
                'Color 2' => "hover-color-2",
                'Color 3' => "hover-color-3",
                'Color 4' => "hover-color-4",
                'Color 5' => "hover-color-5",
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Custom Color", 'compactor'),
            "param_name" => "custom_color",
            "value" => array(esc_html__('Yes, please', 'compactor') => 'yes'),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Text Color", 'compactor'),
            "param_name" => "compactor_btn_custom_text_color",
            'edit_field_class' => 'vc_col-xs-6',
            "dependency" => Array("element" => "custom_color", "value" => array('yes')),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Background Color", 'compactor'),
            "param_name" => "compactor_btn_custom_bg_color",
            'edit_field_class' => 'vc_col-xs-6',
            "dependency" => Array("element" => "custom_color", "value" => array('yes')),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Hover Text Color", 'compactor'),
            "param_name" => "compactor_btncustom_hover_color",
            'edit_field_class' => 'vc_col-xs-6',
            "dependency" => Array("element" => "custom_color", "value" => array('yes')),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Hover Background Color", 'compactor'),
            "param_name" => "compactor_btn_custom_hover_bg_color",
            'edit_field_class' => 'vc_col-xs-6',
            "dependency" => Array("element" => "custom_color", "value" => array('yes')),
        ),
        array(
            "heading" => esc_html__("Button Size", "compactor"),
            "param_name" => "compactorbtn_btn_size",
            "type" => "dropdown",
            'value' => array(
                'Medium (Default)' => "btn-medium",
                'Big' => "btn-big",
                'Small' => "btn-small",
            ),
        ),
        array(
            "heading" => esc_html__("Button Border", "compactor"),
            "param_name" => "compactorbtn_btn_border",
            "type" => "dropdown",
            'value' => array(
                'Round (Default)' => "btn-round",
                'Radius' => "btn-radius",
                'None' => "btn-none",
            ),
        ),
        array(
            "heading" => esc_html__("Alignment", "compactor"),
            "param_name" => "compactorbtn_btn_align",
            "type" => "dropdown",
            'value' => array(
                'Left' => "text-left",
                'Center' => "text-center",
                'Right' => "text-right",
            ),
        ),
        array(
            "heading" => esc_html__("Show Icon", "compactor"),
            "param_name" => "compactor_show_icon",
            "type" => "checkbox",
            "std" => "no",
            'value' => array(esc_html__('Yes, Please', 'compactor') => 'yes'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon', 'compactor'),
            'param_name' => 'compactor_btn_icon',
            "dependency" => Array("element" => "compactor_show_icon", "value" => array('yes')),
        ),
        array(
            "heading" => esc_html__("Icon Position", "compactor"),
            "param_name" => "compactor_btn_icon_position",
            "type" => "dropdown",
            'value' => array(
                'After' => "after",
                'Before' => "before",
            ),
            "dependency" => Array("element" => "compactor_show_icon", "value" => array('yes')),
        ),
        array(
            "heading" => esc_html__("Icon Hover Style", "compactor"),
            "param_name" => "compactor_btn_icon_style",
            "type" => "dropdown",
            'value' => array(
                'None' => "",
                'Style 1' => "icon-hs-1",
                'Style 2' => "icon-hs-2",
            ),
            "dependency" => Array("element" => "compactor_show_icon", "value" => array('yes')),
        ),

        $vc_add_css_animation

    )
));