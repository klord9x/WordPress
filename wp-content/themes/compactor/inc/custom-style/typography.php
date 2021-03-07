<?php
if (is_rtl()) {
    $compactor_custom_css .= "body, p, #lang_sel_list {
            font-family : 'Droid Arabic Kufi', serif;
          } ";

    $compactor_custom_css .= "h1, h2, h3, h4, h5, h6 {
              font-family : 'Droid Arabic Naskh', serif;
            } ";
} else {
    $compactor_custom_css .= "body, body p {
		  " . compactor_check_if_empty('font-family', html_entity_decode(compactor_get_option('body_font_family', WD_BODY_FONT_FAMILY_FALLBACK), ENT_QUOTES)) . "
		  " . compactor_check_if_empty('font-size', compactor_get_option('body_font_size')) . "
		  " . compactor_check_if_empty('font-style', compactor_get_option('body_font_style')) . "
		  " . compactor_check_if_empty('font-weight', compactor_get_option('body_font_weight', WD_BODY_FONT_WEIGHT) ) . "
		  " . compactor_check_if_empty('letter-spacing', compactor_get_option('body_letter_spacing')) . "
    }";

    $compactor_custom_css .= "
    h1, h2, h3, h4, h5, h6, .menu-list a {
    	" . compactor_check_if_empty("font-family", compactor_get_option('head_font_family', WD_HEAD_FONT_FAMILY_FALLBACK)) . ";
    	" . compactor_check_if_empty("font-style", compactor_get_option('head_font_style')) . ";
    	" . compactor_check_if_empty("font-weight", compactor_get_option('head_font_weight')) . ";
	    " . compactor_check_if_empty("letter-spacing", compactor_get_option('head_letter_spacing')) . ";
    }";

    $compactor_custom_css .= "header.l-header .top-bar-container.devia-nav .site-navigation.top-bar .top-bar-right .menu li a {
			" . compactor_check_if_empty("font-family", compactor_get_option('nav_font_family', WD_NAV_FONT_FAMILY_FALLBACK)) . ";
    	" . compactor_check_if_empty("font-size", compactor_get_option('nav_font_size')) . ";
			" . compactor_check_if_empty("font-style", compactor_get_option('nav_font_style')) . ";
			" . compactor_check_if_empty("font-weight", compactor_get_option('nav_font_weight')) . ";
			" . compactor_check_if_empty("letter-spacing", compactor_get_option('wd_navigation_text_transform')) . ";

		}";
}