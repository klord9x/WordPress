<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $type
 * @var $icon_pixelegant
 * @var $icon_pixflaticon
 * @var $icon_pixicomoon
 * @var $icon_pixfontawesome
 * @var $icon_pixsimple
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $title
 * @var $amount
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Box_Amount
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$icon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';

$out = $css_animation != '' ? '<div class="stats row-counters pix-easy-chart animated" data-animation="' . esc_attr($css_animation) . '">' : '<div class="stats row-counters pix-easy-chart">';
$out .= '

	<div class="counter-item">
		<div class="chart" data-percent="'.esc_attr($amount).'">
			<span><i class="fa '.esc_attr($icon).'"></i></span>
			<span class="percent">'.wp_kses_post($amount).'</span>
			'.wp_kses_post($title).'
			<canvas height="0" width="0"></canvas>
	    </div>
    </div>
			
</div>			

	';  

echo $out;