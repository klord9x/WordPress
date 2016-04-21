<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$safeguard_pix_format  = get_post_format();
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
$safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_pix_format;
		
?>
		<?php
			get_template_part( 'template-parts/post-format/blog', $safeguard_pix_format);            
		?>
		<div class="post-info">
			<span><?php esc_html_e( 'BY', 'safeguard' ); ?> <?php the_author_posts_link(); ?></span>
		<?php if(safeguard_pix_get_option('safeguard_pix_blog_show_date', '1')): ?>
        	<span><a href="<?php esc_url(the_permalink())?>"><?php echo get_the_time('M j, Y'); ?></a></span>
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
		<h1><a href="<?php esc_url(the_permalink())?>"><?php the_title() ?></a></h1>
		<div class="post-content">
			<?php echo do_shortcode(get_the_excerpt()); ?>
		</div>
		<a href="<?php esc_url(the_permalink())?>" class="btn btn-success btn-default read-more"><?php esc_html_e( 'READ MORE', 'safeguard' ); ?></a>
			