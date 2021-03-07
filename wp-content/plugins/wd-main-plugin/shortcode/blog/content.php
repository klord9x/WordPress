<article <?php post_class("wd-post " . $post_class); ?>>
	<?php if ($show_thumbnail == 'yes') { ?>
    <div class="wd-post__thumbnail">
			<?php
      $img_id = get_post_thumbnail_id(get_the_ID());
			$thumb = wp_get_attachment_image_src( $img_id, 'compactor_blog-thumb');
			$srcset = wp_get_attachment_image_srcset($img_id);
			$src = $thumb['0'];
			$placeholder = "//placehold.it/408x278/eee/222/&text=+";

			$default_attr = array(
				'src' => $placeholder,
				'data-src' => $src,
				'data-srcset' => $src,
				'class' => "lazy",
			);

      the_post_thumbnail('compactor_blog-thumb', $default_attr); ?>
    </div>
	<?php } ?>
  <div class="wd-post__content">

	  <?php if ($show_category == 'yes') { ?>
      <div class="wd-post__categories"><?php  the_category(); ?></div>
    <?php } ?>

    <<?php echo $headeing_tag ?> class="wd-post__title">
      <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
    </<?php echo $headeing_tag ?>>

		<?php if ($show_meta == 'yes') { ?>
      <ul class="wd-post__meta clearfix">
        <li class="wd-post__date">
            <?php echo get_the_date(); ?>
        </li>
        <li class="wd-post__author">
            <?php echo esc_html__('By:', 'compactor'); the_author() ?>
        </li>
        <li class="wd-post__comments">
            <?php comments_number('no comments', 'one comment', '% comments'); ?>
        </li>
      </ul>
		<?php } ?>

	  <?php if ($show_content == 'yes') { ?>
      <div class="wd-post__body">
        <p><?php echo wp_trim_words(get_the_content(), 10); ?></p>
      </div>
    <?php } ?>

    <?php if ($show_readmore == 'yes') { ?>
      <div class="wd-post__read-more">
        <a href="<?php esc_url(the_permalink()); ?>">
          <?php echo esc_html__('Read More', 'compactor'); ?>
          <img src="<?php echo get_template_directory_uri() . "/images/more.svg" ?>" alt="icon">
        </a>
      </div>
    <?php } ?>

  </div>
</article>