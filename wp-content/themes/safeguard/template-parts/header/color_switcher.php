<?php /* Color Switcher template */ ?>

<div class="demo_changer">
  <div class="demo-icon"> <i class="fa fa-cog fa-spin fa-2x"></i> </div>
  <!-- end opener icon -->
  <div class="form_holder">
    <h3 class="title-option">
      <?php esc_html_e('Theme Customization', 'safeguard')?>
    </h3>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="predefined_styles">
          <div class="color_box">
          	<a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color1" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color2" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color3" class="styleswitch" > </a>
          </div>
          <div class="color_box">
          	<a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color4" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color5" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color6" class="styleswitch" > </a>
          </div>
          <div class="color_box">
          	<a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color7" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color8" class="styleswitch" > </a>
            <a href="<?php echo esc_url(get_site_url()); ?>/wp-admin/access_customizer.php" rel="color9" class="styleswitch" > </a>
          </div>
        </div>
        <!-- end predefined_styles --> 
      </div>
      <!-- end col --> 
      
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end form_holder --> 
</div>