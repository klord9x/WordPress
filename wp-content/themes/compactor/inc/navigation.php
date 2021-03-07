<?php

// This theme uses wp_nav_menu() in two locations.
if (class_exists('WebdeviaMainPlugin')) {
	register_nav_menus(array(
		'primary' => esc_html__('Primary Navigation', 'compactor'),
		'one-page' => esc_html__('One page Navigation', 'compactor'),

	));
}else{
	register_nav_menus(array(
		'primary' => esc_html__('Primary Navigation', 'compactor'),
	));
}

/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if (!function_exists('compactor_top_bar_primary')) {
	function compactor_top_bar_primary() {
		if ((get_post_meta(get_the_ID(), 'wd_one_page', true)) && get_post_meta(get_the_ID(), 'wd_one_page', true) == "yes") {
			$primarymenu = "one-page";
		} else {
			$primarymenu = "primary";
		}
		wp_nav_menu(
			array(
				'container' => false,
				'menu_class' => 'desktop-menu menu',
				'theme_location' => $primarymenu,
				'depth' => 4,
				'fallback_cb' => 'compactor_main_menu_fallback',
				'walker' => new compactor_top_bar_walker(),
			)

		);
	}
}

/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if (!function_exists('compactor_mobile_nav')) {
	function compactor_mobile_nav() {
		wp_nav_menu(
			array(
				'container' => false,                         // Remove nav container
				'menu' => esc_html__('mobile-nav', 'compactor'),
				'menu_class' => 'vertical menu',
				'theme_location' => 'primary',
				'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb' => false,
				'walker' => new compactor_mobile_walker(),
			)
		);
		if (compactor_get_option('wd_call_to_action') != "") { ?>
      <div class="header-cta show-for-medium-down">
				<?php echo html_entity_decode(compactor_get_option('wd_call_to_action')); ?>
      </div>
		<?php }
		if (function_exists('WC')) {
			?>
      <div class="show-cart-btn">
				<?php
				$product_cart_count = WC()->cart->cart_contents_count;
				?>
        <svg viewBox="0 -31 512 512" xmlns="http://www.w3.org/2000/svg" style="width: 25px;">
          <path
            d="M164.96 300.004h.024c.02 0 .04-.004.059-.004H437a15.003 15.003 0 0 0 14.422-10.879l60-210a15.003 15.003 0 0 0-2.445-13.152A15.006 15.006 0 0 0 497 60H130.367l-10.722-48.254A15.003 15.003 0 0 0 105 0H15C6.715 0 0 6.715 0 15s6.715 15 15 15h77.969c1.898 8.55 51.312 230.918 54.156 243.71C131.184 280.64 120 296.536 120 315c0 24.812 20.188 45 45 45h272c8.285 0 15-6.715 15-15s-6.715-15-15-15H165c-8.27 0-15-6.73-15-15 0-8.258 6.707-14.977 14.96-14.996zM477.114 90l-51.43 180H177.032l-40-180zm0 0M150 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0M362 405c0 24.813 20.188 45 45 45s45-20.188 45-45-20.188-45-45-45-45 20.188-45 45zm45-15c8.27 0 15 6.73 15 15s-6.73 15-15 15-15-6.73-15-15 6.73-15 15-15zm0 0">
          </path>
        </svg>
        <span class="min-cart-count">  <?php echo esc_html($product_cart_count); ?> </span>
        <div class="hidden-cart" style="display: none;">
					<?php the_widget('WC_Widget_Cart'); ?>
        </div>
      </div>
			<?php
		}
		if (compactor_get_option('action_button') != "") { ?>
      <div class="header-cta show-for-large-up large-screen">
				<?php echo html_entity_decode(compactor_get_option('action_button')); ?>
      </div>
		<?php }

	}
}


/**
 * Get title bar responsive toggle attribute
 */

if (!function_exists('compactor_title_bar_responsive_toggle')) {
	function compactor_title_bar_responsive_toggle() {

		echo 'data-responsive-toggle="mobile-menu"';

	}
}


/**
 * Menu Fallback
 */

function compactor_main_menu_fallback() {
	if(is_user_logged_in()) {
		echo '<div class="empty-menu">';
		echo esc_html__('Please assign a menu to the primary menu location under ', 'compactor'); ?>
		<a
			href="<?php echo get_admin_url(get_current_blog_id(), 'nav-menus.php') ?>"><?php echo esc_html__('Menus Settings', 'compactor') ?></a>
		</div> <?php
	}
}