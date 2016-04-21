 <?php /* Template Name: Single Post */ 

$safeguard_pix_custom =  get_post_custom($post->ID);
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>
<?php get_header();?>

<div class="container">
    <div class="row">
      
		<?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
        
      	<div class="posts col-xs-12 col-sm-12 <?php if ($safeguard_pix_layout == '1'):?> col-md-12 col-lg-12 <?php else: ?> col-md-9 col-lg-9 <?php endif?>">
        	<div class="single-post">
            
        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            	
                <article id="post-<?php esc_attr(the_ID());?>" class="post">
    				<div class="entry-main">
 
                        <?php			
							$safeguard_pix_format  = get_post_format();
							$safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery")) ? 'standared' : $safeguard_pix_format;								
							get_template_part('template-parts/post-format-single/blog', $safeguard_pix_format);
						?>
						
						<div class="post-info">
						<?php if(safeguard_pix_get_option('safeguard_pix_blog_show_author', '1')) : ?>
							<span><?php esc_html_e( 'BY', 'safeguard' ); ?> <?php the_author_posts_link(); ?></span>
						<?php endif?>
						<?php if(safeguard_pix_get_option('safeguard_pix_blog_show_date', '1')): ?>
				        	<span><?php echo get_the_time('M j, Y'); ?></span>
				        <?php endif?>
				        <?php 
						if( safeguard_pix_get_option('safeguard_pix_blog_show_category', '1') ){
							$safeguard_pix_categories = get_the_category($post->ID);
							if($safeguard_pix_categories){
								$safeguard_pix_output = '<span>';						
								foreach($safeguard_pix_categories as $safeguard_pix_category) {
									$safeguard_pix_output .= '<a href="'.esc_url(get_category_link( $safeguard_pix_category->term_id )).'">'.wp_kses_post($safeguard_pix_category->cat_name).'</a>, ';
								}
								$safeguard_pix_output = substr($safeguard_pix_output, 0, -2).'</span>';
								echo wp_kses_post($safeguard_pix_output);
							}
						}
						?>
				        <?php if( 'open' == $post->comment_status && safeguard_pix_get_option('safeguard_pix_blog_show_comments', '1') ) : ?>
				            <span>
				              	<?php comments_popup_link( esc_html__( '0', 'safeguard' ), esc_html__( '1', 'safeguard' ), esc_html__( '%', 'safeguard' ), "comments-link"); ?><?php esc_html_e( ' Comment(s)', 'safeguard' ); ?>
				            </span>
				       	<?php endif; ?>
						</div>
						<h1 class="entry-title"><?php the_title() ?></h1>
						<div class="post-content rtd">
							<?php the_content() ?>
						</div>
						
						<?php wp_link_pages();?>

                        <?php
                        if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
							if(safeguard_pix_get_option('safeguard_pix_blog_show_tag', '1')){
								$safeguard_pix_posttags = get_the_tags($post->ID);
								if ($safeguard_pix_posttags) {
									$safeguard_pix_output = '<div class="footer-panel">
                        							<i class="icon-tag color_primary"></i>';
									foreach($safeguard_pix_posttags as $safeguard_pix_tag) {
										$safeguard_pix_output .= '<a href="'.esc_url(get_tag_link( $safeguard_pix_tag->term_id )).'" >'.wp_kses_post($safeguard_pix_tag->name).'</a>';
									}
									$safeguard_pix_output .= '</div>';
									echo wp_kses_post($safeguard_pix_output);
								}
							}
						endif; // End if 'post' == get_post_type()?>

                        <?php if ( shortcode_exists( 'share' ) ) {  ?>
                        <div class="social-links clearfix">
							<?php if(safeguard_pix_get_option('safeguard_pix_blog_share', 1)) echo do_shortcode('[share]'); ?>                        
                        </div>
						<?php } ?>
	                </div>
                </article>
                    
    
			<?php if(safeguard_pix_get_option('safeguard_pix_blog_show_comments', 1)) : ?>
                <section class="comments">
                    <?php comments_template(); ?>				
                </section>
                <section class="new-comment">          
                  <?php $test = false; if ($test) {comment_form(); } ?>
                </section>
            <?php endif; ?>
            
        <?php endwhile; ?>
        
			</div>
      	</div>
    	
		<?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
        
	</div>
</div>
<?php get_footer();?>
