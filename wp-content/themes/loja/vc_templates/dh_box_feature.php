<?php
extract( shortcode_atts( array(
	'style'				=> '1',
	'bg'				=> '',
	'href'				=> '',
	'target'			=> '_self',
	'sub_title'			=>'',
	'title'				=>'',
	'visibility'        => '',
	'el_class'          => '',
), $atts ) );
$el_class  = !empty($el_class) ? ' '.esc_attr( $el_class ) : '';
$el_class .= dh_visibility_class($visibility);
$image_src = wp_get_attachment_url($bg);
$href = !empty($href) ? $href : '#';
if(empty($image_src)){
	$image_src = get_template_directory_uri().'/assets/images/noo-thumb_700x350.png';
}
ob_start();
?>
<div class="box-ft box-ft-<?php echo esc_attr($style)?> <?php echo ($style == '2') ? 'nice-border-full':''?> <?php echo esc_attr($el_class)?>">
	<?php if($style == '2'){?>
	<a href="<?php echo esc_attr($href)?>">
	<?php }?>
	<img src="<?php echo esc_attr($image_src)?>" alt="">
	<?php if($style == '2'){?>
	</a>
	<?php } ?>
	<?php if($style == '3'){?>
	<div class="box-ft-img-overlay" style="background-image: url(<?php echo esc_attr($image_src)?>)"></div>
	<?php }?>
	<a href="<?php echo esc_attr($href)?>">
		<span class="bof-tf-title-wrap">
			<span class="bof-tf-title-wrap-2">
				<?php if($style == '2'){?>
				<span class="nice-border-top-left"></span>
				<span class="nice-border-top-right"></span>
				<span class="nice-border-bottom-left"></span>
				<span class="nice-border-bottom-right"></span>
				<?php }?>
				<span class="bof-tf-sub-title"><?php echo esc_html($sub_title)?></span>
				<span class="bof-tf-title"><?php echo esc_html($title)?></span>
				<?php if($style == '3'){?>
				<span class="bof-tf-view-more"><?php esc_html_e('View More','loja')?></span>
				<?php }?>
			</span>
		</span>
	</a>
</div>
<?php 
echo ob_get_clean();