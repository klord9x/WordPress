<?php /* Header Type 3 */ ?>

		<header id="header">
			<?php if( safeguard_pix_get_option('safeguard_pix_header_bar', '1') ) : ?>
				<div class="header-top">
					<div class="wrapper">
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
							<div class="header-info">
                            	<?php if(safeguard_pix_get_option('safeguard_pix_header_info','')) : ?>
                                <div class="description-header">
                                <?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_info',''))?>
                                </div>
                            	<?php endif; ?>
								<?php if(safeguard_pix_get_option('safeguard_pix_header_phone','')) : ?>
                                <div class="color-primary">
									<?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_phone',''))?> 
									</div>
								<?php endif; ?>
								<?php if(safeguard_pix_get_option('safeguard_pix_header_email','')) : ?>
                                <div class="color-primary">
                                <?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_email',''))?>
                                </div>
                            	<?php endif; ?>
							</div>
						</div>
                     	<?php if( safeguard_pix_get_option('safeguard_pix_header_btntxt','') != '') : ?>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
							<a class="btn extra-color text-uppercase pull-right" href="<?php echo esc_url(safeguard_pix_get_option('safeguard_pix_header_btnlink',''))?>"><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_btntxt',''))?></a>
						</div>
                     	<?php endif; ?>
					</div>
				</div>
          <?php endif; ?>
				<div class="header-nav">
					<div class="wrapper">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<a class="logo" href="<?php echo esc_url(home_url('/')) ?>"></a>
						</div>
                        
						<?php if( class_exists( 'WooCommerce' ) && safeguard_pix_get_option('safeguard_pix_header_minicart', '1') ) : ?>
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 cart-block-r">
							<div class="cart-block pull-right">
								<i class="flaticon-shopping-bag1"></i>
								<div class="cart-box">
									<div class="cart-price pull-right">
                                    <a href="<?php echo WC()->cart->get_cart_url(); ?>" > 
                                        <span class="color-primary text-uppercase"><?php esc_html_e('Cart:', 'safeguard') ?></span>
                                        <span class="price"><?php echo WC()->cart->get_cart_total(); ?></span>
                                        <div class="items-cart"><?php echo WC()->cart->cart_contents_count; ?> <?php esc_html_e('ITEMS', 'safeguard') ?></div>
                                    </a>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
                        
						<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 nav-box">
                            <span class="ef icon_menu mobile-menu-toggle" id="toggle-nav"></span>
							<nav class="nav-container">
                            <?php echo safeguard_pix_site_menu('nav navbar-nav navbar-with-inside clearfix navbar-right with-border'); ?>
                             	
                            <?php if ( safeguard_pix_get_option('safeguard_pix_header_search','1') ) : ?>
                                <div class="search pull-right">
                                	<div class="header-search ">
                            
					                    <div class="navbar-search">
											<form class="search-form form-inline" action="<?php echo esc_url(site_url()) ?>" method="get">
												<div class="input-group">
													<input type="search" name="s" id="search" placeholder="<?php esc_html_e('Search...', 'safeguard') ?>" class="form-control" autocomplete="off"  value="<?php esc_attr(the_search_query()); ?>">
													<span class="input-group-btn">
														<button type="reset" class="btn search-close" id="search-close"><i class="fa fa-times"></i></button>
													</span> 
												</div>
											</form>
					    				</div>
        
										<a id="search-open" href="#fakelink"><i class="fa fa-search"></i></a>
							
									</div>
                            	</div>
                            <?php endif; ?>
                            </nav>
						</div>

					</div>
				</div>
		</header>