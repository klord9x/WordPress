<?php

/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 */

if (!function_exists('compactor_theme_support')) {
    function compactor_theme_support()
    {
        load_theme_textdomain('compactor', get_template_directory() . '/languages');

        if (function_exists('add_theme_support')) {
            add_theme_support('post-thumbnails');
            add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));
            add_theme_support('automatic-feed-links');
            add_theme_support('woocommerce', array(
                'thumbnail_image_width' => 700,
                'single_image_width' => 800,
                'gallery_thumbnail_image_width' => 200
            ));
            add_theme_support('custom-background');
            add_theme_support('title-tag');
            add_theme_support('custom-header', array(
                'width' => 1920,
                'height' => 470,
                'default-image' => '',
            ));
            // Add support for editor styles.
            add_theme_support('editor-styles');
            // Enqueue editor styles.
            add_editor_style('css/editor.css');
            add_theme_support('align-wide');
            // -- Disable custom font sizes
            add_theme_support('disable-custom-font-sizes');
            // -- Editor Font Sizes
            add_theme_support('editor-font-sizes', array(
                array(
                    'name' => esc_html__('small', 'compactor'),
                    'shortName' => esc_html__('S', 'compactor'),
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => esc_html__('regular', 'compactor'),
                    'shortName' => esc_html__('M', 'compactor'),
                    'size' => 16,
                    'slug' => 'regular'
                ),
                array(
                    'name' => esc_html__('large', 'compactor'),
                    'shortName' => esc_html__('L', 'compactor'),
                    'size' => 28,
                    'slug' => 'large'
                ),
            ));
            // -- Editor Color Palette
            add_theme_support('editor-color-palette', array(
                array(
                    'name' => esc_html__('Primary Color:', 'compactor'),
                    'slug' => 'primary',
                    'color' => '#FDB900',
                ),
                array(
                    'name' => esc_html__('Secondary Color:', 'compactor'),
                    'slug' => 'secondary',
                    'color' => '#412AAB',
                ),
            ));
        }
    }
    add_action('after_setup_theme', 'compactor_theme_support');
}
