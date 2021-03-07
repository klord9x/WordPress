<article <?php post_class(); ?>>
    <div class="wd-post__thumbnail">
        <?php
        $compactor_post_cloudsound = get_post_meta(get_the_ID(), 'compactor_cloudsound', true);
        echo compactor_get_embedded_media(array('audio', 'iframe')); ?>
    </div>

    <div class="wd-post__content">
        <div class="wd-post__date"><strong><?php echo get_the_date('j'); ?></strong> <?php echo get_the_date('M'); ?>
        </div>
        <ul class="wd-post__meta clearfix">
            <li class="entry-author"><?php echo esc_html__('By:', 'compactor');
                the_author() ?></li>
            <li class="wd-post__categories"> <?php echo esc_html__('Categories:', 'compactor');
                the_category(); ?></li>
            <li><?php comments_number('no comments', 'one comment', '% comments'); ?></li>
        </ul>
        <h3 class="wd-post__title">
            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="wd-post__body">
            <p><?php echo wp_trim_words(get_the_content(), 60); ?></p>
        </div>
        <div class="wd-post__read-more">
            <a href="<?php esc_url(the_permalink()); ?>">
                <?php echo esc_html__('Read More', 'compactor'); ?>
                <img src="<?php echo get_template_directory_uri() . "/images/more.svg" ?>"
                     alt="<?php echo esc_attr__('icon', 'compactor') ?>">
            </a>
        </div>
    </div>
</article>

