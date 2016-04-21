<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $left_text
 * @var $left_color
 * @var $right_text
 * @var $right_color
 * @var $center_text
 * @var $center_color
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Block_Cform7
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$out = '';

$full_center_content = ($content == "") ? "" : '<p>'.do_shortcode($content).'</p>';
$full_right_content = ($right_text == "") ? "" : '<p>'.wp_kses_post($right_text).'</p>';
$full_left_content = ($left_text == "") ? "" : '<p>'.wp_kses_post($left_text).'</p>';

$out = '
	<style scoped>
		.info-texts div:before {
		    border-bottom-color: '.esc_attr($center_color).';
		}
		.info-texts div:first-child:before {
		    border-top-color: '.esc_attr($left_color).';
		}
		.info-texts div:last-child:before {
		    border-top-color: '.esc_attr($right_color).';
		}
	</style>';

$out .= $css_animation != '' ? '<div class="info-texts animated" data-animation="' . esc_attr($css_animation) . '">' : '<div class="info-texts">';

$out .= '

	<div class="col-sm-4 col-md-4 col-lg-4">
	<span class="box-col1">	'.$full_left_content.'</span>
	</div>
	<div class="col-sm-4 col-md-4 col-lg-4">
		<span class="box-col2">'.$full_center_content.'</span>
	</div>
		<div class="col-sm-4 col-md-4 col-lg-4">
			<span class="box-col3">'.$full_right_content.'</span>
	</div>

';

$out .= '</div>';

echo $out;