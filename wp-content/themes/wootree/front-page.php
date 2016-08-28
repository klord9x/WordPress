<?php get_header(); ?>

<!-- piscesslider -->
<div id="slide_holder">
    <div id="slider" class="nivoSlider" style="position: relative; background: url(<?php echo get_template_directory_uri().'/images/choco_img/slider/slider_03.1.png'; ?>) no-repeat; ">
        <a href="#" class="nivo-imageLink" style="display: none;"><img width="940" height="400" src="<?php echo get_template_directory_uri().'/images/choco_img/slider/slider_04.png'; ?>" alt="" title="" style="display: none;"></a>
        <a href="#" class="nivo-imageLink" style="display: block;"><img width="940" height="400" src="<?php echo get_template_directory_uri().'/images/choco_img/slider/slider_01.png'; ?>" alt="" title="" style="display: none;"></a>
        <a href="#" class="nivo-imageLink" style="display: block;"><img width="940" height="400" src="<?php echo get_template_directory_uri().'/images/choco_img/slider/slider_03.1.png'; ?>" alt="" title="" style="display: none;"></a>
    </div>
</div>

<!-- /piscesslider -->
<div id="columns">
<!-- Center -->
    <div id="center_column" class="center_column">
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
<?php get_footer(); ?>