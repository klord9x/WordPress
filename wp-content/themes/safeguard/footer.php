<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
    $safeguard_pix_options = get_option('safeguard_pix_general_settings');
    $post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : (isset($post->ID) && $post->ID>0 ? $post->ID : '');

?>
</div>
<!-- end #content-->


<footer>
  <div class="color-part2"></div>
  <div class="color-part"></div>
  <div class="block-content">
    <div class="container">
    <?php
        do_action('safeguard_pix_static_footer', $post_ID);
        
        echo apply_filters('safeguard_pix_script_footer', $safeguard_pix_options['safeguard_pix_custom_js']);
	?>
    </div>
 
    
      
  </div>
  
  <div class="copy text-center">
        <div class="container">  <?php if (!empty($safeguard_pix_options['safeguard_pix_footer_copy'])) { echo wp_kses_post($safeguard_pix_options['safeguard_pix_footer_copy']); }?>
      </div>
    </div>
</footer>
</div>
<!-- end container -->
<?php
    wp_footer();
?>
</body></html>