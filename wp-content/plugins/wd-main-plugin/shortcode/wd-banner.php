<?php
if (!function_exists('wd_banner')) {
	function wd_banner($atts) {
		extract(shortcode_atts(array(
			'title' => '',
			'image' => '',
			'image_size' => '',
			'text_align' => '',
			'box_layout' => 'style_1',
			'box_link' => '#',
			'css' => '',
		), $atts));
		$title = str_replace("{", "<span>", $title);
		$title = str_replace("}", "</span>", $title);

		$image_size = str_replace("X", "x", $image_size);
		$size = explode("x", $image_size);



		$box_link = vc_build_link($box_link);

		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), 'wd-banner', $atts);

		ob_start();
		?>
    <div class="wd-banner wd-banner--<?= $box_layout .' '. $css_class ?>">
      <a href="<?= $box_link["url"] ?>">
				<?php
				$img_url = wp_get_attachment_image_url($image, 'full');
				if (!empty($size[0])) {
					var_dump($size);
					$img_src = compactor_image_resize($img_url, $size[0], $size[1], true);
				} elseif (!empty($image_size)) {
					$img_src = compactor_image_resize($img_url, $image_size);
				}else{
					$img_src = $img_url;
        }
				?>
        <div class="wd-banner__image">
          <img src="<?= $img_src ?>" alt="<?= get_the_title($image) ?>">
        </div>
        <div class="wd-banner__text <?= $text_align ?>">
          <h3><?= $title ?></h3>
        </div>
      </a>
    </div>
		<?php
		return ob_get_clean();
	}

	add_shortcode('wd_banner', 'wd_banner');
}