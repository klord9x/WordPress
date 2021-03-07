<?php


function compactor_fonts_url($compactor_font_body_name, $compactor_font_weight_style, $compactor_main_text_font_subsets) {
	$compactor_font_url = '';
    $compactor_protocol = is_ssl() ? 'https' : 'http';
	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ('off' !== _x('on', 'Google font: on or off', 'compactor')) {
		$compactor_font_url = $compactor_protocol."://fonts.googleapis.com/css?family=" . $compactor_font_body_name . ":" . str_replace(' ', ',', $compactor_font_weight_style) . "&display=swap&subset=" . $compactor_main_text_font_subsets;
	}
	return $compactor_font_url;
}