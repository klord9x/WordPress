<?php
$image_src = $align = $el_width = $el_aspect = $output = $title = $link = $size = $el_class = $video_thumb_image = $video_thumb_html = $video_module_mode = $video_source = $video_id = $video_title = $description = $wrapper_extra_class = $module_alignment = $label_background = $label_css = $icon_color = $icon_css = '';
extract(shortcode_atts(array(
	'title' => '',
	'video_module_mode' => 'simple',
	'link' => 'http://vimeo.com/92033601',
	'size' => (isset($content_width)) ? $content_width : 500,
	'video_source' => 'youtube',
	'video_id' => 'RUCc7kY9BvA',
	'el_class' => '',
	'video_thumb_image' => '',
	'video_thumb_image_size' => '800x530',
	'modal_size' => 'medium',
	'module_alignment' => 'text-left',
	'icon_color' => '',
	'label_background' => '',
	'css' => ''

), $atts));

$unique_id = uniqid('module_video_');

if ($link == '') {
	return null;
}
$el_class = $this->getExtraClass($el_class);

$video_thumb_image_size = str_replace("X", "x", $video_thumb_image_size);
$video_thumb_image_size = explode("x", $video_thumb_image_size);


$video_w = $video_thumb_image_size[0];
$video_h = $video_thumb_image_size[1]; //1.61 golden ratio

$embed = '';

if (isset($video_thumb_image) && !empty($video_thumb_image)) {
	if (empty($video_thumb_image_size)) {
		$video_thumb_image_size = '800x530';
	}
	$sap = str_replace(array('X', 'x'), 'X', $video_thumb_image_size);
	$compactor_image_size_ = explode('X', $sap);
	if (isset($compactor_image_size_[0])) {
		$compactor_image_size_w = $compactor_image_size_[0];
	}
	if (isset($compactor_image_size_[1])) {
		$compactor_image_size_h = $compactor_image_size_[1];
	} else {
		$compactor_image_size_h = '100';
	}

	$thumb = preg_replace('/[^\d]/', '', $video_thumb_image);
	$img_url = wp_get_attachment_url($thumb, 'full');
	if ($compactor_image_size_h != '') {
		$image_src = compactor_image_resize($img_url, $compactor_image_size_w, $compactor_image_size_h, true);
	} else {
		$image_src = compactor_image_resize($img_url, $compactor_image_size_w, true);
	}
} else {
	$compactor_image_size_w = '100';
	$compactor_image_size_h = '100';
}

if (strcmp($video_module_mode, 'full_screen') === 0) {
	if ($label_background != '' || $icon_color != '') {
		$icon_css .= 'style="';
		if ($label_background != '' || $label_background != '#ff337f') {
			$icon_css .= 'background: ' . esc_attr($label_background) . ';';
		}
		if ($icon_color != '') {
			$icon_css .= 'color: ' . esc_attr($icon_color) . ';';
		}
		$icon_css .= '"';
	}
	$modal_id = uniqid('modal');

	$embed .= '<a href="#" id="play" data-toggle="' . esc_attr($modal_id) . '" data-reveal-id="' . esc_attr($modal_id) . '" class="play popup1_open">';

	$embed .= '<i ' . $icon_css . ' class="fa fa-play fa-1x"></i>';
	$embed .= '<span>' . $title . '</span><div class="playvideo_animation"></div>
	           <div class="playvideo_animation" style="animation-delay: 1.2s;"></div>
	           <div class="playvideo_animation" style="animation-delay: 2.4s;"></div></a>';

	$embed .= '<div class="medium reveal" id="' . esc_attr($modal_id) . '" data-reveal data-reset-on-close="true" data-animation-in="fade-in" data-animation-out="fade-out">
						  <div class="flex-video widescreen">';
	if ($video_source == 'youtube') {
		$data_setup = "data-setup={\"techOrder\":[\"youtube\"],\"sources\":[{\"type\":\"video/youtube\",\"src\":\"https://www.youtube.com/watch?v=$video_id\"}],\"youtube\":{\"customVars\":{\"wmode\":\"transparent\"}}}";
		 $embed .= '<video 
			id="play" class="video-js vjs-default-skin" 
			controls=""  
			width="' . $video_w . '" height="' . $video_h . '"
			'.$data_setup.'>
			</video>';
	} else {
		$embed .= '<iframe width="1280" height="720" src="http://player.vimeo.com/video/' . esc_attr($video_id) . '?rel=0&amp;controls=0&amp;showinfo=0" allowfullscreen></iframe>';
	}
	$embed .= '	 </div>
						  <a class="close-button" data-close aria-label="Close reveal">&#215;</a>
						</div>';
	$embed .= '<div class="clearfix"></div>';

} elseif (strcmp($video_module_mode, 'simple') === 0) {
	/** @var WP_Embed $wp_embed */
	global $wp_embed;
	$embed .= $wp_embed->run_shortcode('[embed width="' . $video_w . '"' . $video_h . ']' . $link . '[/embed]');
	if (isset($video_thumb_image) && !empty($video_thumb_image)) {
		$thumb_image_url = wp_get_attachment_image_src($video_thumb_image, 'full');
		$image_src = aq_resize($thumb_image_url[0], $video_w, $video_h, true, true, true);
		if (!$image_src) {
			$image_src = $thumb_image_url[0];
		}
		$video_thumb_html .= '<a href="#" class="wd-video-image-thumb" title="' . esc_attr__('Play video', 'compactor') . '"><i style="' . esc_attr($icon_css) . '" class="fa fa-play-circle fa-5x"></i><img src="' . esc_url($image_src) . '" alt="' . esc_attr__("video screen", "compactor") . '" /></a>';
	}
}
$el_classes = array(
	'wpb_video_widget',
	'wpb_content_element',
	'vc_clearfix',
	$el_class,
	vc_shortcode_custom_css_class($css, ' '),
	'vc_video-aspect-ratio-' . esc_attr($el_aspect),
	'vc_video-el-width-' . esc_attr($el_width),
	'vc_video-align-' . esc_attr($align),
);
$css_class = implode(' ', $el_classes);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $css_class, $this->getShortcode(), $atts);
$wrapper_attributes = array();
if (!empty($el_id)) {
	$wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}


$wrapper_extra_class .= " " . $module_alignment;
if (strcmp($video_module_mode, 'full_screen') === 0) {
	$output .= '<div class="wd-video-box-bg ' . esc_attr($css_class) . '" ' . implode(' ', $wrapper_attributes) . ' style="background: url(' . esc_url($image_src) . ') center center no-repeat;
background-size: cover">';
} else {
	$output .= '<div class="' . esc_attr($css_class) . '" ' . implode(' ', $wrapper_attributes) . '>';
}
$output .= "\n\t\t" . '<div class="wpb_wrapper">';

$output .= '<div class="wd-video-box" style="min-height: ' . esc_attr($compactor_image_size_h) . 'px; min-width: ' . esc_attr($compactor_image_size_w) . 'px;">';

$output .= $video_thumb_html;
if (strcmp($video_module_mode, 'simple') === 0) {
	$video_wrapper = 'wpb_video_wrapper';
} elseif (strcmp($video_module_mode, 'full_screen') === 0) {
	$video_wrapper = 'full_screen_video_wrapper';
}
$output .= '<div class="' . esc_attr($video_wrapper) . ' ' . esc_attr($wrapper_extra_class) . '">' . esc_html($embed) . '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment('.wpb_wrapper');
if ($video_thumb_html != '' && strcmp($video_module_mode, 'simple') === 0) {
	$output .= '<script>
					(function($) {
						"use strict";
						$(document).ready(function() {
							var video_box = $("#' . esc_js($unique_id) . '");
							var button = video_box.find(".wd-video-image-thumb");
							button.on("click",function(e) {
								var player = video_box.find("iframe");
								$(this).fadeOut("slow");
								e.preventDefault();
								player[0].src += "&autoplay=1";
							});
						});
					})(jQuery);
				</script>';
}

echo html_entity_decode($output);