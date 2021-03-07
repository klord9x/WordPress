<?php
$compactor_image_size_w = 924;
$compactor_image_size_h = 477;
$compactor_class_name = compactor_get_post_category();
$compactor_class_name .= " compactor_multi_post_isotop_item all"; ?>

<article <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="wd-post__thumbnail">
            <?php
            if (compactor_get_attachment() && compactor_get_attachment(7) != "") { ?>
                <ul class="wd-gallery-images-holder clearfix wd-post__thumbnail--gallery">
                    <?php
                    $attachments = compactor_get_attachment(7);
                    $i = 0;
                    foreach ($attachments as $attachment):
                        $active = ($i == 0 ? ' active' : '');
                        $images = aq_resize(wp_get_attachment_url($attachment->ID), $compactor_image_size_w, $compactor_image_size_h, true, true, true); ?>
                        <li class="wd-gallery-image-holder <?php echo esc_attr($active); ?>"><img
                                src="<?php echo esc_url($images) ?>" alt="<?php echo the_title_attribute(); ?>"/></li>
                        <?php $i++; endforeach; ?>
                </ul>
            <?php } else { ?>
                <ul class="wd-gallery-images-holder clearfix wd-post__thumbnail--gallery">
                    <?php
                    $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'wd_portfolio-image-gallery', true);
                    if ($portfolio_image_gallery_val != '') $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);

                    if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0):
                        foreach ($portfolio_image_gallery_array as $gimg_id):
                            echo '<li class="wd-gallery-image-holder">' . wp_get_attachment_image($gimg_id, 'compactor_blog-thumb', false) . '</li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="wd-post__content <?php if (!has_post_thumbnail()) echo 'm-b-0' ?>">
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