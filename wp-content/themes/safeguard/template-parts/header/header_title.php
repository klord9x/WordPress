<?php /* Header Title template */ ?>
           
        	<h1 class="title">
          <?php 
	        	$safeguard_pix_postpage_id = get_option('page_for_posts'); 
				$safeguard_pix_frontpage_id = get_option('page_on_front');
				$safeguard_pix_page_id = isset ($wp_query) ? $wp_query->get_queried_object_id() : '';	
          ?>
          <?php if(is_single() && ! is_attachment()): ?>
          <?php echo wp_kses_post(get_the_title()); ?>
          <?php elseif( class_exists( 'WooCommerce' ) && (is_shop() || is_product_category() || is_product_tag()) ): ?>
          <?php wp_kses_post(woocommerce_page_title()); ?>
          <?php elseif( is_archive() && get_post_type() != 'post'): ?>
          <?php echo wp_kses_post($term->name); ?>
          <?php elseif( is_archive() ): ?>
          <?php echo wp_kses_post(get_the_title($safeguard_pix_postpage_id)); ?>
          <?php elseif( is_page_template( 'blog-template.php' ) ): ?>          
          <?php echo wp_kses_post(get_the_title($safeguard_pix_page_id));  ?>
          <?php elseif( $safeguard_pix_page_id == $safeguard_pix_frontpage_id ): ?>          
          <?php echo wp_kses_post(esc_html_e('Safeguard Posts', 'safeguard'));  ?>
          <?php elseif( is_search() ): ?>
          <?php echo wp_kses_post(get_search_query()); ?>
          <?php elseif( is_category() ): ?>
          <?php echo wp_kses_post(single_cat_title()); ?>
          <?php elseif( is_tag() ): ?>
          <?php echo wp_kses_post(single_tag_title()); ?>
          <?php elseif( isset($post->ID) && $post->ID > 0 ): ?>
          <?php echo wp_kses_post(get_the_title($safeguard_pix_page_id)); ?>
          <?php else: ?>
          <?php echo wp_kses_post(get_the_title()); ?>
          <?php endif; ?>
        	</h1>
        <?php if( is_archive() && !in_array(get_post_type(), array('post', 'product')) && is_object($term) ) :
				$description = get_term_field( 'description', $term->term_id, 'portfolio_category' ); 
				if( !is_wp_error( $description ) && $description != '' ) : ?>
					<span class="subtitle"><?php echo wp_kses_post($description); ?></span>
				<?php endif; ?>
		<?php elseif( class_exists( 'RW_Meta_Box' ) && rwmb_meta( 'add_title' ) != '' ) : ?>
            	<span class="subtitle"><?php echo wp_kses_post(rwmb_meta( 'add_title_desc' ))?></span>        
        <?php endif; ?>