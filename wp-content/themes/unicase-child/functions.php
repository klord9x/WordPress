<?php
/**
 * Unicase Child
 *
 * @package unicase-child
 */

/**
 * Include all your custom code here
 */
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
 
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('unicase-style')  );
}