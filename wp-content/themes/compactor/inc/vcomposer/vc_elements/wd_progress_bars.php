<?php
global $vc_add_css_animation;

vc_map(array(
    'name' => esc_html__('Progress Bar', 'compactor'),
    'base' => 'compactor_progressbar',
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'compactor'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'compactor'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'compactor'),
            'param_name' => 'values',
            'description' => esc_html__('Enter values for graph - value, title.', 'compactor'),
            'value' => urlencode(json_encode(array(
                array(
                    'label' => esc_html__('Development', 'compactor'),
                    'value' => '90',
                ),
                array(
                    'label' => esc_html__('Design', 'compactor'),
                    'value' => '80',
                ),
                array(
                    'label' => esc_html__('Marketing', 'compactor'),
                    'value' => '70',
                ),
            ))),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Label', 'compactor'),
                    'param_name' => 'label',
                    'description' => esc_html__('Enter text used as title of bar.', 'compactor'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Label color', 'compactor'),
                    'param_name' => 'label_color',
                    'description' => esc_html__('Enter color text.', 'compactor'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Value', 'compactor'),
                    'param_name' => 'value',
                    'description' => esc_html__('Enter value of bar.', 'compactor'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Value color', 'compactor'),
                    'param_name' => 'value_color',
                    'description' => esc_html__('Enter color text.', 'compactor'),
                    'admin_label' => true,
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Units', 'compactor'),
            'param_name' => 'units',
            'description' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'compactor'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'compactor'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'compactor'),
        ),
        $vc_add_css_animation,
    ),
));