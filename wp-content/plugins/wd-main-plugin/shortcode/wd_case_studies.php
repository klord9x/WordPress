<?php
if (!function_exists('wd_case_studies')) {
	function wd_case_studies($atts) {
		extract(shortcode_atts(array(
			'title' => '',
			'image' => '',
			'image_size' => '',
			'text_align' => '',
			'box_layout' => 'style_1',
			'box_link' => '#',
			'css' => '',
		), $atts));

		$image_size = str_replace("X", "x", $image_size);


		$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), 'wd-case-studies', $atts);

		ob_start();
		?>
    <div class="row wd-case-std <?php echo $css_class ?>">
	    <?php
	    $loop = new WP_Query(array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => 7,));
	    $i = 1;
	    while ($loop->have_posts()) : $loop->the_post();
	      $size = array('480', '555');
	      $item_class = "small-6 large-3";

	      if($i == 1) {
	        $item_class = "small-12 large-6";
	        $size = array('981', '555');
        } ?>

        <div class="columns <?php echo $item_class?>">

          <div class="wd-case-std__thumbnail">

	          <?php if ( has_post_thumbnail() ) {
              $thumb   = get_post_thumbnail_id();
              $img_url = wp_get_attachment_url( $thumb, 'full' );
              if ( ! empty( $size[0] ) ) {
                $img_src = compactor_image_resize( $img_url, $size[0], $size[1], true );
              } elseif ( ! empty( $image_size ) ) {
                $img_src = compactor_image_resize( $img_url, $image_size );
              } else {
                $img_src = $img_url;
              } ?>
              <img src="<?= $img_src ?>" alt="<?= get_the_title($thumb) ?>">
            <?php } ?>
          </div>

          <div class="wd-case-std__content">
            <h4 class="wd-case-std__title">
            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
            </h4>
           </div>



        </div>
      <?php $i++;
      endwhile; ?>
    </div>
		<?php
		return ob_get_clean();
	}

	add_shortcode('wd_case_studies', 'wd_case_studies');
}