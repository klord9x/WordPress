<?php

/**
 * get options value
 */

if (!function_exists('compactor_get_option')) {
    function compactor_get_option($compactor_option_key, $compactor_option_default_value = null) {
	    compactor_base_class::initialize_options();
	    $options_array = get_option( "compactor_options_array" );

	    // for demo purpose
	    if ( function_exists( "wd_custom_options" ) ) {
		    $options_array = wd_custom_options( $options_array );
	    }

	    $compactor_meta_value = "";
	    if ( array_key_exists( $compactor_option_key, $options_array ) ) {
		    if ( isset( $options_array[ $compactor_option_key ] ) && ! empty( $options_array[ $compactor_option_key ] ) ) {
			    $compactor_meta_value = esc_attr( $options_array[ $compactor_option_key ] );
		    }

		    if ( $compactor_meta_value == "" ) {
			    $compactor_meta_value = $compactor_option_default_value;
		    }
	    }
	    return $compactor_meta_value;
    }
}

/**
 *
 */
// get options value
if (!function_exists('compactor_save_option')) {
    function compactor_save_option($compactor_option_key, $compactor_option_value = null)
    {
        $options_array = get_option("compactor_options_array");
        $options_array[$compactor_option_key] = $compactor_option_value;
        update_option("compactor_options_array", $options_array);
    }
}

/**
 *
 */
if (!function_exists('compactor_get_categories')) {
    function compactor_get_categories($taxonomy = '')
    {
        $args = array(
            'type' => 'post',
            'hide_empty' => 0
        );

        $output = array();

        $args['taxonomy'] = $taxonomy;
        $categories = get_categories($args);

        if (!empty($categories) && is_array($categories)) {
            foreach ($categories as $category) {
                if (is_object($category)) {
                    $output[$category->name] = $category->slug;
                }
            }
        }

        return $output;
    }
}

/**
 * @param $string
 * @return string
 */
function compactor_removeslashes($string)
{
    $string = implode("", explode("\\", $string));

    return stripslashes(trim($string));
}

/**
 *
 */
function compactor_get_logo_and_title()
{

    if (compactor_get_option('show_the_logo') == 'on' && compactor_get_option('logo_link') != '') { ?>
        <?php $image = compactor_get_option('logo_link');
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="<?php echo bloginfo('name') ?>"
           class="active"><img src="<?php echo esc_url($image); ?>" alt="<?php echo bloginfo('name') ?>"/></a>
    <?php }

    if (compactor_get_option('show_website_title', 'on') == 'on') { ?>
        <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><h1><?php echo bloginfo('name') ?></h1>
        </a>
    <?php }

}


/**
 * Get mobile menu ID
 */

if (!function_exists('compactor_mobile_menu_id')) :
    function compactor_mobile_menu_id()
    {
        echo 'mobile-menu';
    }
endif;


/*-----------------add Body Classes------------------------------------------*/
function compactor_body_classes($classes) {
    if (compactor_get_option('boxed_layout') == 'on') {
        $classes[] = 'bg_body_color';
    }

    if (compactor_get_option('wd_page_transitions', 'off') != 'off') {
        $classes[] = 'wd_page_transitions';
    }

    if(is_single()) {
      global $post;
      if ( isset ( $post->ID ) && !get_the_post_thumbnail( $post->ID ) ) {
        $classes[] = 'no-thumbnail';
      }
    }
    return $classes;
}

add_filter('body_class', 'compactor_body_classes');

if (!function_exists('compactor_post_classes')) {
	function compactor_post_classes( $classes ) {
		if ( get_post_type() == "post" ) {
			$digixion_post_format = get_post_format();
			if(!is_single()){
		    $classes[] = 'wd-post';
      }
			switch ( $digixion_post_format ) {
				case 'audio';
					$classes[] = $digixion_post_format;
				case 'gallery';
					$classes[] = 'wd-post--' . $digixion_post_format;
				case 'link';
					$classes[] = 'wd-post--' . $digixion_post_format;
				case 'quote';
					$classes[] = 'wd-post--' . $digixion_post_format;
				case 'video';
					$classes[] = 'wd-post--' . $digixion_post_format;
				case '';
					$classes[] = $digixion_post_format;
			}
		}

	  return $classes;
	}
	add_filter( 'post_class', 'compactor_post_classes' );
}


