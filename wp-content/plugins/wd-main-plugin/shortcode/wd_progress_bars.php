<?php
if(!function_exists('compactor_progressbar')){
	function compactor_progressbar($atts) {
		extract( shortcode_atts( array(
			'compactor_progress_style' => 'progress_bar',
			'title' => '',
			'values' => '',
			'units' => '%',
			'css' => '',
			'css_animation' => 'no'
		), $atts ) );

		ob_start(); ?>
		<?php
		$animation_classes =  "";
		$data_animated = "";

		if(($css_animation != 'no')){
			$animation_classes =  " animated ";
			$data_animated = "data-animated=$css_animation";
		}


		$values = (array) vc_param_group_parse_atts( $values );

		$max_value = 0.0;
		$graph_lines_data = array();
		foreach ( $values as $data ) {
			$new_line = $data;
			$new_line['value'] = isset( $data['value'] ) ? $data['value'] : 0;
			$new_line['label'] = isset( $data['label'] ) ? $data['label'] : '';

			if ( $max_value < (float) $new_line['value'] ) {
				$max_value = $new_line['value'];
			}

			$graph_lines_data[] = $new_line;
		}
		?>

			<div class="wd-progress-bar-container">
				<ul class="wd-progress-bar">
					<?php
          $label_style = "";
          $meter_style = "";

					foreach ( $graph_lines_data as $line ) {

						$line_label =  $line['label'];
			      if( isset($line['label_color']) ) {
              $label_style .= " color: " . $line['label_color'] .";";
            }

						$line_value =  $line['value'];
			      $meter_style .= "width: ". $line_value . $units .";";
            if( isset($line['value_color']) ) {
	            $meter_style .= " background: " . $line['value_color'] .";";
            }
            ?>
						<li class="<?php echo esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
							<span class="label-bar" style="<?php echo $label_style; ?>"><?php echo esc_attr($line_label); ?></span>
							<span class="value-bar" style="<?php echo $label_style; ?>"><?php echo $line_value . esc_attr($units);  ?></span>

              <div class="progress large-12">
								<span class="meter" style="<?php echo $meter_style; ?>"></span>
							</div>
						</li>
						<?php
					} ?>
				</ul>
			</div>


		<?php return ob_get_clean();
	}
	add_shortcode( 'compactor_progressbar', 'compactor_progressbar' );
}