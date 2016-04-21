<?php /* Header Background Image tamplate */ ?>

<div class="paralax bg-image page-title" style="background-image:url(
  <?php if ( class_exists( 'WooCommerce' ) && is_shop() ) :
	  		$post_thumbnail_id = get_post_thumbnail_id(woocommerce_get_page_id('shop'));
			$image = wp_get_attachment_url( $post_thumbnail_id );
			$image = $image == '' ? (!empty($safeguard_pix_options['safeguard_pix_header_img']) ? $safeguard_pix_options['safeguard_pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
		?>
  <?php echo esc_url($image) ?>);" >
  <?php
	 	elseif ( class_exists( 'WooCommerce' ) && is_product_category() ) :
			$cat = $wp_query->get_queried_object();
	    	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$image = $image == '' ? (!empty($safeguard_pix_options['safeguard_pix_header_img']) ? $safeguard_pix_options['safeguard_pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
		?>
  <?php echo esc_url($image) ?>);" >
  <?php
	 	elseif ( class_exists( 'WooCommerce' ) && is_product() && !empty($post->ID)) :
			$terms = get_the_terms( $post->ID, 'product_cat' );
			$image = '';
			if($terms)
			foreach ($terms as $term) {
				$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if($image != '')
					break;
			}				
			$image = $image == '' ? (!empty($safeguard_pix_options['safeguard_pix_header_img']) ? $safeguard_pix_options['safeguard_pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
			echo esc_url($image) ?>
  );" >
  <?php 
	 	elseif ( is_home() || is_archive() || is_page_template('blog-template.php') ) :
			$term = isset ($wp_query) ? $wp_query->get_queried_object() : '';			
			$image = '';
			if(is_object($term) && $term->taxonomy == 'category') {
				$post_thumbnail_id = get_post_thumbnail_id($term->term_id);
				$image = wp_get_attachment_url( $post_thumbnail_id );
			}
			elseif(is_object($term)){
				$image = get_option("safeguard_pix_tax_thumb".$term->term_id);
			}
			$image = $image == '' ? (!empty($safeguard_pix_options['safeguard_pix_header_img']) ? $safeguard_pix_options['safeguard_pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
			echo esc_url($image) ?>
  );" >
  <?php	 
		elseif ( isset($post->ID) && is_single() && get_post_type($post->ID) == 'post' ) :						
			$categories = get_the_category($post->ID);
			$image = '';
			if($categories){					
				foreach($categories as $category) {
					$image = get_option('safeguard_pix_tax_thumb' . $category->term_id);
					if($image != '')
						break;
				}					
			}				
			$image = $image == '' ? (!empty($safeguard_pix_options['safeguard_pix_header_img']) ? $safeguard_pix_options['safeguard_pix_header_img'] : get_template_directory_uri().'/images/page-img.jpg') : $image;
			echo esc_url($image) ?>
  );" >
  <?php
		elseif( get_post_type() != 'portfolio' && get_post_type() != 'services' ) : 
			if( has_post_thumbnail() ): 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );?>
  <?php 		echo esc_url($post_thumbnail_url) ?>
  );" >
  <?php 	elseif(!empty($safeguard_pix_options['safeguard_pix_header_img'])): ?>
  <?php 		echo esc_url($safeguard_pix_options['safeguard_pix_header_img']) ?>
  );">
  <?php 	else:?>
  <?php 		echo get_template_directory_uri() ?>/images/page-img.jpg);" >
  <?php 	endif;
  		else: ?>
  <?php 	echo get_template_directory_uri() ?>/images/page-img.jpg);" >
  <?php	endif;?>
  
	<div class="container-fluid">
		<?php require_once(get_template_directory() .'/template-parts/header/header_title.php'); ?>
		
		<div class="pull-right">
			<?php
				if ( class_exists( 'WooCommerce' ) && !is_page_template( 'fullwidth.php' )) {
                    woocommerce_breadcrumb();
                } elseif ( function_exists( 'safeguard_pix_breadcrumbs' ) && !is_page_template( 'fullwidth.php' ) ){
	                safeguard_pix_breadcrumbs();
                }
            ?>
		</div>
	</div>
	
</div>
