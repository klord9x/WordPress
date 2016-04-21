<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $image
 * @var $tab_id
 * @var $title
 * @var $btn_text
 * @var $link
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Tab
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$href = vc_build_link( $link );
$link = isset($href['url']) ? $href['url'] : '';

$img_id = preg_replace( '/[^\d]/', '', $image );
$img_link = wp_get_attachment_image_src( $img_id, 'large' );
$img_link = $img_link[0];
$image_meta = safeguard_pix_wp_get_attachment($img_id);
$image_alt = $image_meta['alt'] == '' ? $image_meta['title'] : $image_meta['alt'];

$btn = $btn_text == '' ? '' : '
			<a class="btn extra-color text-uppercase" href="'.esc_url($link).'">
				<span>'.wp_kses_post($btn_text).'</span>
			</a>';
			
$out = '
		<div class="tab-pane" id="tab-' . esc_attr(( empty( $tab_id ) ? sanitize_title( $title ) : $tab_id )) . '">
			<div class="row">
				<div class="col-sm-5">
					<img class="full-width" src="'.esc_url($img_link).'" alt="'.esc_attr($image_alt).'">
				</div>
				<div class="col-sm-7 text-block">
					'.do_shortcode($content).'
				</div>
			</div>
		</div>
	';

echo $out;