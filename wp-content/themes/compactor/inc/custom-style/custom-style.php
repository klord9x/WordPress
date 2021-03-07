<?php

//********* Variables ***************/
global $wp_query;
$compactor_thePageID = "";
$compactor_custom_css = "";

if (is_object($wp_query) && is_object($wp_query->post) && isset($wp_query->post->ID)) {
    if (!is_search() and !is_404()) {
        $compactor_thePageID = $wp_query->post->ID;
    }
}


//********* Enqueue style ***************/
wp_enqueue_style('custom-line', get_template_directory_uri() . '/style.css');


//********* Includes ***************/
include_once(get_template_directory() . '/inc/custom-style/css-variables.php');
include_once(get_template_directory() . '/inc/custom-style/title-bar.php');
include_once(get_template_directory() . '/inc/custom-style/typography.php');
include_once(get_template_directory() . '/inc/custom-style/heading-style.php');
include_once(get_template_directory() . '/inc/custom-style/header-style.php');
