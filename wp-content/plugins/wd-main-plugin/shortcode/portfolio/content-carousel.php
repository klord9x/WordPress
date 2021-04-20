<ul class='portfolio_<?php echo $layout; ?>  small-up-2 medium-up-2'  data-autoplay="<?php echo $auto_play ?>" data-show="<?php echo $number ?>">
    <?php
    while($loop->have_posts()) : $loop->the_post(); ?>
        <li class="portfolio_<?php echo $layout ."--item " . $animation_classes; ?> column-block columns "  <?php echo esc_attr($data_animated); ?>>
            <div class="item">
                <?php
                $img_id = get_post_thumbnail_id(get_the_ID());
                $thumb = wp_get_attachment_image_src( $img_id, 'compactor_c-portfolio');
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

                the_post_thumbnail('compactor_c-portfolio', $default_attr) ?>
                <div class="info">
                    <h4 class="animated-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="wd-portfolio-category-holder animated-item">
                        <?php
                        $terms = get_the_terms( get_the_ID(), 'portfolio_categories' );
                        if ( $terms && ! is_wp_error( $terms ) ) {
                            foreach($terms as $term) {
                                echo '<a class="wd-portfolio-category" href="#">' . $term->name . '</a>';
                            }
                        } ?>
                    </div>
                </div>
              <div class="portfolio_arrow">
                <svg width="100px" height="100px" viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M82.5016759,45.9206349 L1,45.9206349 L1,53.6984127 L82.5016759,53.6984127 L64.2258065,
                  70.0431336 L70.3007856,75.4761905 L99, 49.8095238 L70.3007856,24.1428571 L64.2258065,29.575914 L82.5016759,45.9206349 Z"></path>
                </svg>
              </div>
            </div>
        </li>
    <?php endwhile; ?>
</ul>