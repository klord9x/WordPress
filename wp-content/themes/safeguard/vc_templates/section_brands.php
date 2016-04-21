<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $brands_per_page
 * @var $disable_carousel
 * @var $autoplay
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Brands
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$out = $out_cont = '';

$disable_carousel = $disable_carousel == 1 ? 'owl-carousel  enable-owl-carousel' : '';
$brands_per_page = is_numeric($brands_per_page) ? $brands_per_page : 4; 
$autoplay = is_numeric($autoplay) && $autoplay > 0 ? $autoplay : false;

preg_match_all( '/\[section_brand([^\]]+)\]/i', $content, $matches, PREG_OFFSET_CAPTURE );
if( isset( $matches[0] ) && !empty( $matches[0] ) ){
	$i=0;
	foreach( $matches[0] as $option ){
		$i++;		
		$out_cont .= do_shortcode($option[0]);			   
	}		         
}

$out = '
		<div id="partners" class="'.esc_attr($disable_carousel).' owl-theme" data-pagination="false" data-navigation="true" data-min450="2" data-min600="2" data-min768="'.esc_attr($brands_per_page).'"  data-auto-play="'.esc_attr($autoplay).'">
			'.$out_cont.'
		</div>
	';

echo $out;