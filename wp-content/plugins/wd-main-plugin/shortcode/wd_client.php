<?php
function wd_client($atts) {

	extract( shortcode_atts( array(

		'images' => '',
		'layout_style' => 'carousel',
		'elements_to_show' => '4',
		'columns' => '3',
		'nav_arrow' => 'no',
		'image_size' => '150x150',
		'carousel_style' => 'style_1',
		'box_shadow'  => 'none',
		'grayscale'  => 'no',
		'marquee'  => 'no',
		'css_animation' => 'no'
	), $atts ) );

	$animation_classes =  "";
	$data_animated = "";
	if(($css_animation != 'no')){
		$animation_classes =  " animated ";
		$data_animated = "data-animated=$css_animation";
	}
	$image_size = str_replace("X", "x", $image_size);
  $size = explode("x", $image_size);
	$img_size = array($size[0], $size[1]);


	ob_start();

	$images = explode( ',', $images );
	?>
	<?php if ($layout_style == 'carousel') { ?>

		<div class="wd-clients-carousel wd-clients-carousel--small <?php if ($nav_arrow == 'yes'){ echo 'nav_arrow '; }; echo $carousel_style; if ($grayscale == 'yes'){echo ' grayscale';} ?>"
         <?php  if ($nav_arrow == 'yes'){  echo 'data-slick=\'{"arrows":true}\''; }else{ echo 'data-slick=\'{"arrows":false}\'';  }  ?>
          data-clientshow = "<?php echo $elements_to_show ?>" <?php if ($marquee == 'yes'){ echo 'data-marquee '; } ?> >
			<?php foreach ( $images as $attach_id ): ?>
				<?php
				if ( $attach_id > 0 ) {
					$post_thumbnail = wp_get_attachment_image_src($attach_id, $img_size);
					$image_src = compactor_image_resize($post_thumbnail[0], $size[0], $size[1]);
					if (!$image_src) {
						$image_src = $post_thumbnail[0];
					}
				} else {
					$post_thumbnail = array();
					$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
					$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
				}
				?>
				<div class="wd-clients-carousel-item <?php echo esc_attr($animation_classes)  ?>"  <?php echo esc_attr($data_animated); ?>>
					<img  class="<?php echo esc_attr( $box_shadow ); ?> " src="<?php echo esc_url($image_src) ?>" width="<?php echo esc_attr($post_thumbnail[1]) ?>" height="<?php echo esc_attr($post_thumbnail[2]) ?>" alt="">
				</div>
				<?php

			endforeach;?>

		</div>
	<?php } else { ?>
		<div class="wd-clients-grid clearfix">
		<ul class="small-up-3 large-up-<?php echo esc_attr($columns); ?> columns">

			<?php foreach ( $images as $attach_id ): ?>
				<?php
				if ( $attach_id > 0 ) {
					$post_thumbnail = wp_get_attachment_image_src($attach_id, $img_size);
					$image_src = compactor_image_resize($post_thumbnail[0], $size[0], $size[1], true);
					if (!$image_src) {
						$image_src = $post_thumbnail[0];
					}
				} else {
					$post_thumbnail = array();
					$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
					$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
				}
				?>
				<li class="column column-block <?php echo $animation_classes ?>" <?php echo esc_attr($data_animated); ?>>
					<div class="wd-clients-container">
						<img  class="" src="<?php echo esc_url($image_src) ?>" width="<?php echo esc_attr($post_thumbnail[1]) ?>" height="<?php echo esc_attr($post_thumbnail[2]) ?>" alt="">
					</div>
				</li>
				<?php

			endforeach;?>
		</ul>
			<div class="firs-shadow"></div>
			<div class="sec-shadow"></div>
		</div>
	<?php } ?>
	<?php return ob_get_clean();
}
add_shortcode( 'wd_client', 'wd_client' );
?>