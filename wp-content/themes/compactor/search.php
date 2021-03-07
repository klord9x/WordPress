<?php get_header(); ?>

    <section class="titlebar ">
        <div class="row">
            <div class="box">
                <h1 id="page-title"
                    class="title text-left"><?php printf(esc_html__('Search Results', 'compactor')); ?></h1>
            </div>

        </div>
    </section>

    <main class="l-main row">
        <div class="large-12 small-12 main columns">
            <article class="search-post columns">
                <div class="search-post__keyname">
                    <h5><?php printf(esc_html__('Search Results for  %s', 'compactor'), ' " <span>' . get_search_query() . ' </span>" '); ?></h5>

                    <p><?php echo esc_html__('If you didn\'t find what you were looking for, try again!', 'compactor') ?></p>
                </div>
                <div class="search-post__form">
                    <?php get_search_form() ?>
                </div>

                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="search-post__result">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="large-4 small-12 columns">
                                <div class="search-post__thumbnail">
                                    <?php the_post_thumbnail('compactor_blog-thumb'); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="<?php if (has_post_thumbnail()) echo 'large-8 small-12 columns' ?>">
                            <div class="search-post__content">
                                <div class="search-post__title">
                                    <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                </div>

                                <ul class="search-post__meta clearfix">
                                    <li><?php echo get_the_date(); ?></li>
                                    <li><?php echo esc_html__('By:', 'compactor');
                                        the_author() ?></li>
                                    <li><?php echo esc_html__('Category:', 'compactor');
                                        the_category(', '); ?></li>
                                    <li><?php comments_number('no comments', 'one comment', '% comments'); ?></li>
                                </ul>

                                <p class="search-post__body">
                                    <?php echo wp_trim_words(do_shortcode(get_the_content()), 55); ?>
                                </p>

                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <div class="search-post__pagination">
                    <?php
                    global $wp_query;

                    $big = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages,

                    ));
                    ?>
                </div>
            </article>
            <?php else : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php echo esc_html__('Nothing Found', 'compactor'); ?></h1>
                </header>
                <p> <?php echo esc_html__('It seems we cant find what youre looking for. Perhaps searching can help.', 'compactor') ?></p>
                <?php
            endif;

            ?>
        </div>

    </main>

<?php get_footer(); ?>