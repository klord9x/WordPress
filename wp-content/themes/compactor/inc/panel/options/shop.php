<?php
return array(
    array(
        "label" => esc_html__("Background image", 'compactor'),
        "id" => "404_background_image",
        "type" => "imgupload",
        "defaultValue" => "",
        "parentSection" => "Shop Settings",
        "group" => "404 Page settings",
        "description" => esc_html__("", 'compactor'),
    ),
    array(
        "label" => esc_html__("Products displayed per page", 'compactor'),
        "id" => "products_per_page",
        "type" => "text",
        "defaultValue" => "9",
        "parentSection" => "Shop Settings",
        "group" => "Shop Page settings",
        "description" => esc_html__("", 'compactor'),
    ),
    array(
        "label" => esc_html__("Item per line", 'compactor'),
        "id" => "product_column",
        "type" => "text",
        "defaultValue" => "4",
        "parentSection" => "Shop Settings",
        "group" => "Shop Page settings",
        "description" => esc_html__("", 'compactor'),
    ),
);