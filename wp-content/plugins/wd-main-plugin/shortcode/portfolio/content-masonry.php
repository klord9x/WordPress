<ul class="portfolio-grid-items portfolio_masonry  small-up-2 medium-up-2  large-up-<?php echo $columns; ?> columns">
	<?php
	while ($loop->have_posts()) : $loop->the_post();
		$terms = wp_get_object_terms(get_the_ID(), 'portfolio_categories');
		// init counter
		?>
    <li class="column column-block portfolio_element-item element-item <?php
		foreach ($terms as $term) {
			echo $term->slug . ' ';
		} ?> " data-category="<?php foreach ($terms as $term) {
			echo $term->slug;
			break;
		} ?>">

      <article class="portfolio-grid-items-content">
				<?php
				$img_id = get_post_thumbnail_id(get_the_ID());
				$thumb = wp_get_attachment_image_src($img_id, 'compactor_portfolio');
				$srcset = wp_get_attachment_image_srcset($img_id);
				$src = $thumb['0'];
				$placeholder = "//placehold.it/408x278/eee/222/&text=+";

				$default_attr = array(
					'src' => $placeholder,
					'data-src' => $src,
					'data-srcset' => $src,
					'class' => "lazy",
					'alt' => get_the_title($img_id)
				);
				the_post_thumbnail('compactor_portfolio', $default_attr);

				?>
        <div class="portfolio_disc">
          <article class="portfolio_int">
            <a class="portfolio_icon" href="<?php the_permalink() ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
            <a class="portfolio_icon" href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>"
               data-lightbox="roadtrip"><i class="fa fa-search" aria-hidden="true"></i></a>
            <h3 class="portfolio_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
          </article>
        </div>
      </article>
    </li>
	<?php endwhile; ?>
</ul>