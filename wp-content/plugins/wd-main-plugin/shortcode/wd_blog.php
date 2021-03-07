<?php
function wd_recent_blog($atts) {

	extract(shortcode_atts(array(
		'itemperpage' => '3',
		'columns' => '1',
		'show_thumbnail' => 'yes',
		'show_category' => 'yes',
		'show_content' => 'yes',
		'show_meta' => 'yes',
		'show_readmore' => 'yes',
		'css_animation' => 'no',
	), $atts));

	ob_start();
	$animation_classes = $data_animated = '';
	if (($css_animation != 'no')) {
		$animation_classes = " animated ";
		$data_animated = "data-animated=$css_animation";
	}
	if ($columns > 1) {
		$headeing_tag = 'h4';
		$post_class = " wd-post--multicolumn";
	} else {
		$headeing_tag = 'h3';
		$post_class = "";
	}
	?>
  <div class='small-up-1 large-up-<?php echo $columns; ?>'>
		<?php

		$loop = new WP_Query(array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'posts_per_page' => $itemperpage,));
		while ($loop->have_posts()) : $loop->the_post();
			?>
      <div class="column column-block <?php echo $animation_classes ?>" <?php echo $data_animated ?>><?php
			include(plugin_dir_path(__FILE__) . 'blog/content' . get_post_format() . '.php');
			?></div><?php
		endwhile; ?>
  </div>
	<?php return ob_get_clean();

}

add_shortcode('wd_blog', 'wd_recent_blog'); ?>