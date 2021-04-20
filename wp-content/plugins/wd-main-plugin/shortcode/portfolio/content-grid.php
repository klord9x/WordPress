<ul class='portfolio_<?php echo $layout; ?> small-up-1 medium-up-2 large-up-<?php echo $columns; ?> columns'>
    <?php
    while($loop->have_posts()) : $loop->the_post(); ?>
        <li class="portfolio_<?php echo $layout ."--item " . $animation_classes; ?> column column-block "  <?php echo esc_attr($data_animated); ?>>
            <div class="item">
                <?php
                $img_id = get_post_thumbnail_id(get_the_ID());
                $thumb = wp_get_attachment_image_src( $img_id, 'compactor_portfolio');
                $srcset = wp_get_attachment_image_srcset($img_id);
                $src = $thumb['0'];
                $placeholder = "//via.placeholder.com/408x278/eee/222/&text=+";

                $default_attr = array(
	                'src' => $placeholder,
	                'data-src' => $src,
	                'data-srcset' => $src,
	                'class' => "lazy",
	                'alt' => get_the_title($img_id)
                );
                the_post_thumbnail('compactor_portfolio', $default_attr) ?>
                <div class="info">
                    <div class="wd-portfolio-category-holder animated-item">
                        <?php
                        $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach($terms as $term) {
                                echo '<a class="wd-portfolio-category" href="#">' . $term->name . '</a>';
                            }
                        } ?>
                    </div>
                    <h4 class="animated-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>

            </div>

        </li>
    <?php endwhile; ?>
</ul>