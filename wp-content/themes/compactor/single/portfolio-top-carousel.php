<?php
/*
Template Name: Top carousel
Template Post Type: portfolio
*/
get_header() ?>


    <section class="titlebar">
        <div class="row">
            <div>
                <h1 id="page-title" class="title"><?php the_title(); ?></h1>
            </div>
            <?php compactor_breadcrumb(); ?>
        </div>
    </section>
    <!-- content  -->
    <main class="row">
        <div class="large-12 small-12 columns">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-portfolio top-carousel-portfolio">

                        <div>
                            <ul class="wd-gallery-images-holder clearfix wd-post__thumbnail--gallery">
                                <?php
                                $portfolio_image_gallery_val = get_post_meta(get_the_ID(), 'wd_portfolio-image-gallery', true);
                                if ($portfolio_image_gallery_val != '') $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);

                                if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0):
                                    foreach ($portfolio_image_gallery_array as $gimg_id):
                                        echo '<li class="wd-gallery-image-holder"><a class="portfolioex" 
                                              href="' . wp_get_attachment_image_url($gimg_id, 'full') . '" data-lightbox="roadtrip" >'
                                            . wp_get_attachment_image($gimg_id, 'compactor_single-st-portfolio', false) . '</a></li>';
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="large-8 columns">
                                <div class="description">
                                    <div>
                                        <h3>
                                            <?php echo esc_html__('Project Description', 'compactor') ?>
                                        </h3>
                                    </div>
                                    <div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="large-4 columns">

                                <div class="item-info">
                                    <div>
                                        <h3>
                                            <?php echo esc_html__('Information', 'compactor') ?>
                                        </h3>
                                    </div>
                                    <ul>
                                        <li>
                                            <span
                                                class="cat"><strong><?php echo esc_html__('Category: ', 'compactor') ?></strong></span>
                                            <?php
                                            $terms = get_terms("portfolio_categories");

                                            foreach ($terms as $term) {
                                                ?><span> <?php echo esc_attr($term->name); ?>, </span> <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <span
                                                class="dat"><strong><?php echo esc_html__('Date: ', 'compactor') ?></strong></span>
                                            <span><?php
                                                the_date();
                                                ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </article>
                <?php endwhile;
            endif; ?>
        </div>

    </main>
    <!-- /content  -->
<?php get_footer(); ?>