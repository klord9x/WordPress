<?php
global $vc_add_css_animation;

vc_map(array(
    "name" => esc_html__("Text Block with Icon", 'compactor'),
    "base" => "wd_icon_text",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Title", 'compactor'),
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "vc_link", // it will bind a textfield in WP
            "heading" => esc_html__("Link", 'compactor'),
            "param_name" => "box_link",
        ),
        array(
            "type" => "textarea", // it will bind a textfield in WP
            "heading" => esc_html__("Text", 'compactor'),
            "param_name" => "text",
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Shadow", 'compactor'),
            "param_name" => "box_shadow",
            "value" => array(
                "Small shadow" => "small-shadow",
                "Medium shadow" => "medium-shadow",
                "Large shadow" => "large-shadow",
                "Border" => "border-shadow",
                "None" => "none",
            ),
            'group' => __('Box style', 'compactor'),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Add hover animation", 'compactor'),
            "param_name" => "hover_animation",
            "std" => "yes",
            'value' => array(esc_html__('Yes, please', 'compactor') => 'yes'),
            'group' => __('Box style', 'compactor'),
        ),
	    array(
		    "type" => "textfield", // it will bind a textfield in WP
		    "heading" => esc_html__("Inner content padding", 'compactor'),
		    "param_name" => "inner_padding",
		    "admin_label" => true,
		    'group' => __('Box style', 'compactor'),
	    ),
        array(
            'type' => 'css_editor',
            'heading' => __('Css', 'compactor'),
            'param_name' => 'css',
            'group' => __('Design options', 'compactor'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Image type:', 'compactor'),
            'param_name' => 'choice',
            'value' => array(
                'Icon' => 'icon_choice',
                'Image File (png, jpg, svg, gif)' => 'image_choice',
                'SVG Code' => 'svg_choice',
            ),
        ),
        array(
            "type" => "iconpicker", // it will bind a textfield in WP
            "heading" => esc_html__("Icon", 'compactor'),
            "param_name" => "icon",

            "dependency" => Array("element" => "choice", "value" => array('icon_choice'))
        ),
        array(
            "type" => "colorpicker", // it will bind a textfield in WP
            "heading" => esc_html__("Icon Color", 'compactor'),
            "param_name" => "icon_color",

            "dependency" => Array("element" => "choice", "value" => array('icon_choice'))
        ),
        array(
            "type" => "attach_image", // it will bind a textfield in WP
            "heading" => esc_html__("Image File", 'compactor'),
            "param_name" => "image",
            "dependency" => Array("element" => "choice", "value" => array('image_choice'))
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Image width", 'compactor'),
            "param_name" => "image_width",
            "dependency" => Array("element" => "choice", "value" => array('image_choice'))
        ),
        array(
            "type" => "textarea_raw_html", // it will bind a textfield in WP
            "heading" => esc_html__("SVG Code", 'compactor'),
            "param_name" => "secondary_svg",

            "dependency" => Array("element" => "choice", "value" => array('svg_choice'))
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon / Image / SVG Position', 'compactor'),
            'param_name' => 'position',
            'value' => array(
                'Left' => 'left_position',
                'Top' => 'top_position',
                'Right' => 'right_position',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Align', 'compactor'),
            'param_name' => 'text_align',
            'value' => array(
                'Center' => 'center',
                'left' => 'left',
                'Right' => 'right',
            ),
            "dependency" => Array("element" => "position", "value" => array('top_position'))
        ),

        array(
            "type" => "checkbox",
            "param_name" => "enable_split",
            "heading" => esc_html__("Enable Split?", "compactor"),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "split_type",
            "heading" => esc_html__("Split Type", "compactor"),
            "value" => array(
                esc_html__("Lines", "compactor") => "lines",
                esc_html__("Characters", "compactor") => "chars, words",
                esc_html__("Words", "compactor") => "words",
            ),
            "dependency" => array(
                "element" => "enable_split",
                "value" => "true",
            )
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'enable_content_animation',
            'value' => array(esc_html__('Yes', 'compactor') => 'yes'),
            'heading' => esc_html__('Custom Animation', 'compactor'),
            'description' => esc_html__('Will enable animation, it will be animated when it "enters" the browsers viewport.', 'compactor'),
        ),
    )
));

wdevia_vc_add_animation_param("wd_icon_text");