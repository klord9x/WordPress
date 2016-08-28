<?php get_header(); ?>

<!-- <section class="row">
  <div class="small-12 columns text-center">
    <div class="leader"> -->
    <div id="columns">
    <!-- Center -->
        <div id="center_column" class="center_column">
            <?php include(locate_template('common/breadcrumb.php')); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          
            <h1><?php the_title(); ?></h1>      
            <p><?php the_content(); ?></p>        
      	
        	<?php endwhile; else : ?>
        	
        	  <p><?php _e( 'Sorry, page found.', 'treehouse-portfolio' ); ?></p>
        	
        	<?php endif; ?>    
    </div>
    <!-- /Center -->
    <?php 
        /* Add right column*/
        do_action('wpt_right_column');
    ?>
  <!-- </div> -->
<!-- </section> -->

<?php get_footer(); ?>