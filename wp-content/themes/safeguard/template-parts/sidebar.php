<?php /*** This html display sidebar for other templates. ***/ ?>

<div class="col-xs-12 col-sm-12 col-md-3">
  <aside class="sidebar">
    <?php if ( is_active_sidebar( $safeguard_pix_sidebar ) ) : dynamic_sidebar($safeguard_pix_sidebar);   endif;?>
  </aside>
</div>

