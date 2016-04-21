<?php /*** The loop that displays posts.***/ ?>

<?php 

$safeguard_pix_custom = get_option('page_for_posts') != '' ? get_post_custom(get_option('page_for_posts')) : '';
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) && $safeguard_pix_custom['safeguard_pix_page_layout'][0] == '1' ? 3 : 2;
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
$safeguard_pix_i=0;
?>

<?php if ( ! have_posts() ) : ?>
	<div  class="post error404 not-found">
		<h1 class="entry-title"><?php esc_html_e( 'Not Found', 'safeguard' ); ?></h1>
		<div class="entry-content">
			<p><?php esc_html_e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'safeguard' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?> 

<?php while ( have_posts() ) : the_post(); ?>
    
    <?php $safeguard_pix_class_post = $post->post_type != 'post' ? 'post' : ''; ?>      
    <article id="post-<?php esc_attr(the_ID());?>" <?php post_class('blog-item bounceInUp '.esc_attr($safeguard_pix_class_post)); ?> data-animation="bounceInUp">
    	<div class="entry-main">
    <?php        
        get_template_part('template-parts/blog-template/blog', 'template');
    ?> 
        </div><!-- end entry-main -->    
    </article>
    <!-- end post -->
    <i class="decor-brand"></i>    

<?php $safeguard_pix_i++;  endwhile;?>

<div class="pagination clearfix">
    <?php 
    if ( $wp_query->max_num_pages > 1 ) :
		include(get_template_directory() . '/library/functions/wp-pagenavi.php' );
		if(function_exists('wp_pagenavi')) { wp_pagenavi();}
	endif; 
    ?>
</div>
