<?php get_header(); ?>
    <section class="titlebar ">
        <div class="row">
            <div class="box">
                <h1 id="page-title" class="title">
                    <?php
                    if (compactor_is_blog()) {
                        $compactor_blog_id = get_option('page_for_posts');
                        if ($compactor_blog_id == false) {
                            if (!is_archive()) {
                                echo esc_html__('Blog', 'compactor');
                            } elseif (is_category()) {
                                echo esc_html__('Category Archives', 'compactor');
                                echo "  " . strip_tags(category_description());
                            } elseif (is_tag()) {
                                echo esc_html__('Tag Archives', 'compactor');
                            } elseif (is_year()) {
                                echo esc_html__('Yearly Archives', 'compactor');
                            } elseif (is_month()) {
                                echo esc_html__('Monthly Archives', 'compactor');
                            } elseif (is_date()) {
                                echo esc_html__('Daily Archives', 'compactor');
                            } elseif (is_author()) {
                                echo esc_html__('Author Archives', 'compactor');
                            }
                        } else {
                            echo get_the_title($compactor_blog_id);
                        }
                    } else {
                        the_title();
                    } ?>
                </h1>
            </div>
            <div class="breadcrumb_box">
                <?php compactor_breadcrumb(); ?>
            </div>
        </div>
    </section>
    <!-- content  -->
    <main class="l-main row">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) {
           ?>
            <div class="large-8 small-12 main columns">
                <div class="blog-posts">
                    <?php if (have_posts()) {
                        while (have_posts()) : the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                    }
                    if (comments_open()) {
                        comments_template('', true);
                    } ?>
                    <div class="wd-post__pagination">
                        <?php echo paginate_links(); ?>
                    </div>
                </div>
            </div>
    <?php
            get_sidebar();
        }else{
            ?>
            <div class="large-2 small-12 main columns"></div>
            <div class="large-8 small-12 main columns">
                <div class="blog-posts">
                    <?php if (have_posts()) {
                        while (have_posts()) : the_post();
                            get_template_part('content', get_post_format());
                        endwhile;
                    }
                    if (comments_open()) {
                        comments_template('', true);
                    } ?>
                    <div class="wd-post__pagination">
                        <?php echo paginate_links(); ?>
                    </div>
                </div>
            </div>
            <div class="large-2 small-12 main columns"></div>
    <?php

        } ?>


    </main>
<?php get_footer();