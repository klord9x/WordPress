<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $after_title
 * @var $titlepos
 * @var $title_color
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Block_Title
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$fullcontent = ($content == "") ? "" : '<h2>'.do_shortcode($content).'</h2>';
$color = $title_color == "" ? "" : ' style="color: '.esc_attr($title_color).'"';

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '';
$out .= '
		<div class="'.esc_attr($titlepos).' hgroup block-title ">
    		<h1 '.$color.'>'.wp_kses_post($title).'</h1>
    		'.$fullcontent.'
        </div>
  		';
$out .= $css_animation != '' ? '</div>' : '';
echo $out;