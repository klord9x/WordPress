<?php 
/*** The template for displaying archive pages ***/

$safeguard_pix_custom =  get_post_custom($post->ID);
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>

 <?php get_header();?>
 

<main class="section" id="main">
  <div class="container">
    <div class="row"> 
    
     <?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
      
       <div class="col-xs-12 col-sm-7 col-md-9  <?php if ($safeguard_pix_layout == '3'):?>  col2-left  <?php endif?>   <?php if ($safeguard_pix_layout == '2'):?>  col2-right  <?php endif?>">  
        <section role="main" class="main-content">
        
   
            <?php
				if ( have_posts() ) 
					the_post();
				rewind_posts();       
				get_template_part( 'loop', 'archive' );
            ?>
    
        
        </section></div>
        
      <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>      
    
    </div>
    </div>
    </main>
   

<?php get_footer(); ?>