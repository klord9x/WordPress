<?php
/*** The template for displaying search results pages. ***/
if( get_post() )
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
        
           <?php if ( have_posts() ) : ?>
       
                <?php get_template_part( 'loop', 'search' );?>
        
            <?php else : ?>
                <div id="post-0" class="post no-results not-found">
                    <h1><?php esc_html_e( 'Nothing Found', 'safeguard' ); ?></h1>
                    <div class="entry-content">
                        <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'safeguard' ); ?></p>
                     </div><!-- .entry-content -->
                </div><!-- #post-0 -->
            <?php endif; ?>
        
        </section></div>
        
     <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
    
    </div>
    </div>
    </main>
    

<?php get_footer(); ?>
			
            
            