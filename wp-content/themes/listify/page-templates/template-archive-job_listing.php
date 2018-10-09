<?php
/**
 * Template Name: Page: Listings
 *
 * @package Listify
 */

get_header(); ?>

	<?php do_action( 'listify_output_map' ); ?>

	<div id="primary" class="container">
		<div class="row content-area">

			<?php get_sidebar( 'archive-job_listing' ); ?>

			<?php
			while ( have_posts() ) :
				the_post();
?>
				<main id="main" class="site-main <?php echo esc_attr( listify_job_listing_archive_has_sidebar() ? 'col-md-8 col-sm-12' : null ); ?> col-12 job_filters--<?php echo get_theme_mod( 'listing-filters-style', 'content-box' ); ?>" role="main">
					<?php do_action( 'listify_output_results', get_the_content() ); ?>
				</main>
			<?php endwhile; ?>

		</div>
	</div>

<?php get_footer(); ?>
