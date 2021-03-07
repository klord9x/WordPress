<?php
return array(
    array(
        "label" => esc_html__("Main Typography", 'compactor'),
        "id" => "body",
        "type" => "font",
        "defaultValue" => compactor_google_fonts_array(),
        "parentSection" => "Fonts Settings",
        "group" => "Main Typography",
        "description" => esc_html__("Main Typography", 'compactor'),
    ),
    array(
        "label" => esc_html__("Head Typography", 'compactor'),
        "id" => "head",
        "type" => "font",
        "defaultValue" => compactor_google_fonts_array(),
        "parentSection" => "Fonts Settings",
        "group" => "Head Typography",
        "description" => esc_html__("Head Typography", 'compactor'),
    ),
    array(
        "label" => esc_html__("Navigation Typography", 'compactor'),
        "id" => "nav",
        "type" => "font",
        "defaultValue" => compactor_google_fonts_array(),
        "parentSection" => "Fonts Settings",
        "group" => "Navigation Typography",
        "description" => esc_html__("Navigation Typography", 'compactor'),
    ),
);