<?php
$compactor_custom_css .= "
		.wd-heading{ "
    . compactor_check_if_empty('margin-top', compactor_get_option('heading_space_top'))
    . compactor_check_if_empty('margin-bottom', compactor_get_option('heading_space_bottom')) . "
		}";

$compactor_custom_css .= "
		.wd-heading .title_a { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_a_title_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_a_title_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_a_title_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_a_title_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_a_title_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_a_title_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_a_title_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_a_title_letter_spacing')) . "
		}
		.wd-heading .sub_title_a { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_a_subtitle_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_a_subtitle_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_a_subtitle_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_a_subtitle_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_a_subtitle_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_a_subtitle_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_a_subtitle_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_a_subtitle_letter_spacing')) . "		
		}
		";

$compactor_custom_css .= "
		.wd-heading .title_b { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_b_title_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_b_title_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_b_title_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_b_title_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_b_title_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_b_title_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_b_title_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_b_title_letter_spacing')) . "
		}
		.wd-heading .sub_title_b { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_b_subtitle_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_b_subtitle_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_b_subtitle_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_b_subtitle_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_b_subtitle_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_b_subtitle_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_b_subtitle_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_b_subtitle_letter_spacing')) . "
		}
		";
$compactor_custom_css .= "
		.wd-heading .title_c { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_c_title_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_c_title_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_c_title_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_c_title_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_c_title_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_c_title_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_c_title_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_c_title_letter_spacing')) . "
		}
		.wd-heading .sub_title_c { "
    . compactor_check_if_empty('font-family', compactor_get_option('heading_c_subtitle_font_family'))
    . compactor_check_if_empty('font-style', compactor_get_option('heading_c_subtitle_font_style'))
    . compactor_check_if_empty('font-weight', compactor_get_option('heading_c_subtitle_font_weight'))
    . compactor_check_if_empty('font-size', compactor_get_option('heading_c_subtitle_font_size'))
    . compactor_check_if_empty('color', compactor_get_option('heading_c_subtitle_font_color'))
    . compactor_check_if_empty('text-transform', compactor_get_option('heading_c_subtitle_text_transform'))
    . compactor_check_if_empty('line-height', compactor_get_option('heading_c_subtitle_line_height'))
    . compactor_check_if_empty('letter-spacing', compactor_get_option('heading_c_subtitle_letter_spacing')) . "
		}";

$compactor_custom_css .= "
		.wd-heading .hr_a { "
    . compactor_check_if_empty('border-bottom-style', compactor_get_option('headings_a_separator_style'))
    . compactor_check_if_empty('border-bottom-width', compactor_get_option('heading_a_separator_width'))
    . compactor_check_if_empty('border-bottom-color', compactor_get_option('heading_a_separator_color')) . "
        width: 73px;
		}";

$compactor_custom_css .= "
		.wd-heading .hr_b { "
    . compactor_check_if_empty('border-bottom-style', compactor_get_option('headings_b_separator_style'))
    . compactor_check_if_empty('border-bottom-width', compactor_get_option('heading_b_separator_width'))
    . compactor_check_if_empty('border-bottom-color', compactor_get_option('heading_b_separator_color')) . "
		}";

$compactor_custom_css .= "
		.wd-heading .hr_c { "
    . compactor_check_if_empty('border-bottom-style', compactor_get_option('headings_c_separator_style'))
    . compactor_check_if_empty('border-bottom-width', compactor_get_option('heading_c_separator_width'))
    . compactor_check_if_empty('border-bottom-color', compactor_get_option('heading_c_separator_color')) . "
		}";