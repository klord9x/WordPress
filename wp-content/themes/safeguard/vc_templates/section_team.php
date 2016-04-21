<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $per_row
 * @var $carousel
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Team
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';

$item_titles = $members = $cont = $item_cont = '';
$item_titles = explode( '[/section_team_member]', $content );
if ( $item_titles != '' ) {
	array_pop($item_titles);
}

$i=0;

foreach ( $item_titles as $item ) {
	$cont = explode( ']', $item );
	$item_cont = isset($cont[1]) ? $cont[1] : '';
	$item_atts = shortcode_parse_atts( str_replace("[section_team_member", "", $cont[0]) );
	if ( isset( $item_atts['name'] ) ) {
		$img_id = preg_replace( '/[^\d]/', '', $item_atts['image'] );
		$img_link = wp_get_attachment_image_src( $img_id, 'large' );
		$img_link = $img_link[0];
		$image_meta = safeguard_pix_wp_get_attachment($img_id);
		$image_alt = $image_meta['alt'] == '' ? $image_meta['title'] : $image_meta['alt'];
		
		$final_email = (!isset($item_atts['email']) || $item_atts['email'] == '') ? '': $item_atts['email'];
		$final_btn = (!isset($item_atts['btn_txt']) || $item_atts['btn_txt'] == '') ? '': '<a href="'.esc_url($final_email).'" class="btn btn-sm btn-success">'.wp_kses_post($item_atts['btn_txt']).'</a>';
		
		$final_scn1 = (!isset($item_atts['scn1']) || $item_atts['scn1'] == '') ? '': '<a style="color:#005394;" href="'.esc_url($item_atts['scn1']).'"><i class="fa '.esc_attr($item_atts['scn_icon1']).' fa-lg"></i></a>';
		$final_scn2 = (!isset($item_atts['scn2']) || $item_atts['scn2'] == '') ? '': '<a style="color:#ff054f;" href="'.esc_url($item_atts['scn2']).'"><i class="fa '.esc_attr($item_atts['scn_icon2']).' fa-lg"></i></a>';
		$final_scn3 = (!isset($item_atts['scn3']) || $item_atts['scn3'] == '') ? '': '<a style="color:#47aeff;" href="'.esc_url($item_atts['scn3']).'"><i class="fa '.esc_attr($item_atts['scn_icon3']).' fa-lg"></i></a>';
		$final_scn4 = (!isset($item_atts['scn4']) || $item_atts['scn4'] == '') ? '': '<a style="color:#b50000;" href="'.esc_url($item_atts['scn4']).'"><i class="fa '.esc_attr($item_atts['scn_icon4']).' fa-lg"></i></a>';
		
		if($per_row == 4){
			
			$members .= '
			<div class="col-sm-3"">
				<div class="userpic" style="background-image:url('.esc_url($img_link).');">
					<span></span>
				</div>
				<div class="user-info text-center">
					<small>'.wp_kses_post($item_atts['position']).'</small>
					<h4>'.wp_kses_post($item_atts['name']).'</h4>
					<p>'.wp_kses_post($item_cont).'</p>
				</div>';
				if($final_scn1 || $final_scn2 || $final_scn3 || $final_scn4 ){
					$members .= '
					<div class="soc-icons text-center">
						'.$final_scn1.$final_scn2.$final_scn3.$final_scn4.'
					</div>';
				}
			$members .= '
			</div>';	
			
		} else {
			
			$members .= '
			<div class="col-sm-4">
				<div class="userpic" style="background-image:url('.esc_url($img_link).');">
					<span style="display: none;">'.wp_kses_post($item_cont).'</span>
				</div>
				<div class="user-info">
					<small>'.wp_kses_post($item_atts['position']).'</small>
					<h4>'.wp_kses_post($item_atts['name']).'</h4>
				</div>
				'.$final_btn;
				if($final_scn1 || $final_scn2 || $final_scn3 || $final_scn4 ){
					$members .= '
					<div class="soc-icons">
						'.$final_scn1.$final_scn2.$final_scn3.$final_scn4.'
					</div>';
				}
			$members .= '
			</div>';
			
		}
	$i++;	
	}
}

if($per_row == 4){
$out .= '
		<div class="row team style-2">
			'.$members.'
		</div>
	';
} else {
$out .= '
		<div class="row main-grid team hover-eff">
			'.$members.'
		</div>
	';	
}
$out .= '</div>'; 
echo $out;