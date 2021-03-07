<?php get_header();

if (!(is_front_page())) {
    if (get_post_meta(get_the_ID(), 'wd_page_show_title_area', true) != 'no') { ?>
        <section class="titlebar ">
            <div class="row">
                <div>
                    <?php if (get_post_meta(get_the_ID(), 'wd_page_show_title', true) != 'no') { ?>
                        <h2 id="page-title" class="title"><?php the_title(); ?></h2>
                    <?php } ?>
                </div>
                <div>
                    <?php compactor_breadcrumb(); ?>
                </div>
            </div>
        </section>
        <?php
    }
}

$compactor_bg_parallax = get_post_meta(get_the_ID(), 'bg-parallax', true);
if ($compactor_bg_parallax == "yes") {
    $compactor_bg_parallax_text = get_post_meta(get_the_ID(), 'bg-parallax-text', true); ?>
    <div class="bg-parallax-text">
        <div><?php echo esc_html($compactor_bg_parallax_text) ?></div>
        <div><?php echo esc_html($compactor_bg_parallax_text) ?></div>
    </div>
<?php } ?>

    <!-- content  -->
    <main class="l-main row">
        <div class="main large-12 small-12 columns">
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <article>
                        <div class="body field clearfix ">
                            <?php the_content(); ?>
                        </div>
                        <?php wp_link_pages(array('before' => '<div class="wd-post__pagination">', 'after' => '</div>')); ?>
                    </article>
                    <?php
                    if (comments_open() && !is_front_page()) {
                        comments_template('', true);
                    } ?>

                <?php endwhile;
            endif; ?>

        </div>
    </main>
    <!-- /content  -->

<?php get_footer(); ?>