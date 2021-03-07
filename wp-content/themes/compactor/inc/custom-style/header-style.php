<?php
$compactor_custom_css .= "
.header-top.social_top_bar, .orange_bar,
.l-header .header-top .contact-info,
.l-header .header-top i,
.l-header .header-top .social-icons.accent li i,
#lang_sel_list a.lang_sel_sel, #lang_sel_list > ul > li a {
  " . compactor_check_if_empty('color', compactor_get_option('adress_bar_color')) . ";			
}";


$compactor_custom_css .= "
header.l-header .top-bar-container .top-bar .top-bar-left .logo-wrapper .menu-text a img {
" . compactor_check_if_empty('max-height', compactor_get_option('height_logo', '50px')) . ";	
}
header.l-header .top-bar-container.devia-nav .site-navigation.top-bar .top-bar-left .top-bar-title .logo-wrapper .menu-text {
" . compactor_check_if_empty('padding', compactor_get_option('logo_padding', '0')) . ";	
}";


$social_bar_color = compactor_get_option('social_bar_color');
if ($social_bar_color) {
    $compactor_custom_css .= "
    .top-header {
    " . compactor_check_if_empty('background-color', $social_bar_color) . ";
    }";
}
$address_bar_color = compactor_get_option('adress_bar_color');
if ($address_bar_color) {
    $compactor_custom_css .= "
    .top-header .__top-header-right p {
     " . compactor_check_if_empty('color', $address_bar_color) . ";			
    }";
}

// body background image
$body_bg = compactor_get_option('body_background_image');
if ($body_bg) {
    $compactor_custom_css .= "
    body {
     " . compactor_check_if_empty('background-image', $body_bg) . ";
     background-attachment: fixed;		
    }";
}
