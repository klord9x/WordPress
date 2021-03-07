<?php

$compactor_custom_css .= "
    :root {
      --primary-color:            " . esc_html(compactor_get_option('primary_color', WD_PRIMARY_COLOR)) . ";
      --secondary-color:          " . esc_html(compactor_get_option('secondary_color', WD_SECONDARY_COLOR)) . ";
      --accent-color:             " . esc_html(compactor_get_option('accent_color', WD_ACCENT_COLOR)) . ";
      --border-color:             #E6E6F1;
      
      --header-color:             " . esc_html(compactor_get_option('header_text_color', WD_HEADER_COLOR)) . ";
      --body-background-color:    " . esc_html(compactor_get_option('body_bg_color')) . ";
      
      --topbar-background:        " . esc_html(compactor_get_option('header_bg_color')) . ";
      --topbar-text:              " . esc_html(compactor_get_option('nav_text_color', WD_NAV_TEXT_COLOR)) . ";
      --topbar-sticky-bg:         " . esc_html(compactor_get_option('sticky_nav_bg_color', WD_STICKY_NAV_BG_COLOR)) . ";
      --topbar-sticky-text:       " . esc_html(compactor_get_option('sticky_nav_text_color', WD_STICKY_NAV_TEXT_COLOR)) . ";
      --topbar-hover-sticky-text: " . esc_html(compactor_get_option('hover_sticky_nav_text_color', WD_HOVER_STICKY_NAV_TEXT_COLOR)) . ";
      --topbar-hover-text:        " . esc_html(compactor_get_option('hover_nav_text_color', WD_HOVER_NAV_TEXT_COLOR)) . ";
   
      --footer-background:        " . esc_html(compactor_get_option('footer_bg_color', WD_FOOTER_BG_COLOR)) . ";
      --footer-background-image: url(" . esc_html(compactor_get_option('footer_bg_img', WD_FOOTER_BACKGROUND_IMAGE)) . ");
      --footer-text-color:        " . esc_html(compactor_get_option('footer_text_color', WD_FOOTER_TEXT_COLOR)) . ";
      --copyright-background:     " . esc_html(compactor_get_option('copyright_bg_color', WD_COPYRIGHT_BG)) . ";
      --copyright-text:           " . esc_html(compactor_get_option('copyright_text_color', WD_COPYRIGHT_TEXT_COLOR)) . ";
    }";