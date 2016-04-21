<?php /* Header Type 1 */ ?>

		<header id="this-is-top">
	            <div class="container-fluid">
	                <div class="topmenu row">
		                <nav class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-6 col-md-6 col-lg-6">
		                <?php
			            if ( has_nav_menu( 'top_nav' ) ) {
							wp_nav_menu(array(
								'theme_location'  => 'top_nav',
			        			'container'       => false,
			        			'menu_id'		  => 'top-menu',
			        			'menu_class'      => '',
			        			'depth'           => 1
							));
						}
						?>
		                </nav>
	                    <nav class="text-right col-sm-3 col-md-3 col-lg-3">
	                        <ul class="social-links">
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
	                    </nav>
	                </div>
	                <div class="row header">
	                    <div class="col-sm-3 col-md-3 col-lg-3">
        	<a title="<?php echo esc_attr(safeguard_pix_get_option('safeguard_pix_logotext',''))?>" href="<?php echo esc_url(home_url('/')) ?>" id="logo"  class="logo">
          <?php if(!empty($safeguard_pix_options['safeguard_pix_logo'])):?>
          <img src="<?php echo esc_url($safeguard_pix_options['safeguard_pix_logo']) ?>" alt="<?php echo esc_attr(safeguard_pix_get_option('safeguard_pix_logotext',''))?>"  />
          <?php elseif ( get_header_image() ):?>
          <img  src="<?php header_image(); ?>" alt="<?php echo esc_attr(safeguard_pix_get_option('safeguard_pix_logotext',''))?>"  class="logo__img"  />
          <?php else:?>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="<?php echo esc_attr(safeguard_pix_get_option('safeguard_pix_logotext',''))?>"  class="logo__img"  />
          <div class="logo-desc"> <?php echo safeguard_pix_get_option('safeguard_pix_logotext','') ?></div>
          <?php endif?>
          </a> 
	                    </div>
	                    <div class="  col-sm-9 col-md-9 col-lg-9">
	                        <div class="text-right header-padding">
		                    <?php if (safeguard_pix_get_option('safeguard_pix_section_show','1')):?>
								<div class="h-block">
									<span><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_title_left')); ?></span>
									<?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_left')); ?>
								</div>
								<div class="h-block">
									<span><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_title_middle')); ?></span>
									<?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_middle')); ?>
								</div>
								<div class="h-block">
									<span><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_title_right')); ?></span>
									<?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_section_right')); ?>
								</div>
							<?php endif; ?>
	                            <?php if( safeguard_pix_get_option('safeguard_pix_header_btntxt','') != '') : ?>
									<a class="btn btn-success" href="<?php echo esc_url(safeguard_pix_get_option('safeguard_pix_header_btnlink',''))?>"><?php echo wp_kses_post(safeguard_pix_get_option('safeguard_pix_header_btntxt', ''))?></a>
		                     	<?php endif; ?>
	                        </div>
	                    </div>
	                </div>
	        </div>
	        </header>
            
            
            
	                <a href="#" id="menu-open"><i class="fa fa-bars"></i></a> 
	                <nav class="main-menu navbar-main-slide">
                    
                    <div class="container-fluid">
                    
		                <?php echo safeguard_pix_site_menu('nav navbar-nav navbar-main'); ?>

		                						
						<?php if ( safeguard_pix_get_option('safeguard_pix_header_search','1') ) : ?>
                                <div class="search pull-right">
                                	<div class="header-search ">
										
										<a href="#" class="btn_header_search"><i class="fa fa-search"></i></a>
										
										<div class="search-form-modal transition">
											<form class="search-form navbar-form header_search_form" action="<?php echo esc_url(site_url()) ?>" method="get">
												<i class="fa fa-times search-form_close"></i>
												<div class="form-group">
													<input type="search" name="s" id="search" placeholder="<?php esc_html_e('Search', 'safeguard') ?>" class="form-control" value="<?php esc_attr(the_search_query()); ?>">
												</div>
												<button class="btn btn_search customBgColor" type="submit"><?php esc_html_e('Search', 'safeguard') ?></button>
											</form>
										</div>
							
									</div>
                            	</div>
                            	
                        <?php endif; ?>
                        
                        </div>
						
	                </nav>
	                <a href="#" id="menu-close"><i class="fa fa-times"></i></a>
	           