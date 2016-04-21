<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $banner_color 
 * @var $title
 * @var $btn_text
 * @var $link
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Banner
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$href = vc_build_link( $link );

$banner_color_stl = $banner_color != '' ? ' style="background-color:'.esc_attr($banner_color).'"' : '';
$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';	
	
$fullcontent = ($content == "") ? "" : '<p>'.do_shortcode($content).'</p>';
		
$out .= '

	<div class="big-hr" '.$banner_color_stl.'>
		<style scoped>
			.big-hr:before, .big-hr:after {
				border-top-color: '.esc_attr($banner_color).';
			}
		</style>
		<div class="text-left" style="margin-right:40px;">
    		<h2>'.wp_kses_post($title).'</h2>
    		'.$fullcontent.'
		</div>
        <div><a class="btn btn-success btn-lg" href="'.esc_url($href['url']).'" '.$banner_color_stl.'>'.wp_kses_post($btn_text).'</a></div>
    </div>

';

$out .= '</div>';
echo $out;