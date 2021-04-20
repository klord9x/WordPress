<?php
if (!function_exists('wd_icon_text')) {
	function wd_icon_text($atts) {
		extract(shortcode_atts(array(
			'choice' => 'icon_choice',
			'icon' => '',
			'icon_color' => '#000',
			'image' => '',
			'secondary_svg' => '',
			'position' => 'left_position',
			'text_align' => 'center',
			'title' => 'Block title',
			'box_link' => '',
			'text' => '',
			'box_shadow' => 'small-shadow',
			'hover_animation' => 'yes',
			'inner_padding' => '',
			'css' => '',
			'image_width' => '',
			//___________animation___________
			'css_animation' => 'no',

			'enable_split' => false,
			'split_type' => 'lines',

			'enable_content_animation' => '',
			'table_css' => '',

			'duration' => '',
			'start_delay' => '',
			'easing' => '',

			'ca_init_translate_x' => '',
			'ca_init_translate_y' => '',
			'ca_init_translate_z' => '',
			'ca_init_scale_x' => '',
			'ca_init_scale_y' => '',
			'ca_init_scale_z' => '',
			'ca_init_rotate_x' => '',
			'ca_init_rotate_y' => '',
			'ca_init_rotate_z' => '',
			'ca_init_opacity' => '',

			'ca_an_translate_x' => '',
			'ca_an_translate_y' => '',
			'ca_an_translate_z' => '',
			'ca_an_scale_x' => '',
			'ca_an_scale_y' => '',
			'ca_an_scale_z' => '',
			'ca_an_rotate_x' => '',
			'ca_an_rotate_y' => '',
			'ca_an_rotate_z' => '',
			'ca_an_opacity' => '',
		), $atts));
		$title = str_replace("{", "<span>", $title);
		$title = str_replace("}", "</span>", $title);

		$box_link = vc_build_link($box_link);
		$data_animated = $animation_classes = "";

		if (($css_animation != 'no')) {
			$animation_classes = " animated ";
			$data_animated = "data-animated=$css_animation";
		}
		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), 'wd_icon_text', $atts);

		if ($box_shadow != 'none') {
			$css_class .= " " . $box_shadow;
		}

		if ($hover_animation != 'yes') {
			$css_class .= " no-hover";
		}


		ob_start();

		$split_text_attrs = "";
		if ($enable_split) {
			$split_text_attrs = "data-split-options='{\"type\":\"" . $split_type . "\"}' "
				. "data-split-text='true'" . "data-split-target='.animation_target'";
		}

		if (isset($enable_content_animation) && 'yes' === $enable_content_animation) {
			$animation_classes = " devia-anim ";
			$opts = wdevia_get_animation_options($atts);
			if ($enable_split) {
				$opts['animationTarget'] = ".item_target";
			} else {
				$opts['animationTarget'] = '.animation_target';
			}
			$data_animated = 'data-devia-animate=' . stripslashes(wp_json_encode($opts)) . '';
		}
		?>

    <div class="<?php if ($enable_content_animation) {
			echo 'animation_target';
		}
		echo esc_attr($css_class); ?> text-icon text-icon--icon-<?php echo $position . $animation_classes; ?> boxes  clearfix" <?php echo $split_text_attrs ?> <?php echo esc_attr($data_animated); ?>>
      <div class="text-icon__container  <?php if ($position == 'top_position') {
				echo $text_align;
			} ?> ">
          <div class="text-icon__icon-box <?php if ($enable_content_animation && $enable_split) {
						echo 'item_target';
					} elseif ($enable_content_animation || $enable_split) {
						echo 'animation_target';
					} ?>">
						<?php if ($choice == 'image_choice') {
							$image = preg_replace( '/[^\d]/', '', $image );
							$img_url = wp_get_attachment_image_url($image, 'full');
							$srcset = wp_get_attachment_image_srcset($image);
							$placeholder = "//via.placeholder.com/408x278/eee/222/&text=+";
							if (!empty($image_width)) {
								$img_src = compactor_image_resize($img_url, $image_width);
							}else{
								$img_src = $img_url;
							}
							?>
              <img src="<?= $placeholder ?>" alt="<?= get_the_title($image) ?>" data-src="<?= $img_src ?>" data-srcset="<?= $srcset ?>" class="lazy">
						<?php } elseif ($choice == 'icon_choice') { ?>
            <i class="fa <?php echo $icon; ?>" style="color: <?php echo $icon_color ?>"></i><?php
						} else {
							echo rawurldecode(base64_decode(strip_tags($secondary_svg)));
						} ?>
          </div>
          <div class="text-icon__content-box" <?php  if($inner_padding != "") echo "style='padding: $inner_padding;'"; ?> >
            <h4 class="text-icon__title <?php if ($enable_content_animation || $enable_split) { echo 'animation_target'; } ?>">
							<?php echo $title; ?>
            </h4>
            <p class="text-icon__text  <?php if ($enable_content_animation || $enable_split) { echo 'animation_target'; } ?>">
                <?php echo $text; ?>
            </p>
	          <?php if ($box_link["url"] != "") {  ?>
              <a href="<?php echo $box_link["url"] ?>" class="text-icon__link"><?php echo esc_html__("Read More", "compactor"); ?></a>
            <?php } ?>
          </div>
      </div>
    </div>

		<?php return ob_get_clean();
	}

	add_shortcode('wd_icon_text', 'wd_icon_text');
}
?>