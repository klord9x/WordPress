<?php
if (!function_exists('wd_team_scode')) {
	function wd_team_scode($atts) {
		$show_description = $columns = $itemperpage = $team_collapse = "";
		extract(shortcode_atts(array(
			'columns' => 4,
			'itemperpage' => '10',
			'team_style' => 'style1',   // 1: masonry  2: grid  3: large
			'css_animation' => 'no',
		), $atts));

		$data_animated = $animation_classes = "";

		if (($css_animation != 'no')) {
			$animation_classes = " animated ";
			$data_animated = "data-animated=$css_animation";
		}
		ob_start(); ?>


    <ul
      class="team-list-<?php echo $team_style ?> small-up-1 medium-up-2 large-up-2 xlarge-up-<?php echo esc_attr($columns); ?> clearfix wd-outer-space">
			<?php $loop = new WP_Query(array('post_type' => 'team-member', 'posts_per_page' => $itemperpage,));
			while ($loop->have_posts()) : $loop->the_post(); ?>
        <li
          class="<?php echo esc_attr($animation_classes); ?> column column-block" <?php echo esc_attr($data_animated); ?>>
          <div class="team-member">
            <div class="team-member__picture">
							<?php
							$img_id = get_post_thumbnail_id(get_the_ID());
							$thumb = wp_get_attachment_image_src($img_id, 'compactor_team_style1');
							$srcset = wp_get_attachment_image_srcset($img_id);
							$src = $thumb['0'];
							$placeholder = "//placehold.it/314x314/eee/222/&text=+";

							$default_attr = array(
								'src' => $placeholder,
								'data-src' => $src,
								'data-srcset' => $src,
								'class' => "lazy",
								'alt' => get_the_title($img_id)
							);

							the_post_thumbnail('compactor_team_style1', $default_attr);

							?>
            </div>
            <div class="team-member__info">
              <h5 class="team-member__name"><span><?php the_title(); ?></span></h5>
							<?php if (get_post_meta(get_the_ID(), 'job_title', true) != '') { ?>
                <p class="team-member__job"><span><?php echo get_post_meta(get_the_ID(), 'job_title', true); ?></span>
                </p>
							<?php } ?>
							<?php if ($team_style == 'style3') { ?>
                <p class="team-member__desc"><?php echo get_the_excerpt() ?></p>
							<?php } ?>
            </div>
						<?php
						if ($team_style != 'style1') {
							$facebook = get_post_meta(get_the_ID(), 'team-facebook', true);
							$instagram = get_post_meta(get_the_ID(), 'team-instagram', true);
							$twitter = get_post_meta(get_the_ID(), 'team-twitter', true);
							if ($facebook || $instagram || $twitter) {
								?>
                <div class="team-member__socialmedia">
                  <ul>
										<?php if ($facebook) { ?>
                      <li><a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
										<?php }
										if ($instagram) { ?>
                      <li><a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a></li>
										<?php }
										if ($twitter) { ?>
                      <li><a href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a></li>
										<?php } ?>
                  </ul>
                </div>
							<?php }
						} ?>
          </div>
        </li>
			<?php endwhile; ?>
    </ul>

		<?php
		return ob_get_clean();
	}

	add_shortcode('wd_team', 'wd_team_scode');
}

function image_from_url_relative($image_url) {
	$images = array();
	$images = explode('/', $image_url);
	$position = array_search('uploads', $images);
	$content = array();
	if ($position) {
		for ($i = $position; $i < count($images); $i++)
			array_push($content, $images[$i]);
		$image_relative_link = get_site_url() . '/wp-content/' . implode('/', $content);
		if ($image_url != $image_relative_link)
			update_post_meta(get_the_ID(), 'pciture', $image_relative_link);
		return $image_relative_link;
	} else {
		return $image_url;
	}
}