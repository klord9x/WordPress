<?php 
/*** The taxonomy for portfolio category. ***/
get_header(); 

 	$safeguard_pix_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
	
	
?>
<div class="container-fluid block-content">
	<div class="row main-grid">
		<div class="col-sm-3">
			<div class="sidebar-container">
				<div>
					<ul class="styled">
						<?php $args = array( 'taxonomy' => 'services_category', 'hide_empty' => '1', 'title_li'=> '', 'show_count' => '0', 'current_category' => $safeguard_pix_term->term_id);
						$categories = wp_list_categories ($args);
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="row services">
				
<!--				
<div class="container-fluid inner-offset">    
	<div class="row services">
-->		
	<?php
		$safeguard_pix_services = get_objects_in_term( $safeguard_pix_term->term_id, 'services_category');
		$args = array(
					'post_type' => 'services', 
					'orderby' => 'menu_order',
					'post__in' => $safeguard_pix_services,			 
					'order' => 'ASC'
				);
			
		$wp_query = new WP_Query( $args );
										
		if ($wp_query->have_posts()):
			while ($wp_query->have_posts()) :
				$wp_query->the_post();
				$safeguard_pix_thumbnail = get_the_post_thumbnail($post->ID, 'safeguard_pix-services-thumb', array('class'	=> "full-width"));
	?>
				<div class="service-item col-xs-6 col-sm-4 col-md-4 col-lg-4">
					<?php echo wp_kses_post($safeguard_pix_thumbnail) ?>
					<h4><?php echo wp_kses_post(get_the_title()) ?></h4>
					<p><?php echo safeguard_pix_limit_words(get_the_excerpt(), 20) ?></p>
					<a class="btn btn-success btn-sm" href="<?php echo esc_url(get_permalink(get_the_ID())) ?>"><?php esc_html_e("READ MORE", 'safeguard') ?></a>
				</div>
    <?php
			endwhile;
		endif;
	?>
      

                    
		
			</div>     
		</div>   
    </div>               
</div>


<?php get_footer() ?>