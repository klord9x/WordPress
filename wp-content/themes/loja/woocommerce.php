<?php 
global $wp_query,$dh_ul_product_class;
$woo_products_pagination = dh_get_theme_option('woo-products-pagination','page_num');
if($woo_products_pagination === 'infinite_scroll'){
	wp_enqueue_script('vendor-infinitescroll');
	$dh_ul_product_class = 'infinite-scroll-wrap';
}elseif ($woo_products_pagination === 'loadmore'){
	$dh_ul_product_class = 'loadmore-wrap';
}
$main_class = dh_get_main_class();
$toolbar_main_class = 'cold-md-12';
$layout = dh_get_main_class(false,true);
if($layout == 'left-sidebar'){
	$toolbar_main_class = $main_class.' pull-right';
}
if ($layout == 'right-sidebar'){
	$toolbar_main_class = $main_class;
}
?>
<?php get_header('shop') ?>
	<div class="content-container">
		<div class="<?php dh_container_class() ?>">
			<div class="row">
				<?php do_action('dh_left_sidebar')?>
				<?php do_action('dh_left_sidebar_extra')?>
				<div class="<?php echo esc_attr($main_class) ?>" role="main" data-itemprop="mainContentOfPage">
					<div class="main-content">
						<?php if(is_shop() || is_product_taxonomy()){?>					
						<div class="woo-content" data-paginate="<?php echo esc_attr($woo_products_pagination) ?>"  data-itemselector=".woo-content li.product">
						<?php }?>
						<?php 
						if(class_exists('DH_Woocommerce'))
							DH_Woocommerce::content();
						?>
						<?php if(is_shop() || is_product_taxonomy()){?>	
							<?php if($woo_products_pagination === 'loadmore' && 1 < $wp_query->max_num_pages ):?>
							<div class="loadmore-action">
								<div class="loadmore-loading"><div class="fade-loading"><i></i><i></i><i></i><i></i></div></div>
								<button type="button" class="btn-loadmore"><?php echo esc_html(dh_get_theme_option('woo-products-loadmore-text','Load More')) ?></button>
							</div>
							<?php endif;?>
						</div>
						<?php }?>
					</div>
				</div>
				<?php do_action('dh_right_sidebar_extra')?>
				<?php do_action('dh_right_sidebar')?>
			</div>
		</div>
	</div>
<?php get_footer('shop') ?>