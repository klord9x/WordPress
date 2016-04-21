
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 */
 

$safeguard_pix_custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>

<?php get_header();?>

<div class="container">
    <div class="row">
    
	<?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
        
        <div class="posts col-xs-12 <?php if ($safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>"> 
        	<div class="big-posts">   
			<?php 
                $wp_query = new WP_Query();
                $safeguard_pix_pp = get_option('posts_per_page');
                $wp_query->query('posts_per_page='.$safeguard_pix_pp.'&paged='.$paged);			
                get_template_part( 'loop', 'index' );
            ?>
        	</div>
        </div>
  
    <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
      
	</div>
</div>
    
<?php get_footer(); ?>