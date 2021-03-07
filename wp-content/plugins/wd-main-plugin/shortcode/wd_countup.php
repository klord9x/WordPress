<?php
if(!function_exists('wd_count_up')){
	function wd_count_up($atts) {
		global $wd_fonts_to_enqueue_array;
		extract( shortcode_atts( array(

			//___________Title_________
			'wd_countup_title'  => '',
			'wd_countup_title_color'  => '',


			//___________Number_________
			'wd_countup_number'  => '',
			'wd_countup_number_color'  => '',

			//___________icon_________
			'wd_countup_switch'  => '',
			'wd_countup_image'  => '',
			'wd_coundup_fontawesome'  => '',
			'svg_code'  => '',
			'wd_countup_icon_color'  => '',

			'css_animation' => 'no'
		), $atts ) );


		$animation_classes =  "";
		$data_animated = "";

		if(($css_animation != 'no')){
			$animation_classes =  " animated ";
			$data_animated = "data-animated=$css_animation";
		}

		$icon_color 		= ($wd_countup_icon_color 	? "style = 'color: $wd_countup_icon_color'" : '');
		$counter_color 	= ($wd_countup_number_color ? "style = 'color: $wd_countup_number_color'" : '');
		$title_color 		= ($wd_countup_title_color 	? "style = 'color: $wd_countup_title_color'" : '');

		ob_start(); ?>

		<div class="wd-count-up <?php echo  esc_attr($animation_classes); ?>"  <?php echo esc_attr($data_animated); ?>>
				<?php if($wd_countup_switch == 'wd_countup_icon') { ?>
					<i class="fa <?php echo $wd_coundup_fontawesome ?>" <?php echo $icon_color ?>></i>
				<?php } elseif ($wd_countup_switch == 'wd_countup_image') {
					echo wp_get_attachment_image( $wd_countup_image, 'thumbnail', false )
					?>
					<?php
				}elseif ($wd_countup_switch == 'wd_countup_svg') {
					echo rawurldecode( base64_decode( strip_tags($svg_code)));
				} ?>
				<h4 class="wd-count-up__counter" data-file="<?php echo $wd_countup_number ?>" <?php echo $counter_color ?>>
					<?php echo esc_attr($wd_countup_number) ?>
				</h4>
				<h5 class="wd-count-up__title" <?php echo $title_color ?>><?php echo esc_attr($wd_countup_title) ?></h5>
		</div>

		<?php return ob_get_clean();
	}
	add_shortcode( 'wd_count_up', 'wd_count_up' );
}
