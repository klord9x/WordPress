<?php
	// get meta options/values
	$safeguard_pix_options = get_option('safeguard_pix_general_settings');
	$safeguard_pix_content = class_exists( 'RW_Meta_Box' ) ? rwmb_meta('post_quote_content') : '';
	$safeguard_pix_source = class_exists( 'RW_Meta_Box' ) ? rwmb_meta('post_quote_source') : '';
	//$safeguard_pix_format  = get_post_format();
	//$safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_pix_format;
$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
?>

<div class="post entry-review post-quotes">
    <blockquote>
        <p><?php echo wp_kses_post($safeguard_pix_content); ?></p>
    </blockquote>
    
    <span class="entry-review__name text-right"><?php echo wp_kses_post($safeguard_pix_source); ?></span>

</div>


