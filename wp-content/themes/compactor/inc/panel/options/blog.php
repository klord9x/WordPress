<?php
return array(
    // array(
    //     "label" => esc_html__('Pagination Type', 'compactor'),
    //     "id" => "pagination_type",
    //     "type" => "checkbox",
    //     "defaultValue" => WD_BOXED_LAYOUT,
    //     "parentSection" => "Blog Settings",
    //     "group" => "Blog General Settings",
    //     "description" => esc_html__("The boxed layout has a padding around the main wrapper", 'compactor'),
    // ),
    array(
        "label" => esc_html__("Display Next & Previous Posts", 'compactor'),
        "id" => "show_next_previous_posts",
        "type" => "checkbox",
        "defaultValue" => SHOW_NEXT_PREVIOUS_POSTS,
        "parentSection" => "Blog Settings",
        "group" => "Single Post Settings",
        "description" => esc_html__("Display related posts", 'compactor'),
    ),
    array(
        "label" => esc_html__("Related Post", 'compactor'),
        "id" => "show_related_posts",
        "type" => "checkbox",
        "defaultValue" =>SHOW_RELATED_POSTS,
        "parentSection" => "Blog Settings",
        "group" => "Single Post Settings",
        "description" => esc_html__("Display related posts", 'compactor'),
    ),
);