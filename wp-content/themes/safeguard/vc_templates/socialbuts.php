<?php
$out = '';
extract(shortcode_atts(array(
	"css_animation" => '',
), $atts));

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';

$section_cont = explode( '[/socialbut]', $content );
array_pop($section_cont);
if( is_array( $section_cont ) && !empty( $section_cont ) ){
	$i=0;
	$out_cont = '';
	foreach( $section_cont as $option ){
		$i++;		
		$out_cont .= do_shortcode($option.'[/socialbut]');			   
	}		         
}

$out .= '
		<div class="social-box">
			<ul class="social-links">
				'.$out_cont.'
			</ul>
		</div>	
	';

$out .= '</div>'; 
echo $out;