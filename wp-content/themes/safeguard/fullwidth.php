<?php 
/**
 * The template for displaying full width.
 *
 * @package Safeguard
 * @since 1.0
 *
 * Template Name: Full Width
 */
 
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>

<?php get_header();?>

<div class="home-section">
    <div class="container">   
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>
  
    <?php endwhile; ?>	
    </div>
</div>

<?php get_footer();?>
