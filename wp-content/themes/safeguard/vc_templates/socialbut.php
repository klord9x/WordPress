<?php
$out = '';
extract(shortcode_atts(array(
	'title' => '',
	'icon' => '',
	'link' => '',
	'color' => '',
), $atts));

$out = '
		<li >
			<a  style="border-color:'.esc_attr($color).'" href="'.esc_url($link).'" target="_blank" title="'.esc_attr($title).'">
				<i style="color:'.esc_attr($color).'" class="fa '.esc_attr($icon).'"></i>
			</a>
		</li>
	';

echo $out;