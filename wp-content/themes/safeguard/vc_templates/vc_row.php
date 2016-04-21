<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
	$pbgslides
	$pdecor
	$panchor
	$picon
	$ptextcolor
	$ppadding
	
	$bg_row_overflow	
	$bg_pix_image_parallax
	$bg_image_left
	$bg_imgl_top_bottom
	$bg_imgl_vpos
	$bg_imgl_left_right
	$bg_imgl_hpos
	$bg_image_right
	$bg_imgr_top_bottom
	$bg_imgr_vpos
	$bg_imgr_left_right
	$bg_imgr_hpos
	
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$output = $after_output = $class_slider = $pix_bg_class = $pix_bg_color = $safeguard_pix_bg_image_left_div = $safeguard_pix_bg_image_right_div = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(function_exists('fil_init')){
	$picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
}
wp_enqueue_script( 'wpb_composer_front_js' );

/////////////////////////////////////////////
$safeguard_pix_slider = rwmb_meta('sequence_upload', 'type=image&size=full');
/*
$safeguard_pix_slides = explode(",", $pbgslides);
$out_slider = "";
foreach($safeguard_pix_slides as $slide) {
	$att_arr = wp_get_attachment_image_src($slide,'full');
	if (isset($att_arr[0])){
		$att = $att_arr[0];
		$out_slider .= '<li><div style="background-image:url(' . esc_url($att) . ')" class="bg-slide"></div></li>';					
	}
}
$class_slider = $out_slider != '' ? 'bg-slideshow-active' : '';
*/
$class_preset_text = ($ptextcolor) ? ' text-'.strtolower($ptextcolor) : '';
if ($ptextcolor == "Default")
	$class_preset_text = "";

/////////////////////////////////////////////

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	$ppadding,
	$class_preset_text,
	$class_slider,
	vc_shortcode_custom_css_class( $css ),
);
$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $content_placement ) ) {
		$css_classes[] = ' vc_row-o-content-' . $content_placement;
	}
}

// use default video if user checked video, but didn't chose url
if ( ! empty( $video_bg ) && empty( $video_bg_url ) ) {
	$video_bg_url = 'https://www.youtube.com/watch?v=lMJXxhRFO1k';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( strpos( $parallax, 'fade' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( strpos( $parallax, 'fixed' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty ( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';


/*
if ( !empty( $out_slider ) ){
	$output .= '<ul class="bg-slideshow">'.$out_slider.'</ul>';
}

if (empty( $full_width ) && $this->settings( 'base' ) !== 'vc_row_inner' && is_page_template('fullwidth.php') ){
	$output .= '<div class="container">';
}
*/
$output .= wpb_js_remove_wpautop( $content );
/*
if (empty( $full_width ) && $this->settings( 'base' ) !== 'vc_row_inner' && is_page_template('fullwidth.php') ){
	$output .= '</div>';
}
*/

$output .= '</div>';

$output .= $after_output;
$output .= $this->endBlockComment( $this->getShortcode() );

echo $output;