<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $dh_product_loop_indicators;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
$product_style = dh_get_theme_option('woo-shop-style','style-1');
// Extra post classes
$classes = array($product_style);
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

/**
 * Script
 */
wp_enqueue_script('vendor-carouFredSel');
wp_enqueue_script( 'wc-add-to-cart-variation' );

?>
<li <?php post_class( $classes ); ?>>
	<div class="product-container">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<figure>
			<div class="product-container-wrap <?php if(dh_get_theme_option('woo-shop-thumbnail-type','default') == 'slider'){?> product-container-inner<?php } ?>">
				<div class="product-wrap">
					<?php if ( !$product->is_in_stock() ) : ?>            
		            	<span class="out_of_stock"><?php esc_html_e( 'Out of stock', 'loja' ); ?></span>            
					<?php endif; ?>
					<?php 
					wc_get_template( 'loop/sale-flash.php' );
					?>
					<div class="product-images ">
						<a href="<?php the_permalink(); ?>">
							<?php
								/**
								 * woocommerce_before_shop_loop_item_title hook
								 *
								 * @hooked woocommerce_show_product_loop_sale_flash - 10
								 * @hooked woocommerce_template_loop_product_thumbnail - 10
								 */
								do_action( 'woocommerce_before_shop_loop_item_title' );
							?>
						</a>
					</div>
					<div class="shop-loop-actions">
						<?php do_action('woocommerce_after_shop_loop_item') ?>
					</div>
				</div>
				<?php if(dh_get_theme_option('woo-shop-thumbnail-type','default') == 'slider'){ ?>
					<?php if(!empty($dh_product_loop_indicators)){ // hide with 1 item?>
					<ol class="carousel-indicators">
				    	<li data-target="#carousel-<?php echo esc_attr($product->id)?>" data-slide-to="0" class="active"></li>
						<?php echo $dh_product_loop_indicators?>
					</ol>
					<?php }?>
				<?php } ?>
			</div>
			<figcaption>
				<div class="shop-loop-product-info">
					<div class="info-title">
						<?php if($product_style == 'style-2'){?>
						<div class="product-category"><?php echo defined('SITESAO_PREVIEW') ? dh_get_the_term_list($product->id,'product_cat','', ', ', '') : $product->get_categories()?></div>
						<?php } ?>
						<h3 class="product_title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
					</div>
					<div class="info-meta">
						<div class="info-price">
							<?php woocommerce_template_loop_price(); ?>
						</div>
						<?php if($product_style == 'style-2' || $product_style == 'style-3'){?>
						<div class="info-add-to-cart">
							<?php woocommerce_template_loop_add_to_cart()?>
						</div>
						<?php }?>
					</div>
					<div class="info-excerpt">
						<?php echo wp_trim_words($post->post_excerpt,30)?>
					</div>
					<div class="list-info-meta clearfix">
						<div class="list-action clearfix">
							<div class="loop-add-to-cart">
								<?php woocommerce_template_loop_add_to_cart();?>
							</div>
							<?php if(class_exists('DH_Woocommerce')):?>
							<?php DH_Woocommerce::instance()->template_loop_quickview();?>
							<?php DH_Woocommerce::instance()->template_loop_wishlist();?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</figcaption>
		</figure>
	</div>
</li>