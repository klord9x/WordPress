<?php /* Template Name: Blog Template*/ 

//$custom =  get_post_custom(get_queried_object()->ID);

$safeguard_pix_custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>

<?php get_header();?>

<section id="pageContentBox" class="pageRow blogPage">
    <div class="wrapper">
        <div class="row">					
    
		  	<?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
                
         	<div class="col-xs-12 <?php if ($safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">            
				<?php 
                    $wp_query = new WP_Query();
                    $safeguard_pix_pp = get_option('posts_per_page');
                    $wp_query->query('posts_per_page='.$safeguard_pix_pp.'&paged='.$paged);			
                    get_template_part( 'loop', 'index' );
                ?> 
        	</div>
          
            <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
      
		</div>
	</div>
</section>
    
<?php get_footer(); ?>