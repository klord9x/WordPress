<?php
$theme_options = array(
    array(
        "name" => esc_html__("General Settings","compactor"),
        "items" => array("General Settings", "Logo Settings", "Page Settings", "Site data"),
        'fields' => include get_template_directory() . '/inc/panel/options/general.php',
    ),
    array(
        "name" => esc_html__("Colors Settings","compactor"),
        "items" => array("Color", "Top Bar Color", "Footer Colors"),
        'fields' => include get_template_directory() . '/inc/panel/options/colors.php',
    ),
    array(
        "name" => esc_html__("Fonts Settings","compactor"),
        "items" => array("Main Typography", "Head Typography", "Navigation Typography"),
        'fields' => include get_template_directory() . '/inc/panel/options/typography.php',
    ),
    array(
        "name" => esc_html__("Blog Settings","compactor"),
        "items" => array("Single Post Settings", "Blog General Settings"),
        'fields' => include get_template_directory() . '/inc/panel/options/blog.php',
    ),
    array(
        "name" => esc_html__("Shop Settings","compactor"),
        "items" => array("404 Page settings", "Shop Page settings"),
        'fields' => include get_template_directory() . '/inc/panel/options/shop.php',
    ),
    array(
        "name" => esc_html__("Footer settings","compactor"),
        "items" => array("Footer settings"),
        'fields' => include get_template_directory() . '/inc/panel/options/footer.php',
    ),
);