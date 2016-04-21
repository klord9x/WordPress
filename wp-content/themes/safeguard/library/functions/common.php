<?php
/**
 * The template includes some helper & common functions.
 *
 * @package Safeguard
 * @since 1.0
 */
 
/*
 * "Breadcrumbs"
*/
function safeguard_pix_breadcrumbs() {
	
	/* === Options === */
	$text['home'] = wp_kses_post(__('<i class="fa fa-home fa-lg"></i>', 'safeguard'));
	$text['category'] = esc_html__('Archive "%s"', 'safeguard');
	$text['search'] = esc_html__('Search results for "%s"', 'safeguard');
	$text['tag'] = esc_html__('Posts with tag "%s"', 'safeguard');
	$text['author'] = esc_html__('%s posts', 'safeguard');
	$text['404'] = esc_html__('Error 404', 'safeguard');
	$text['page'] = esc_html__('Page %s', 'safeguard');
	$text['cpage'] = esc_html__('Comments page %s', 'safeguard');
	
	$delimiter = '&nbsp;&nbsp;|&nbsp;&nbsp;';
	$delim_before = '';//'<span class="divider">';
	$delim_after = '';//'</span>'; 
	$show_home_link = 1;
	$show_on_home = 0;
	$show_title = 1;
	$show_current = 1;
	$before = '';
	$after = '';
	/* === End options === */
	
	global $post;
	$home_link = home_url('/');
	$link_before = '';
	$link_after = '';
	$link_attr = '';
	$link_in_before = '';
	$link_in_after = '';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = isset($post) ? $post->post_parent : '';
	$delimiter = '&nbsp;&nbsp;|&nbsp;&nbsp;';// . $delim_before . $delimiter . $delim_after . ' ';
	
	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<div class="breadcrumbsBox">' . wp_kses_post($text['home']) . '</div>';

	} else {

		echo '<div class="breadcrumbsBox path">';
		if ($show_home_link == 1) echo sprintf($link, $home_link, $text['home']);

		if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $delimiter);
                $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_title == 0)
                    $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                if ($show_home_link == 1) echo wp_kses_post($delimiter);
                    echo wp_kses_post($cats);
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                echo wp_kses_post($delimiter . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after);
            } else {
                if ($show_current == 1) echo wp_kses_post($delimiter . $before . sprintf($text['category'], single_cat_title('', false)) . $after);
            }

        } elseif ( is_search() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo wp_kses_post($before . sprintf($text['search'], get_search_query()) . $after);

        } elseif ( is_day() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
            echo wp_kses_post($before . get_the_time('d') . $after);

        } elseif ( is_month() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo wp_kses_post($before . get_the_time('F') . $after);

        } elseif ( is_year() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo wp_kses_post($before . get_the_time('Y') . $after);

        } elseif ( is_single() && !is_attachment() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            if ( get_post_type() != 'post' ) {
                $cats = wp_get_object_terms($post->ID, 'services_category');
                if ($cats){
                    $cat_href = '';
                    foreach( $cats as $cat ){
                        $cat_href .= '<a href="'.get_term_link( $cat ).'"' . $link_attr . '>' . $link_in_before . $cat->name . $link_in_after . '</a>' . ", ";
                    }
                }
                //printf($link, '', $post_type->labels->singular_name);
                //$post_type = get_post_type_object(get_post_type());
                //print_r($post_type);
                //echo wp_kses_post($delimiter) . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $delimiter;
                echo wp_kses_post($cat_href != '' ? $link_before . substr($cat_href, 0, -2) . $link_after : '');
                if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);
            } else {
                $cat = get_the_category();
                if(!empty($cat)) {
					$cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($show_current == 0 || get_query_var('cpage')) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo wp_kses_post($cats);
				} else {
					echo esc_html__('No Categories', 'safeguard');
				}
                if ( get_query_var('cpage') ) {
                    echo wp_kses_post($delimiter . sprintf($link, get_permalink(), get_the_title()) . $delimiter . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after);
                } else {
                    if ($show_current == 1) echo wp_kses_post($before . get_the_title() . $after);
                }
            }

        // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            if ( get_query_var('paged') ) {
                echo wp_kses_post($delimiter . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $delimiter . $before . sprintf($text['page'], get_query_var('paged')) . $after);
            } else {
                if ($show_current == 1) echo wp_kses_post($delimiter . $before . $term->name . $after);
            }

        } elseif ( is_attachment() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo wp_kses_post($cats);
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);

        } elseif ( is_page() && !$parent_id ) {

            if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);

        } elseif ( is_page() && $parent_id ) {

            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo wp_kses_post($breadcrumbs[$i]);
                    if ($i != count($breadcrumbs)-1) echo wp_kses_post($delimiter);
                }
            }
            if ($show_current == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);

        } elseif ( is_tag() ) {
            if ($show_current == 1) echo wp_kses_post($delimiter . $before . sprintf($text['tag'], single_tag_title('', false)) . $after);

        } elseif ( is_author() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            global $author;
            $author = get_userdata($author);
            echo wp_kses_post($before . sprintf($text['author'], $author->display_name) . $after);

        } elseif ( is_404() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo wp_kses_post($before . $text['404'] . $after);

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link == 1) echo wp_kses_post($delimiter);
            echo get_post_format_string( get_post_format() );
        }

		echo '</div><!-- .breadcrumbs -->';

 	}
	
} // end pixgarden_breadcrumbs() 


// get homepage id
function safeguard_pix_get_home_ID() {

	$args = array(
		'post_type'  => 'page',
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'template-home.php'
	);

	$home_pages = get_posts($args);

	if ( !empty($home_pages) ) {
		$home_page = reset($home_pages);
		return $home_page->ID;
	} else {
		return false;
	}
	
}

// get slug by name
function safeguard_pix_get_slug( $id ) {
	if ($id==null) $id=$post->ID;
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}

// get front page url
function safeguard_pix_get_home_front_page_url() {
	$front_page_ID = get_option('page_on_front');
	$front_page_template = get_post_meta( $front_page_ID, '_wp_page_template', true );
	if ( $front_page_template === 'template-home.php' ) {	
		return get_permalink($front_page_ID); 
	} else {
		return false;
	}

}

function safeguard_pix_all_post_categories($taxonomy) {
	
	$categories = array();
	$args = array(
		'orderby'                  => 'id',
		'order'                    => 'ASC',
		'hide_empty'               => false,
		'taxonomy'                 => $taxonomy
	);
	
	$categories = &get_categories($args);
	
	return $categories;
}

// disquis comment
function safeguard_pix_disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.esc_js($disqus_shortname).'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        "use strict";
        var disqus_shortname = "'.esc_js($disqus_shortname).'";
        var disqus_title = "'.esc_js($post->post_title).'";
        var disqus_url = "'.esc_js(get_permalink($post->ID)).'";
        var disqus_identifier = "'.esc_js($disqus_shortname.'-'.$post->ID).'";
    </script>';
}

// custom excerpt
function safeguard_pix_excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
    echo $excerpt;
}

