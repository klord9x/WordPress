<?php


/*---------------------- is blog ----------------------------*/
function compactor_is_blog()
{
  global $post;
  $posttype = get_post_type($post);
  return (((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_tag())) && ($posttype == 'post')) ? true : false;
}

/*----------------------------breadcrumb------------------------------*/

if (!function_exists("compactor_breadcrumb")) {
  function compactor_breadcrumb()
  {
    global $post;
    echo '<ul class="breadcrumbs">';
    if (!is_home()) {
      echo '<li><a href="';
      echo esc_url(home_url('/'));
      echo '">';
      echo esc_html__('Home','compactor');
      echo '</a></li>';
      if (is_category() || is_single()) {
        echo '<li>';
        the_category(' </li><li> ');
        if (is_single()) {
          echo '</li><li>';
          the_title();
          echo '</li>';
        }
      } elseif (is_page()) {
        if ($post->post_parent) {
          $anc = get_post_ancestors($post->ID);
          $title = get_the_title();
          foreach ($anc as $ancestor) {
            $output = '<li><a href="' . esc_url(get_permalink($ancestor)) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li> ';
          }
          echo esc_html($output);
          echo '<li><strong title="' . esc_attr($title) . '"> ' . esc_html($title) . '</strong><li>';
        } else {
          echo '<li><strong> ' . get_the_title() . '</strong></li>';
        }
      }
    } elseif (is_tag()) {
      single_tag_title();
    } elseif (is_day()) {
      echo "<li>" . esc_html__('Archive', 'compactor');
      echo "</li>";
    } elseif (is_month()) {
      echo "<li>" . esc_html__('Archive for', 'compactor');
      echo '</li>';
    } elseif (is_year()) {
      echo "<li>" . esc_html__('Archive for', 'compactor');
      echo '</li>';
    } elseif (is_author()) {
      echo "<li>" . esc_html__('Author Archive', 'compactor');
      echo '</li>';
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
      echo "<li>" . esc_html__('Blog Archives', 'compactor');
      echo '</li>';
    } elseif (is_search()) {
      echo "<li>" . esc_html__('Search Results', 'compactor');
      echo '</li>';
    }
    echo '</ul>';
  }
}

if (!function_exists('compactor_check_if_empty')) {
  function compactor_check_if_empty($propriete, $value)
  {
    $result = '';
    if ($value !== '' && !is_null($value)) {
      if ($propriete == 'background-image') {
        $result = $propriete . ': url(' . $value . ');';
      } else {
        $result = $propriete . ':' . $value . ';';
      }
    }
    return $result;
  }
}
if (!function_exists('wd_get_heading_separator')) {
  function wd_get_heading_separator($headings_separator, $custom_separatore_style, $hr_class)
  {
    if ($headings_separator == "border") {
      echo "<hr class='$hr_class' style='$custom_separatore_style'/>";
    }
  }
}


function compactor_get_post_category()
{
  $cat_name = get_the_terms(get_the_ID(), 'category');
  $ajzaa_class_name = '';
  if (isset($cat_name) && $cat_name != null) {
    foreach ($cat_name as $cat) {
      $ajzaa_class_name .= ' ' . $cat->slug;
    }
  }
  return $ajzaa_class_name;
}


function compactor_get_embedded_media($type = array())
{
  $content = do_shortcode(apply_filters('the_content', get_the_content()));
  $embed = get_media_embedded_in_content($content, $type);

  if (in_array('audio', $type)) {
    $output = str_replace('?visual=true', '?visual=false', $type[0]);
  } elseif (!empty($type)) {
    $output = $type[0];
  } else {
    $output = "";
  }

  return $output;
}

function compactor_get_attachment($num = 1)
{

  $output = '';
  if (has_post_thumbnail() && $num == 1):
    $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
  else:
    $attachments = get_posts(array(
      'post_type' => 'attachment',
      'posts_per_page' => $num,
      'post_parent' => get_the_ID()
    ));
    if ($attachments && $num == 1):
      foreach ($attachments as $attachment):
        $output = wp_get_attachment_url($attachment->ID);
      endforeach;
    elseif ($attachments && $num > 1):
      $output = $attachments;
    endif;

    wp_reset_postdata();

  endif;

  return $output;
}

 function compactor_related_posts ($compactor_postID) {
		$tags = wp_get_post_terms( $compactor_postID, 'category' );;
		if ($tags) {
            echo '<h4 class="comments_title">'.esc_html__("Related Posts","compactor").'</h4>';
            $first_tag = $tags[0]->term_id;
            $args=array(
                'category__in' => array($first_tag),
                'post__not_in' => array($compactor_postID),
                'posts_per_page'=>2,
                ' 
                '=>1
            );
            $my_query = new WP_Query($args);
            if( $my_query->have_posts() ) {
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <article class="large-6 columns">
                        <?php if(has_post_thumbnail()) { ?>
                            <div class="thumbnail-related-post">
                                <?php the_post_thumbnail('compactor_blog-related'); ?>
                            </div>
                        <?php } ?>
                        <div class="title-related-post">
                          <ul class="wd-post__meta clearfix">
                            <li><?php echo get_the_date(); ?></li>
                            <li class="wd-post__author"><?php echo esc_html__('By: ','compactor');  the_author() ?></li>
                            <li><?php echo esc_html__('in: ','compactor');   the_category(', '); ?></li>
                          </ul>
                          <h4>
                            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
                          </h4>
                        </div>
                    </article>
                    <?php
                endwhile;
            }
          wp_reset_postdata();
        }
 }

if (!function_exists('compactor_reset_panel_options')){
	add_action("wp_ajax_compactor_reset_panel_options", "compactor_reset_panel_options");
	add_action("wp_ajax_nopriv_compactor_reset_panel_options", "compactor_reset_panel_options");

	function compactor_reset_panel_options() {
		delete_option('wd_options_array');
		compactor_base_class::initialize_options();
	}
}
//------------ script if ahortcode existe ------
function compactor_for_shortcode($posts) {
  if ( empty($posts) )
    return $posts;

  // false because we have to search through the posts first
  $found = false;

  // search through each post
  foreach ($posts as $post) {
    // check the post content for the short code
    if ( stripos($post->post_content, '[compactor_maps') )
      // we have found a post with the short code
      $found = true;
    // stop the search
    break;
  }

  if ($found){
    $compactor_protocol = is_ssl() ? 'https' : 'http';
    // $url contains the path to your plugin folder
    //$url = get_template_directory_uri();
    $compactor_map_key = compactor_get_option('google_key_map');

      wp_enqueue_script('googleapis', $compactor_protocol ."://maps.googleapis.com/maps/api/js?key=" . $compactor_map_key . "", array('jquery'), '4.4.2', false);


  }
  return $posts;
}
// perform the check when the_posts() function is called
add_action('the_posts', 'compactor_for_shortcode');