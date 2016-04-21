<?php 
/* Woocommerce template. */ 
if( is_shop() || is_product_category() || is_product_tag() ) {
    $safeguard_pix_id = get_option( 'woocommerce_shop_page_id' );
}elseif( is_product() || !empty($post->ID) )
	$safeguard_pix_id = $post->ID;
else
	$safeguard_pix_id = 0;

$safeguard_pix_custom = $safeguard_pix_id > 0 ? get_post_custom($safeguard_pix_id) : '';
if(isset($safeguard_pix_custom) && $safeguard_pix_custom != ''){
	$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
	$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'shop-sidebar-1';
}
$safeguard_pix_options = get_option('safeguard_pix_general_settings');

?>


<?php get_header();?>

<section class="wrap-blog-content">

	<div class="container ">

    	<div class="row">
		
		<?php if (isset($safeguard_pix_layout) && $safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
		
	        <div class="col-xs-12 <?php if (!isset($safeguard_pix_layout) || $safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">
				<main class="main-content">       
	 			<?php  woocommerce_content(); ?>
	 			</main>
	 		</div>
        
        <?php if (isset($safeguard_pix_layout) && $safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
        
	    </div>
	</div>
</section>
            
<?php get_footer();?>
