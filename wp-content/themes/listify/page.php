<?php
/**
 * The template for displaying pages.
 *
 * @package Listify
 */

get_header(); ?>

	<div 
	<?php
	echo apply_filters(
		'listify_cover', 'page-cover', array( // WPCS: XSS ok.
			'size' => 'full',
		)
	);
	?>
	>
		<h1 class="page-title cover-wrapper">
		<?php
		the_post();
		the_title();
		rewind_posts();
?>
</h1>
	</div>

	<?php do_action( 'listify_page_before' ); ?>

	<div id="primary" class="container">
		<div class="row content-area">

			<main id="main" class="site-main col-md-8 col-sm-7 col-12" role="main">

				<?php if ( listify_has_integration( 'woocommerce' ) ) : ?>
					<?php wc_print_notices(); ?>
				<?php endif; ?>

				<?php
				while ( have_posts() ) :
					the_post();
?>
					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template(); ?>
				<?php endwhile; ?>

			</main>

			<?php get_sidebar(); ?>

		</div>
	</div>

<?php get_footer(); ?>
