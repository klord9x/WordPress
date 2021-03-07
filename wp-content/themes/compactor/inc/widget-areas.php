<?php
/**
 *----------------- Register sidebars------------------------------------------
 */

function compactor_widgets_init()
{
  //--------------- Widget for Right Sidebar
  register_sidebar(array(
    'name' => esc_html__('Sidebar', 'compactor'),
    'id' => 'sidebar-1',
    'description' => esc_html__('Add widgets here to appear in your right sidebar.', 'compactor'),
    'before_widget' => '<section>',
    'after_widget' => '</section>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));

  //--------------- Widget for left Sidebar
  register_sidebar(array(
    'name' => esc_html__('Second Sidebar', 'compactor'),
    'id' => 'sidebar-left',
    'description' => esc_html__('Add widgets here to appear in your left sidebar.', 'compactor'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));
  //--------------- Widget for first column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 1st column', 'compactor'),
    'id' => 'footer',
    'description' => esc_html__('Add widgets here to appear in your first footer column.', 'compactor'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));
  //--------------- Widget for 2nd column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 2nd column', 'compactor'),
    'id' => 'footer_columns_tow',
    'description' => esc_html__('Add widgets here to appear in your 2nd footer column.', 'compactor'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));
  //--------------- Widget for 3rd column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 3rd column', 'compactor'),
    'id' => 'footer_columns_three',
    'description' => esc_html__('Add widgets here to appear in your 3rd footer column.', 'compactor'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));
  //--------------- Widget for 4th column Footer
  register_sidebar(array(
    'name' => esc_html__('Footer 4th column', 'compactor'),
    'id' => 'footer_columns_four',
    'description' => esc_html__('Add widgets here to appear in your 4th footer column.', 'compactor'),
    'before_widget' => '<div id="%1$s" class=" %2$s ">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="block-title">',
    'after_title' => '</h4>',
  ));
  //--------------- Widget for woocomerce Sidebar
  register_sidebar(array('name' => esc_html__('Woocommerce Sidebar', 'compactor'),
    'id' => 'shop-widgets',
    'description' => esc_html__('Appears on the shop page of your website.', 'compactor'),
    'before_widget' => '<div id="%1$s" class="widget %2$s shop-widgets">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
}

add_action('widgets_init', 'compactor_widgets_init');