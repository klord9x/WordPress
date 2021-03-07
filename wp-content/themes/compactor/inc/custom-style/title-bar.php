<?php
$compactor_style = get_post_meta($compactor_thePageID, 'wd_page_title_area_style', true);
$compactor_page_bg_img = get_post_meta($compactor_thePageID, 'wd_page_title_area_bg_img', true);
$compactor_page_bg_color = get_post_meta($compactor_thePageID, 'wd_page_title_area_bg_color', true);
$title_position = get_post_meta($compactor_thePageID, 'wd_page_title_position', true);
$text_color = get_post_meta($compactor_thePageID, 'wd_page_title_color', true);


$compactor_custom_css .= "
      .titlebar { 
        background-image: url(" . esc_url(get_header_image()) . ");"
    . compactor_check_if_empty('background-image', "$compactor_page_bg_img")
    . compactor_check_if_empty('background-color', $compactor_page_bg_color)
    . "background-repeat: no-repeat;
      }
      .titlebar #page-title{ "
    . compactor_check_if_empty('text-align', $title_position)
    . compactor_check_if_empty('color', $text_color)
    . compactor_check_if_empty('color', get_header_textcolor()) . ";
      }
      #page-title,.breadcrumbs a{ "
    . compactor_check_if_empty('color', $text_color) . ";
      }
      ";


if ($compactor_page_bg_img == "") {

    $compactor_title_bg_image = "";
    if (compactor_get_option('compactor_title_bg_image') != "") {
        $compactor_title_bg_image = compactor_get_option('compactor_title_bg_image');
    }
    $compactor_404_bg_image = compactor_get_option('wd_404_page');
    if ($compactor_title_bg_image !== '') {
        $compactor_custom_css .= "
      .titlebar { "
            . compactor_check_if_empty('background-image', "$compactor_title_bg_image")
            . compactor_check_if_empty('text-align', get_post_meta($compactor_thePageID, 'wd_page_title_position', true)) . ";
      }
    
      #page-title,.breadcrumbs a{ "
            . compactor_check_if_empty('color', get_post_meta($compactor_thePageID, 'wd_page_title_color', true)) . ";
      }
      ";
    }
    if ($compactor_404_bg_image != '') {
        $compactor_custom_css .= "
			.corp-titlebar{
				background:url($compactor_404_bg_image)  no-repeat center top;
				background-size: cover;
		 }
		 ";
    }
}