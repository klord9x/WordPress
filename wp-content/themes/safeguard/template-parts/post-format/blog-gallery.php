<?php
/**
 * The template includes blog post format gallery.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$safeguard_pix_options = get_option('safeguard_pix_general_settings');	
	// get the gallery images
	$size = (is_front_page()) && !is_home() ? 'full' : 'blog-post';
	$gallery = class_exists( 'RW_Meta_Box' ) ? rwmb_meta('post_gallery', 'type=image&size='.$size.'') : '';
 
	$argsThumb = array(
		'order'          => 'ASC',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		//'exclude' => get_post_thumbnail_id()
	);
	$attachments = get_posts($argsThumb);
	
	//$safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_pix_format;
	$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	
if ($gallery || $attachment){
?>

<div class="owl-carousel  enable-owl-carousel owl-theme" data-pagination="false" data-navigation="true" data-auto-play="4000" data-min450="1" data-min600="1" data-min768="1">


	<?php
        if($gallery){
            foreach ($gallery as $slide) {
                echo '
		<div>';
                echo '<img src="' . esc_url($slide['url']) . '" width="' . esc_attr($slide['width']) . '" height="' . esc_attr($slide['height']) . '" alt="' .esc_attr($slide['alt']).'" title="' .esc_attr($slide['title']). '" />';
                echo '
        </div>';
            }
        }elseif ($attachments) {
            foreach ($attachments as $attachment) {
                echo '
		<div>
			<img src="'.esc_url(wp_get_attachment_url($attachment->ID, 'full', false, false)).'" alt="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)).'" title="'.esc_attr(get_post_meta($attachment->ID, '_wp_attachment_image_title', true)).'" />
        </div>';
            }
        }
        
    ?>

</div>
<?php 
}
else{
?>
<div class="owl-carousel  enable-owl-carousel owl-theme" data-pagination="false" data-navigation="true" data-auto-play="4000" data-min450="1" data-min600="1" data-min768="1">
            	<a href="<?php esc_url(the_permalink())?>">
				<?php if ( has_post_thumbnail() ):?>
                <?php the_post_thumbnail(); ?>
                <?php else : ?>
	                <?php if(safeguard_pix_get_option('safeguard_pix_blog_show_img_placeholders', '0')){ ?>
			        <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/noimage.jpg"  />
			        <?php } ?>
                <?php endif; ?>
                </a> 
             </div>
<?php	
}
?>
