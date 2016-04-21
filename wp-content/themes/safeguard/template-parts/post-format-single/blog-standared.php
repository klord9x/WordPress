<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$safeguard_pix_format  = get_post_format();
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
$custom =  get_post_custom($post->ID);
$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';

$safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery", "video")) ? "standared" : $safeguard_pix_format;

$get_avatar = get_avatar(get_the_author_meta('ID'), 85);
preg_match("/src=['\"](.*?)['\"]/i", $get_avatar, $matches);
$src = !empty($matches[1]) ? $matches[1] : '';
	
?>

	<?php if ( has_post_thumbnail() ):?>
    <div class="hover__figure"><?php the_post_thumbnail(); ?></div>
    <?php else : ?>
        <?php if(safeguard_pix_get_option('safeguard_pix_blog_show_img_placeholders', '0')){ ?>
        <div class="hover__figure"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/noimage.jpg"  /></div>
        <?php } ?>
    <?php endif; ?>
