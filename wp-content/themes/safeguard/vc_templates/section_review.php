<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $image
 * @var $position
 * @var $link
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Review
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/*
$img_id = preg_replace( '/[^\d]/', '', $image );
$img_link = wp_get_attachment_image_src( $img_id, 'large' );
$img_link = $img_link[0];
$image_meta = safeguard_pix_wp_get_attachment($img_id);
$image_alt = $image_meta['alt'] == '' ? $image_meta['title'] : $image_meta['alt'];
*/
			
$out = '

		<div>
    		<div class="testimonial-content">
        		<span><i class="fa fa-quote-left"></i></span>
        		<p>'.do_shortcode($content).'</p>
            </div>
            <div class="text-right testimonial-author">
        		<h4>'.wp_kses_post($title).'</h4>
                <small>'.wp_kses_post($position).'</small>
            </div>
        </div>

	';

echo $out;