<?php
$output ='';
extract(shortcode_atts( array(
	'id' 		 =>'',
	'image' 	 =>'',
	'visibility' => 'all',
	'el_class'   => '',
), $atts ));

$query_args = array(
	'post_type'           => 'product',
	'post_status'         => 'publish',
	'posts_per_page'      => 1,
	'no_found_rows'		  => 1,
	'meta_query'          => WC()->query->get_meta_query()
);

wp_enqueue_script('vendor-countdown');

$query_args['p'] = absint($id);

$products  = new WP_Query($query_args );
$el_class  = !empty($el_class) ? ' '.esc_attr( $el_class ) : '';
$el_class .= dh_visibility_class($visibility);
ob_start();
if ( $products->have_posts() ) : 
wp_enqueue_script('vendor-countdown');
?>
<div class="woocommerce product-sale-countdown <?php echo $el_class?>">
	<?php while ( $products->have_posts() ) : $products->the_post(); global $post,$product; ?>
		<?php if($product->is_on_sale()):?>
			<?php 
			$product_image='';
			if($image_c = wp_get_attachment_url(absint($image)))
				$product_image = $image_c;
			if(empty($product_image)){
				if ( has_post_thumbnail() ) {
					$product_image = wp_get_attachment_url(get_post_thumbnail_id( $post->ID ));
				} else {
					$product_image = wc_placeholder_img_src();
						
				}
			}
			?>
			<div class="product-sale-countdown-item nice-border-full">
				<span class="nice-border-top-left"></span>
				<span class="nice-border-top-right"></span>
				<span class="nice-border-bottom-left"></span>
				<span class="nice-border-bottom-right"></span>
				<div class="nice-border-content row">
					<div class="col-md-7 col-sm-5 product-sale-countdown-image-wrap bg-cover" style="background-image: url(<?php echo esc_attr($product_image)?>)">
						<div class="product-sale-countdown-image">
							<a href="<?php echo esc_attr(get_permalink())?>"></a>
						</div>
					</div>
					<div class="col-md-5 col-sm-7 product-sale-countdown-info-wrap">
						<div class="product-sale-countdown-info">
							<h3 class="product-sale-countdown-title"><a href="<?php echo get_the_permalink()?>"><?php echo $product->get_title(); ?></a></h3>
							<div class="product-sale-countdown-excerpt">
								<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
							</div>
							<div class="product-sale-countdown-price">
								<?php echo $product->get_price_html(); ?>
							</div>
							<div class="product-sale-countdown-add-to-cart">
								<span class="nice-border-bottom-left"></span>
								<span class="nice-border-bottom-right"></span>
								<?php woocommerce_template_loop_add_to_cart()?>
							</div>
							<?php 
							$sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
							if(empty($sales_price_to) || defined('DH_PREVIEW')){
								$sales_price_to = time() + 7 * 24 * 60 * 60;
							}
							$sales_price_to = date_i18n('Y/m/d', $sales_price_to);
							$html = '
							<div class="countdown-item">
								<div class="countdown-item-value">%D</div>
								<div class="countdown-item-label">'.esc_html__('Days','astore').'</div>
							</div>
							<div class="countdown-item">
								<div class="countdown-item-value">%H</div>
								<div class="countdown-item-label">'.esc_html__('Hours','astore').'</div>
							</div>
							<div class="countdown-item">
								<div class="countdown-item-value">%M</div>
								<div class="countdown-item-label">'.esc_html__('Minuts','astore').'</div>
							</div>
							<div class="countdown-item">
								<div class="countdown-item-value">%S</div>
								<div class="countdown-item-label">'.esc_html__('Seconds','astore').'</div>
							</div>';
							?>
							<div class="product-sale-date" data-html="<?php echo esc_attr($html)?>" data-toggle="countdown" data-end="<?php echo esc_attr($sales_price_to)?>" data-now="<?php echo strtotime("now") ?>">
								<div class="countdown-content"></div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
	<?php endwhile;?>
</div>
<?php endif;
wp_reset_postdata();
echo ob_get_clean();