<?php
vc_map(array(
    "name" => esc_html__("Wd Empty Space", 'compactor'),
    "base" => "wd_empty_spaces",
    "icon" => get_template_directory_uri() . "/images/icon/meknes.png",
    "content_element" => true,
    "is_container" => true,
    "category" => 'Webdevia',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Mobile", 'compactor'),
            "param_name" => "height_mobile",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Tablet", 'compactor'),
            "param_name" => "height_tablet",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Height in Desktop", 'compactor'),
            "param_name" => "height_desktop",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra Classes", 'compactor'),
            "param_name" => "extra_classes",
        )
    )
));