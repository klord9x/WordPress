 <?php /* Template Name: Single Service */ 

$safeguard_pix_custom =  get_post_custom($post->ID);
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>
<?php get_header();?>

<main class="main-content">

      <div class="container">
      
		<?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
        
   	<div class="col-xs-12 <?php if ($safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">    
        
        
        
        
        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
					
					$safeguard_pix_thumbnail = get_the_post_thumbnail($post->ID);
			
			?>
            	

                    
            
                    	<?php the_content(); ?>
                 
          
                
        <?php endwhile; ?>
      </div>
      <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>

  </div>
</section>
<?php get_footer();?>
