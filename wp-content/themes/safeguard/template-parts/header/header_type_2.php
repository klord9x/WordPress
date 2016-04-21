<?php /* Header Type 2 */ ?>

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
							
							<ul class="cont-share pull-right">
								<?php if(safeguard_pix_get_option('safeguard_pix_facebook', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_facebook']); ?>" target="_blank"><i class="social_icons fa fa-facebook-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_vk', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_vk']); ?>" target="_blank"><i class="social_icons fa fa-vk"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_youtube', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_youtube']); ?>" target="_blank"><i class="social_icons fa fa-youtube-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_vimeo', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_vimeo']); ?>" target="_blank"><i class="social_icons fa fa-vimeo-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_twitter', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_twitter']); ?>" target="_blank"><i class="social_icons fa fa-twitter-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_google', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_google']); ?>" target="_blank"><i class="social_icons fa fa-google-plus-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_tumblr', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_tumblr']); ?>" target="_blank"><i class="social_icons fa fa-tumblr-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_instagram', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_instagram']); ?>" target="_blank"><i class="social_icons fa fa-instagram"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_pinterest', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_pinterest']); ?>" target="_blank"><i class="social_icons fa fa-pinterest-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_linkedin', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_linkedin']); ?>" target="_blank"><i class="social_icons fa fa-linkedin-square"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_custom1_link', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_custom1_link']); ?>" target="_blank"><i class="social_icons fa <?php echo esc_attr($safeguard_pix_options['safeguard_pix_custom1_icon']); ?>"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_custom2_link', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_custom2_link']); ?>" target="_blank"><i class="social_icons fa <?php echo esc_attr($safeguard_pix_options['safeguard_pix_custom2_icon']); ?>"></i></a></li>
					            <?php } ?>
					            <?php if(safeguard_pix_get_option('safeguard_pix_custom3_link', '')){ ?>
					            <li><a href="<?php echo esc_url($safeguard_pix_options['safeguard_pix_custom3_link']); ?>" target="_blank"><i class="social_icons fa <?php echo esc_attr($safeguard_pix_options['safeguard_pix_custom3_icon']); ?>"></i></a></li>
					            <?php } ?>
							</ul>
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
                        
						<?php if( safeguard_pix_get_option('safeguard_pix_header_btntxt','') != '') : ?>
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 cart-block-r">
							<div class="cart-block pull-right">
								<a href="<?php echo esc_url(safeguard_pix_get_option('safeguard_pix_header_btnlink',''))?>" class="h-button text-uppercase pull-right">
									<span class="cont-btn">
										<span class="ef icon_documents"></span>
										<span class="text-btn"><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_btntxt',''))?></span>
									</span>
								</a>
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