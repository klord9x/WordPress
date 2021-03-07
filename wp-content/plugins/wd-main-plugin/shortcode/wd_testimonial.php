<?php
function webdevia_testimonials($atts) {
	global $webdevia_fonts_to_enqueue_array;
	$custom_testimonial_name_inline_style = $custom_testimonial_job_title_inline_style = $custom_testimonial_text_inline_style = "";
	extract(shortcode_atts(array(
		'testimonial_items_to_show' => '',
		'testimonials_layout' => 'layout_1',
		'css_animation' => 'no',
	), $atts));

	$data_animated = $animation_classes = "";

	if (($css_animation != 'no')) {
		$animation_classes = " animated ";
		$data_animated = "data-animated=$css_animation";
	}

	ob_start(); ?>
  <div class="owl-testimonial wd-testimonial wd-testimonial_<?php echo $testimonials_layout; ?>" <?php echo esc_attr($data_animated); ?>
       data-slick='{ <?php
	     if ($testimonials_layout == 'layout_1')
		     echo '"slidesToShow": 2, "slidesToScroll": 2';
       elseif ($testimonials_layout == 'layout_2')
		     echo '"slidesToShow": 1, "slidesToScroll": 1, "fade": true,  "cssEase": "ease-in-out"';
       elseif ($testimonials_layout == 'layout_3')
		     echo '"slidesToShow": 1, "slidesToScroll": 1';
	     ?>}'>
		<?php
		query_posts(array('post_type' => 'testimonials', 'posts_per_page' => $testimonial_items_to_show));
		while (have_posts()) : the_post(); ?>
      <blockquote class="wd-testimonial__item">
        <div class="wd-testimonial__thumbnail">
					<?php
					if ($testimonials_layout == 'layout_1') {
						echo get_the_post_thumbnail(get_the_ID(), "compactor__testimonial_layout_1");
					} elseif ($testimonials_layout == 'layout_2') {
						echo get_the_post_thumbnail(get_the_ID(), "compactor__testimonial_layout_2");
					} elseif ($testimonials_layout == 'layout_3') {
						$thumbnail_id = get_post_thumbnail_id(get_the_ID());
						$image = wp_get_attachment_image_src($thumbnail_id, "compactor__testimonial_layout_3");
						?>
            <div style="background-image: url('<?php echo $image[0] ?>')"></div>
					<?php } ?>
        </div>
        <div class="wd-testimonial__info">
          <div class="excerpt">
						<?php echo get_the_excerpt(); ?>
          </div>
          <h5 class="title">
						<?php the_title(); ?>
          </h5>
          <p class="job p-small">
						<?php echo get_post_meta(get_the_ID(), 'job_title', true) ?>
          </p>
        </div>
      </blockquote>
		<?php endwhile;
		wp_reset_query();
		?>
  </div>

	<?php return ob_get_clean();
}

add_shortcode('webdevia_testimonials', 'webdevia_testimonials');