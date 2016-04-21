<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $images
 * @var $img_size
 * @var $autoplay
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Imagescarousel
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$out = $temp_out = '';

wp_enqueue_script( 'safeguard_pix_carousel_js' );
wp_enqueue_style( 'safeguard_pix_carousel_css' );

$images = explode( ',', $images );
$autoplay = is_numeric($autoplay) && $autoplay > 0 ? $autoplay : false;

foreach( $images as $image ){
	if ( $image > 0 ) {
		$img_thumbnail = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $img_size ) );
	} else {
		$img_thumbnail = array();
		$img_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
		$img_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
	}
	
	$temp_out .=	'
				<div class="img-hover-effect">'.$img_thumbnail['thumbnail'].'	</div>	
			';
}
$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
$out .= '

	<div id="fleet-gallery" class="owl-carousel enable-owl-carousel owl-theme" data-pagination="false" data-navigation="true" data-min450="2" data-min600="2" data-min768="4" data-auto-play="'.esc_attr($autoplay).'">   
        '.$temp_out.'
        	   
	</div>
	
</div>
	';	
echo $out;