<?php get_header() ?>
	<section class="titlebar">
		<div class="row">
			<div>
				<h1 id="page-title" class="title"><?php the_title(); ?></h1>
			</div>
      <?php compactor_breadcrumb(); ?>
		</div>
	</section>
	<main class="l-main row">
		<div class="large-<?php if ( is_active_sidebar( 'sidebar-1' ) ) { echo "8";}else{ echo "12";} ?> small-12 large-centered columns ">
				<?php if (have_posts()) : ?>
					 <?php while (have_posts()) : the_post(); ?>
							<div <?php post_class('blog-posts'); ?>>

                <?php if(has_post_thumbnail()){ ?>
                  <div class="wd-post__thumbnail wd-post__thumbnail--single">
                    <?php the_post_thumbnail('compactor_blog-thumb'); ?>
                  </div>
                <?php } ?>
								<div class="wd-post__content wd-post__content--single">
									<div class="wd-post__body wd-post__body--single clearfix">
										<?php the_content(); ?>
									</div>

									<ul class="wd-post__meta wd-post__meta--single clearfix">
										<li class="entry-date"><?php echo get_the_date(); ?></li>
										<li class="entry-author"><?php echo esc_html__('By: ','compactor');  the_author() ?></li>
										<li class="wd-post__categories"><?php echo esc_html__('Category:','compactor');   the_category(', '); ?></li>

										<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
										<?php if(is_array(get_the_terms( get_the_ID(), 'post_tag'))){ ?>
											<li class="entry-tags"><?php the_tags(esc_html__('Tags: ','compactor'), ''); ?></li>
										<?php } ?>
									</ul>

									<?php if (compactor_get_option('show_next_previous_posts', 'on') == 'on') {
										get_template_part( 'template-parts/next-previous-post' );
									 } ?>

									<?php if (compactor_get_option('show_related_posts') == 'on') { ?>
										<div class="related-post clearfix">
											<?php $compactor_postID = get_the_ID();
											compactor_related_posts($compactor_postID); ?>
										</div>
									<?php } ?>

									<?php if (comments_open()|| get_comments_number()){
										comments_template( '', true );
									} ?>
								</div>
							</div>
						 <?php endwhile;
					endif;?>
					<?php wp_link_pages( array( 'before' => '<div class="wd-post__pagination">', 'after' => '</div>' ) ); ?>

		</div>

		<?php
		//get_sidebar(); ?>
	</main>
	<?php get_footer(); ?>