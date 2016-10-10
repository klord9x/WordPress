<?php 
	$header_style = dh_get_theme_option('header-style','classic');
	$menu_transparent = dh_get_theme_option('menu-transparent',0);
	$page_heading = dh_get_post_meta('page_heading',get_the_ID(),'default');
	
	$page_heading_background_image = dh_get_post_meta('page_heading_background_image');
	$page_heading_title = dh_get_post_meta('page_heading_title');
	$page_heading_sub_title = dh_get_post_meta('page_heading_sub_title');
	$page_heading_button_text  = dh_get_post_meta('page_heading_button_text');
	$page_heading_button_url  = dh_get_post_meta('page_heading_button_url');
	$page_heading_breadcrumb_flag = false;
	
	
	if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
		if(is_product_taxonomy()){
			$term_id = get_queried_object_id();
			$page_heading_background_image 	= get_woocommerce_term_meta( $term_id, 'product_cat_heading_thumbnail_id', true );
			$page_heading_title = get_woocommerce_term_meta( $term_id, 'product_cat_heading_title', true );
			$page_heading_sub_title = get_woocommerce_term_meta( $term_id, 'product_cat_heading_sub_title', true );
			$page_heading_button_text = get_woocommerce_term_meta( $term_id, 'product_cat_heading_button_text', true );
			$page_heading_button_url = get_woocommerce_term_meta( $term_id, 'product_cat_heading_button_link', true );
			if(empty($page_heading_title)){
				$page_heading_title = single_term_title('',false);
			}
			$page_heading = apply_filters('dh_product_taxonomy_menu_heading', 'heading',$term_id);'';
			$menu_transparent = apply_filters('dh_product_taxonomy_menu_transparent', false,$term_id);
		}
		
	}
	$page_heading_background_image_url = wp_get_attachment_url($page_heading_background_image);
	
	
	if(is_singular('post') && dh_get_theme_option('blog-heading',1)){
		$page_heading = 'heading';
		$page_heading_background_image_url = dh_get_theme_option('blog-heading-bg','');
		$page_heading_title = dh_get_theme_option('blog-heading-title','Our Blog');
		$page_heading_sub_title = dh_get_theme_option('blog-heading-sub-title','');
	}
	
	if(defined( 'WOOCOMMERCE_VERSION' ) && is_singular('product') && dh_get_theme_option('woo-product-heading',1)){
		$page_heading = 'heading';
		$page_heading_background_image_url = dh_get_theme_option('woo-product-heading-bg','');
		$page_heading_title = dh_get_theme_option('woo-product-heading-title','Our Shop');
		$page_heading_sub_title = dh_get_theme_option('woo-product-heading-sub-title','');
	}
	
	
	if (empty($page_heading_background_image_url)){
		$page_heading_background_image_url = get_template_directory_uri().'/assets/images/header-bg.jpg';
	}
	if(empty($page_heading_title)){
		$page_heading_title = dh_page_title(false);
		if($page_heading == 'heading')
			$page_heading = 'default';
	}
	
	if(empty($page_heading_sub_title)){
		$page_heading_breadcrumb_flag = true;
	}
	
	$page_heading_button_flag = false;
	if($page_heading_button_url && $page_heading_button_text){
		$page_heading_button_flag = true;
	}
	$logo_url = dh_get_theme_option('logo');
	$logo_fixed_url = dh_get_theme_option('logo-fixed','');
	$logo_transparent_url = dh_get_theme_option('logo-transparent','');
	$logo_mobile_url = dh_get_theme_option('logo-mobile','');
	if($page_logo = dh_get_post_meta('page_logo')){
		$page_logo_image_url = wp_get_attachment_url($page_logo);
		if(!empty($page_logo_image_url))
			$logo_url = $logo_transparent_url = $page_logo_image_url;
	}
	if(empty($logo_fixed_url))
		$logo_fixed_url = $logo_url;
	if(empty($logo_mobile_url))
		$logo_mobile_url = $logo_url;
	
	if($menu_transparent && (dh_get_theme_option('header-style','classic') == 'classic'))
		$logo_url = $logo_transparent_url;
?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<?php if ($apple57_url = dh_get_theme_option('apple57')) { ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($apple57_url); ?>"><?php } ?>   
<?php if ($apple72 = dh_get_theme_option('apple72')) { ?>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($apple72); ?>"><?php } ?>   
<?php if ($apple114 = dh_get_theme_option('apple114')) { ?>
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url($apple114); ?>"><?php } ?> 
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if(defined('DHINC_ASSETS_URL')):?>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="<?php echo DHINC_ASSETS_URL ?>/vendor/html5shiv.min.js"></script>
<![endif]-->
<?php endif;?>
<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
<?php do_action( 'dh_before_body' ); ?>
<a class="sr-only sr-only-focusable" href="#main"><?php esc_html_e('Skip to main content','loja') ?></a>
<div class="offcanvas-overlay"></div>	
<div class="offcanvas open">
	<div class="offcanvas-wrap">
		<div class="offcanvas-user clearfix">
			<?php 
			$login_url = wp_login_url();
			$logout_url = wp_logout_url();
			$register_url = wp_registration_url();
			if(defined('WOOCOMMERCE_VERSION')){
				$login_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
				$logout_url = wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) );
			}
			?>
			<?php if(defined('YITH_WCWL') && apply_filters('dh_show_wishlist_in_header', true)):?>
            <a class="offcanvas-user-wishlist-link"  href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url());?>"><i class="fa fa-heart-o"></i> <?php esc_html_e('My Wishlist','loja')?></a>
            <?php endif;?>
            <a class="offcanvas-user-account-link" href="<?php echo esc_url($login_url) ?>"><i class="fa fa-user"></i> <?php if(!is_user_logged_in()): ?><?php esc_html_e('Login','loja')?><?php else:?><?php esc_html_e('Account','loja')?><?php endif;?></a>
		</div>
		<nav class="offcanvas-navbar" itemtype="<?php echo dh_get_protocol() ?>://schema.org/SiteNavigationElement" itemscope="itemscope">
			<?php
			if(has_nav_menu('mobile')):
				wp_nav_menu( array(
					'theme_location'    => 'mobile',
					'container'         => false,
					'depth'				=> 3,
					'menu_class'        => 'offcanvas-nav',
					'walker' 			=> new DH_Walker
				) );
			else:
				echo '<ul class="nav navbar-nav primary-nav"><li><a href="' . home_url( '/' ) . 'wp-admin/nav-menus.php">' . esc_html__( 'No menu assigned!', 'loja' ) . '</a></li></ul>';
			endif;
			?>
		</nav>
		<?php if(is_active_sidebar('sidebar-offcanvas')):?>
		<div class="offcanvas-widget">
			<?php dynamic_sidebar('sidebar-offcanvas')?>
		</div>
		<?php endif;?>
	</div>
</div>
<div id="wrapper" class="<?php echo dh_get_theme_option('site-layout','wide') ?>-wrap">
	
	<?php 
	dh_get_template('header/'.$header_style.'.php',array(
		'page_heading'					=> $page_heading,
		'header_style'					=>$header_style,
		'menu_transparent'				=>$menu_transparent,
		'logo_url'						=>$logo_url,
		'logo_fixed_url'				=>$logo_fixed_url,
		'logo_mobile_url'				=>$logo_mobile_url,
	));
	?>
	<?php 
	$heading_menu_anchor = dh_get_post_meta('heading_menu_anchor');
	?>
	<?php if($page_heading === 'rev' && ($rev_alias = dh_get_post_meta('rev_alias'))):?>
	<div<?php echo (!empty($heading_menu_anchor) ? ' id ="'.esc_attr($heading_menu_anchor).'"': '')?> class="main-slider">
		<div class="main-slider-wrap">
			<?php echo do_shortcode('[rev_slider '.$rev_alias.']')?>
		</div>
	</div>
	<?php endif;?>
	<?php if($page_heading == 'heading' && !empty($page_heading_background_image_url) && !empty($page_heading_title)):?>
		<div<?php echo (!empty($heading_menu_anchor) ? ' id ="'.esc_attr($heading_menu_anchor).'"': '')?> class="heading-container heading-resize<?php echo ($page_heading_button_flag ? ' heading-button':' heading-no-button');?>">
			<div class="heading-background heading-parallax" style="background-image: url('<?php echo esc_attr($page_heading_background_image_url) ?>');">			
				<?php 
				wp_enqueue_script('vendor-parallax');
				wp_enqueue_script('vendor-imagesloaded');
				?>
				<div class="<?php dh_container_class() ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="heading-wrap">
								<div class="page-title">
									<h1><?php echo esc_html($page_heading_title) ?></h1>
									<?php if(!empty($page_heading_sub_title)):?>
									<span class="subtitle"><?php echo esc_html($page_heading_sub_title) ?></span>
									<?php endif;?>
									<?php  if($page_heading_breadcrumb_flag):?>
									<div class="page-breadcrumb" itemprop="breadcrumb">
										<?php dh_the_breadcrumb()?>
									</div>
									<?php endif;?>
									<?php if($page_heading_button_flag):?>
									<a class="btn btn-white-outline heading-button-btn" href="<?php echo esc_url_raw($page_heading_button_url)?>" title="<?php echo esc_attr($page_heading_button_text)?>"><?php echo esc_html($page_heading_button_text)?></a>
									<?php endif;?>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if(!empty($page_heading_sub_title)):?>
			<div class="page-breadcrumb-container <?php dh_container_class() ?>">
				<div class="row">
					<div class="col-md-12">
						<div class="page-breadcrumb" itemprop="breadcrumb">
							<?php dh_the_breadcrumb()?>
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
	<?php elseif ($page_heading == 'default'):?>
	<div<?php echo (!empty($heading_menu_anchor) ? ' id ="'.esc_attr($heading_menu_anchor).'"': '')?> class="heading-container">
		<div class="<?php dh_container_class() ?> heading-standar">
			<?php if(dh_get_theme_option('breadcrumb',1)):?>
				<div class="page-breadcrumb" itemprop="breadcrumb">
					<?php dh_the_breadcrumb()?>
				</div>
			<?php endif;?>
		</div>
	</div>
	<?php endif;?>
	<?php do_action('dh_heading')?>