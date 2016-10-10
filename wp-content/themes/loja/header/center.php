<?php 
$login_url = wp_login_url();
$logout_url = wp_logout_url();
$register_url = wp_registration_url();
if(defined('WOOCOMMERCE_VERSION')){
	$login_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
	$logout_url = wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) );
}
?>
<header id="header" class="header-container page-heading-<?php echo esc_attr($page_heading) ?> header-type-default header-default-center header-navbar-default<?php /* if($menu_transparent):?> header-absolute header-transparent<?php endif */ ?> header-scroll-resize" itemscope="itemscope" itemtype="<?php echo dh_get_protocol()?>://schema.org/Organization" role="banner">
	<?php if(dh_get_theme_option('show-topbar',1)):?>
	<div class="topbar">
		<div class="container-fluid topbar-wap">
			<div class="row">
				<div class="col-sm-6">
					<div class="left-topbar">
						<?php 
						if($left_topbar_content = dh_get_theme_option('left-topbar-content'))
							echo '<div class="left-topbar-content pull-left">'.$left_topbar_content.'</div>';	
						?>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="right-topbar">
						<div class="user-login pull-right">
							<ul class="nav top-nav">
	            					<?php 
	            					if ( has_nav_menu( 'top' ) ) :
	            					wp_nav_menu( array(
	            						'theme_location'    => 'top',
	            						'depth'             => 2,
	            						'container'         => false,
	            						'items_wrap' 		=> '%3$s',
	            						'walker'            => new DH_Walker
	            					));
	            					endif;
	            					?>
	            			</ul>
            			</div>
						<?php 
						if($right_topbar_content = dh_get_theme_option('right-topbar-content'))
							echo '<div class="right-topbar-content pull-right">'.$right_topbar_content.'</div>';	
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<div class="navbar-container">
		<div class="navbar navbar-default <?php if(dh_get_theme_option('sticky-menu',1)):?> navbar-scroll-fixed<?php endif;?>">
			<div class="navbar-default-wrap">
				<div class="navbar-default-container">
					<div class="navbar-default-row">
						<div class="navbar-default-col">
							<div class="navbar-wrap">
								<div class="navbar-header">
									<div class="<?php dh_container_class() ?>">
										<div class="row">
											<div class="col-md-12">
												<div class="navbar-header-left">
													<?php if(function_exists('icl_get_languages')){?>
													<div class="language-switcher">
														<?php 
														//do_action('icl_language_selector'); 
														$languages = icl_get_languages();
														if( is_array( $languages ) ){
														
															foreach( $languages as $lang_k=>$lang ){
																if( $lang['active'] ){
																	$active_lang = $lang;
																	unset( $languages[$lang_k] );
																}
															}
																
															// disabled
															if( count( $languages ) ){
																$lang_status = 'enabled';
															} else {
																$lang_status = 'disabled';
															}
															echo '<div class="wpml-languages '. $lang_status .'">';
															echo '<a class="active" href="'. $active_lang['url'] .'" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
															echo '<img src="'. $active_lang['country_flag_url'] .'" alt="'. $active_lang['translated_name'] .'"/> '.strtoupper($active_lang['translated_name']);
															if( count( $languages ) ){
																echo ' <span class="caret"></span>';
															}
															echo '</a>';
																
															if( count( $languages ) ){
																echo '<ul class="wpml-lang-dropdown dropdown-menu">';
																foreach( $languages as $lang ){
																	echo '<li><a href="'. $lang['url'] .'"><img src="'. $lang['country_flag_url'] .'" alt="'. $lang['translated_name'] .'"/> '.strtoupper($lang['translated_name']).'</a></li>';
																}
																echo '</ul>';
															}
																
															echo '</div>';
														
														}
														?>
													</div>
													<?php } ?>
													<div class="user-login">
							            				<ul class="nav top-nav">
							            					<li class="menu-item<?php if(is_user_logged_in()):?> menu-item-has-children dropdown<?php endif;?>">
							            						<a <?php if(!is_user_logged_in()): ?>  rel="loginModal" <?php endif;?> href="<?php echo esc_url($login_url) ?>"><i class="fa fa-user"></i> <?php if(!is_user_logged_in()): ?><?php esc_html_e('Login','loja')?><?php else:?><?php esc_html_e('Account','loja')?><?php endif;?>
									            					<?php if(is_user_logged_in()):?>
																	<span class="caret"></span>
																	<?php endif;?>
									            				</a>
									            				<?php if(is_user_logged_in()):?>
																<ul class="dropdown-menu" role="menu">
																	<li class="menu-item">
																		<a href="<?php echo esc_url($logout_url) ?>"><i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'loja'); ?></a>
																	</li>
																</ul>
																<?php endif;?>
							            					</li>
							            				</ul>
							            			</div>
												</div>
												<button <?php /*data-target=".primary-navbar-collapse" data-toggle="collapse"*/?> type="button" class="navbar-toggle">
													<span class="sr-only"><?php esc_html_e('Toggle navigation','loja')?></span>
													<span class="icon-bar bar-top"></span> 
													<span class="icon-bar bar-middle"></span> 
													<span class="icon-bar bar-bottom"></span>
												</button>
												<?php if(dh_get_theme_option('ajaxsearch',1)){ ?>
												<a class="navbar-search-button search-icon-mobile" href="#"><i class="fa fa-search"></i></a>
										    	<?php }?>
										    	<?php if(defined('WOOCOMMERCE_VERSION') && dh_get_theme_option('woo-cart-mobile',1)):?>
										     	<?php 
										     	global $woocommerce;
										     	if ( version_compare( WOOCOMMERCE_VERSION, "2.1.0" ) >= 0 ) {
										     		$cart_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_cart_url() );
										     	}else{
										     		$cart_url = esc_url( $woocommerce->cart->get_cart_url() );
										     	}
										     	?>
												<a class="cart-icon-mobile" href="<?php echo esc_url($cart_url) ?>"><i class="elegant_icon_bag"></i><span><?php echo absint($woocommerce->cart->cart_contents_count)?></span></a>
												<?php endif;?>
												<a class="navbar-brand" itemprop="url" title="<?php esc_attr(bloginfo( 'name' )); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
													<?php if(!empty($logo_url)):?>
														<img class="logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url($logo_url)?>">
													<?php else:?>
														<?php echo bloginfo( 'name' ) ?>
													<?php endif;?>
													<img class="logo-fixed" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url($logo_fixed_url)?>">
													<img class="logo-mobile" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url($logo_mobile_url)?>">
													<meta itemprop="name" content="<?php bloginfo('name')?>">
												</a>
												<div class="navbar-header-right">
													<?php 
														if(class_exists('DH_Woocommerce') && defined( 'WOOCOMMERCE_VERSION' ) && dh_get_theme_option( 'woo-cart-nav', 1 )){
															echo '<div class="navbar-minicart-topbar">'.DH_Woocommerce::instance()->get_minicart().'</div>';
														}
													?>
													<?php if(defined('YITH_WCWL') && apply_filters('dh_show_wishlist_in_header', true)):?>
							            			<div class="user-wishlist">
							            				<a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url());?>"><i class="user-wishlist-icon fa fa-heart-o"></i> <?php esc_html_e('My Wishlist','loja')?></a>
							            			</div>
							            			<?php endif;?>
							            			<?php if($header_center_social = dh_get_theme_option('header-center-social','')):?>
													<div class="pull-right header-social social-widget-wrap">
														<?php dh_social($header_center_social,true,false)?>
													</div>
													<?php endif;?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<nav class="collapse navbar-collapse primary-navbar-collapse" itemtype="<?php echo dh_get_protocol() ?>://schema.org/SiteNavigationElement" itemscope="itemscope" role="navigation">
									<div class="<?php dh_container_class() ?>">
										<div class="row">
											<div class="col-md-12">
												<?php
												$page_menu = '' ;
												if(is_page() && ($selected_page_menu = dh_get_post_meta('main_menu'))){
													$page_menu = $selected_page_menu;
												}
												if(has_nav_menu('primary') || !empty($page_menu)):
													wp_nav_menu( array(
														'theme_location'    => 'primary',
														'container'         => false,
														'depth'				=> 3,
														'menu'				=> $page_menu,
														'menu_class'        => 'nav navbar-nav primary-nav',
														'walker' 			=> new DH_Mega_Walker
													) );
												else:
													echo '<ul class="nav navbar-nav primary-nav"><li><a href="' . home_url( '/' ) . 'wp-admin/nav-menus.php">' . esc_html__( 'No menu assigned!', 'loja' ) . '</a></li></ul>';
												endif;
												?>
											</div>
										</div>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(dh_get_theme_option('ajaxsearch',1)){?>
			<div class="header-search-overlay hide">
				<div class="<?php echo dh_container_class()?>">
					<div class="header-search-overlay-wrap">
						<?php echo dh_get_search_form()?>
						<button type="button" class="close">
							<span aria-hidden="true" class="fa fa-times"></span><span class="sr-only"><?php echo esc_html__('Close','loja') ?></span>
						</button>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</header>