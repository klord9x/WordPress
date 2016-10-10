
	<?php if(dh_get_theme_option('footer-area',1)):?>
	<div class="footer-widget">
		<div class="footer-widget-wrap">
			<div class="<?php dh_container_class() ?>">
				<div class="row">
					<?php 
					$area_columns = dh_get_theme_option('footer-area-columns',4);
					if($area_columns == '5'):
						?>
						<?php if(is_active_sidebar('sidebar-footer-1')):?>
						<div class="footer-widget-col col-md-2 col-sm-6">
							<?php dynamic_sidebar('sidebar-footer-1')?>
						</div>
						<?php endif;?>
						<?php if(is_active_sidebar('sidebar-footer-2')):?>
						<div class="footer-widget-col col-md-2 col-sm-6">
							<?php dynamic_sidebar('sidebar-footer-2')?>
						</div>
						<?php endif;?>
						<?php if(is_active_sidebar('sidebar-footer-3')):?>
						<div class="footer-widget-col col-md-2 col-sm-6">
							<?php dynamic_sidebar('sidebar-footer-3')?>
						</div>
						<?php endif;?>
						<?php if(is_active_sidebar('sidebar-footer-4')):?>
						<div class="footer-widget-col col-md-2 col-sm-6">
							<?php dynamic_sidebar('sidebar-footer-4')?>
						</div>
						<?php endif;?>
						<?php if(is_active_sidebar('sidebar-footer-5')):?>
						<div class="footer-widget-col col-md-4 col-sm-6">
							<?php dynamic_sidebar('sidebar-footer-5')?>
						</div>
						<?php endif;?>
						<?php
					else:
					$area_class = '';
						if($area_columns == '2'){
							$area_class = 'col-md-6 col-sm-6';
						}elseif ($area_columns == '3'){
							$area_class = 'col-md-4 col-sm-6';
						}elseif ($area_columns == '4'){
							$area_class = 'col-md-3 col-sm-6';
						}
						?>
						<?php for ( $i = 1; $i <= $area_columns ; $i ++ ) :?>
							<?php if(is_active_sidebar('sidebar-footer-'.$i)):?>
							<div class="footer-widget-col <?php echo esc_attr($area_class) ?>">
								<?php dynamic_sidebar('sidebar-footer-'.$i)?>
							</div>
							<?php endif;?>
						<?php endfor;?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<footer id="footer" class="footer" role="contentinfo">
		<?php if(dh_get_theme_option('show_footer_contact',get_the_ID(),1)):?>
		<div class="footer-contact">
			<div class="<?php dh_container_class() ?>">
				<div class="row">
					<div class="col-sm-4">
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fa fa-map-marker"></i>
							</div>
							<div class="footer-contact-text">
								<?php echo (dh_get_theme_option('footer_contact_address'))?>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="footer-contact-text">
								<?php echo (dh_get_theme_option('footer_contact_phone'))?>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fa fa-envelope-o"></i>
							</div>
							<div class="footer-contact-text">
								<a href="mailto:<?php  echo esc_attr(dh_get_theme_option('footer_contact_email'))?>"><?php  echo (dh_get_theme_option('footer_contact_email')) ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
		<?php if(dh_get_theme_option('show_footer_info',get_the_ID(),1)):?>
		<div class="footer-info">
			<a href="#" class="go-to-top"><i class="fa fa-angle-double-up"></i></a>
			<div class="<?php dh_container_class() ?>">
				<div class="row">
					<div class="col-md-12 text-center">
						<?php if($footer_info = dh_get_theme_option('footer-info')):?>
							<div class="copyright text-center"><?php echo ($footer_info) ?></div>
		            	<?php endif;?>
	            	</div>
	            </div>
			</div>
		</div>
		<?php endif;?>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>