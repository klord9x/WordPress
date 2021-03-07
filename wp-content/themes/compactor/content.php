<article <?php post_class(); ?> >
    <?php if (has_post_thumbnail()) { ?>
        <div class="wd-post__thumbnail">
            <?php
            $img_id = get_post_thumbnail_id(get_the_ID());
            $thumb = wp_get_attachment_image_src($img_id, 'compactor_blog-thumb');
            $srcset = wp_get_attachment_image_srcset($img_id);
            $src = $thumb['0'];
            $placeholder = "//placehold.it/1100x500/eee/222/&text=+";

            $default_attr = array(
                'src' => $placeholder,
                'data-src' => $src,
                'data-srcset' => $src,
                'class' => "lazy",
            );

            the_post_thumbnail('compactor_blog-thumb', $default_attr); ?>
        </div>
    <?php } ?>

    <div class="wd-post__content <?php if (!has_post_thumbnail()) echo 'm-b-0' ?>">
        <div class="wd-post__date"><strong><?php echo get_the_date('j'); ?></strong> <?php echo get_the_date('M'); ?>
        </div>
        <ul class="wd-post__meta clearfix">
            <li class="wd-post__author">
                <?php echo esc_html__('By:', 'compactor');
                the_author() ?>
            </li>
            <li class="wd-post__categories">
                <?php echo esc_html__('Categories:', 'compactor');
                the_category(); ?>
            </li>
            <li class="wd-post__comments">
                <?php comments_number('no comments', 'one comment', '% comments'); ?>
            </li>
        </ul>
        <h3 class="wd-post__title">
            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="wd-post__body">
            <p><?php echo the_excerpt();?></p>
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