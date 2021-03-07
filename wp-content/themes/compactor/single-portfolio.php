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
} ?>

    <main class="row">
        <div class="large-12 small-12 columns">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-portfolio left-carousel-portfolio">
                        <div class="large-12 columns">
                            <div class="description">
                                <div>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile;
            endif; ?>
        </div>

    </main>

<?php get_footer();