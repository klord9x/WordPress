<?php  
/*** The template for displaying all pages. ***/ 
$safeguard_pix_custom =  get_post_custom($post->ID);
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>

<?php get_header();?>




  <div class="container">
    <div class="row"> 
    <?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>        
       <div class="col-xs-12   <?php if ($safeguard_pix_layout == '3'):?> col-sm-12 col-md-9  <?php endif?>   <?php if ($safeguard_pix_layout == '2'):?>  col-sm-12 col-md-9  <?php endif?>  <?php if ($safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12  <?php endif?>">  
        <section role="main" class="main-content">
        
             <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        		<?php $safeguard_pix_page_com_id = $post; ?>
                <?php the_content(); ?>                
          		<?php if('open' == $safeguard_pix_page_com_id->comment_status) : ?>
                  	<div class="section-comment ">
                    	<?php comments_template(); ?>
                    	<?php $test = false; if ($test) {comment_form(); } ?>
                    </div>
                <?php endif; ?>
        <?php endwhile; ?>	
  
        
        </section>
       </div>
      
     <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
      
    </div>
  </div>
   

  
  <?php get_footer();?>
