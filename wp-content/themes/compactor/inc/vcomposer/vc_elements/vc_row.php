<?php

/*============================= Row =====================================*/

vc_add_param("vc_row",
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__('Text Color', 'compactor'),
        'param_name' => 'font_color',
        'description' => esc_html__('Select font color', 'compactor'),
    )
);
vc_add_param("vc_row", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Parallax",
    "param_name" => "parallax",
    "value" => array("Use background as parallax ?" => "yes")
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Parallax Speed",
    "param_name" => "speed",
    'dependency' => array(
        'element' => 'parallax',
        'not_empty' => true,
    ),
));
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "heading" => "Delimiter Style",
    "param_name" => "wd_row_delimiter_style",
    "value" => array('none' => "none",
        'Vertical line at the bottom center' => "vertical_line_bottom_center",
        'Vertical line at the bottom right' => "vertical_line_bottom_right",
        'Vertical line at the bottom left' => "vertical_line_bottom_left",
    ),
    "group" => "Delimiter"
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Delimiter Height",
    "param_name" => "wd_row_delimiter_height",
    "dependency" => Array("element" => "wd_row_delimiter_style",
        "value" => array('vertical_line_bottom_center',
            'vertical_line_bottom_right',
            'vertical_line_bottom_left')),
    "group" => "Delimiter"
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "heading" => esc_html__("Border Color", 'compactor'),
    "param_name" => "wd_row_delimiter_color",
    "value" => "#bbb",
    "dependency" => Array("element" => "wd_row_delimiter_style",
        "value" => array('vertical_line_bottom_center',
            'vertical_line_bottom_right',
            'vertical_line_bottom_left')),
    "group" => "Delimiter"
));


vc_add_param("vc_row", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => "Equal Height Columns",
    "param_name" => "equalizer",
    "value" => array("Create equal height content on your row ?" => "yes")
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => "Background text parallax",
    "param_name" => "text_paralax",
    "description" => "text background parallax",
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => "Background text parallax offset",
    "param_name" => "text_parallax_offset",
    'value' => '0',
    "description" => "text background parallax offset (200px)",
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => "Animation Delay (ms)",
    "param_name" => "animation_delay",
    "description" => "Animation delay to add to this row children.",
));

vc_add_param("vc_row", array(
    'type' => 'dropdown',
    'heading' => esc_html__('Background Position', 'compactor'),
    'param_name' => 'background_position',
    'group' => esc_html__('Design Options', 'compactor'),
    'value' => array(
        'default' => 'default',
        'left top' => 'left top',
        'left center' => 'left center',
        'left bottom' => 'left bottom',
        'right top' => 'right top',
        'right center' => 'right center',
        'right bottom' => 'right bottom',
        'center top' => 'center top',
        'center' => 'center',
        'center bottom' => 'center bottom',


    ),
    'std' => 'default',
));

vc_add_param("vc_row", array(
    'type' => 'checkbox',
    'param_name' => 'enable_content_animation',
    'value' => array(esc_html__('Yes', 'compactor') => 'yes'),
    'heading' => esc_html__('Animate Columns?', 'compactor'),
    'description' => esc_html__('Will enable animation for columns, it will be animated when it "enters" the browsers viewport.', 'compactor'),
));


wdevia_vc_add_animation_param("vc_row");
vc_remove_param("vc_row", "css_animation");