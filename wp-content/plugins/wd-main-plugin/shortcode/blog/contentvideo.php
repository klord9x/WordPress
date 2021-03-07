<article <?php post_class("wd-post wd-post--video ".$post_class); ?>>
	<div class="wd-post__thumbnail">
		<?php echo compactor_get_embedded_media(array('video', 'iframe')); ?>
	</div>

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

  <div class="wd-post__body">
    <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
  </div>

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