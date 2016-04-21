<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $reviews_per_page
 * @var $disable_carousel
 * @var $skin
 * @var $autoplay
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Reviews
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$disable_carousel = $disable_carousel == 1 ? 'owl-carousel  enable-owl-carousel' : '';
$skin = $skin == '' ? 'pix-reviews-light' : $skin;
$autoplay = is_numeric($autoplay) && $autoplay > 0 ? $autoplay : false;
$id = $reviews_per_page == 2 ? 2 : '';

$section_cont = explode( '[/section_review]', $content );
array_pop($section_cont);
if( is_array( $section_cont ) && !empty( $section_cont ) ){
	$i=0;
	$out_cont = '';
	foreach( $section_cont as $option ){
		$i++;		
		$out_cont .= do_shortcode($option.'[/section_review]');			   
	}		         
}

$out = '
		<div id="testimonials'.esc_attr($id).'" class="'.esc_attr($disable_carousel).' owl-theme '.esc_attr($skin).'" data-pagination="false" data-navigation="true" data-auto-play="'.esc_attr($autoplay).'" data-min450="1" data-min600="'.esc_attr($reviews_per_page).'" data-min768="'.esc_attr($reviews_per_page).'">
			'.$out_cont.'
		</div>
	';

echo $out;