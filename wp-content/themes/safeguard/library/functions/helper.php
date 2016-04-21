<?php

/************* COMMENTS HOOK *************/

function safeguard_pix_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	
    <li class="clearfix" id="li-comment-<?php comment_ID() ?>">
    
        <article class="comment img">
        <?php 
		  	$get_avatar = get_avatar($comment);
			preg_match("/src=['\"](.*?)['\"]/i", $get_avatar, $matches);
			$src = !empty($matches[1]) ? $matches[1] : '';
		?>
            
            
            <div class="avatar-placeholder"> 
			
            	<img  alt="<?php echo get_comment_author()?>" src="<?php echo !empty($src) ? esc_url($src) : esc_url(get_template_directory_uri() . '/images/nouser.jpg'); ?>">
			            
            </div>
            
         
           <div class="content-comment rtd"> 
            <?php if ($comment->comment_approved == '0') : ?>
            <p><em><?php esc_html_e('Your comment is awaiting moderation.', 'safeguard') ?></em></p>
            <?php endif; ?>
      
                <p>
                 <?php /*?>  <cite class="comment-author"><?php echo get_comment_author()?></cite><?php */?>
                   
           <?php /*?>        <span aria-hidden="true" class="icon-clock"></span>	<?php */?>
                    
                  <time class="comment-datetime"><?php printf(esc_html__('%1$s at %2$s', 'safeguard'), get_comment_date(),get_comment_time()) ?></time>
                    <?php edit_comment_link(esc_html__('(Edit)', 'safeguard'),'  ','') ?>
                </p>
                <p class="com_text"><?php comment_text() ?></p>
                <div class="comment-reply ">
                
                <div class="btn btn_small">
                
                
                   <i class="icon icon-bubbles color_second"></i>
                   
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'style'=>'<ul class="com_child"', 'max_depth' => $args['max_depth']))) ?>
                   
                </div>  </div>
        
            
       </div>
    
    
     </article>
     
     
     </li>
        
        
<?php }

/*****************************************/


/*************** SIDEBAR *****************/

if ( function_exists('register_sidebar') ){

	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'global-sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s block_content">',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		'after_widget' => '</div>',
	));
	
	register_sidebar(array(
		'name' => 'Custom Sidebar',
		'id'	=> 'custom-sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s block_content">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
	));
	
}

add_filter('widget_text', 'do_shortcode');
add_filter('the_excerpt', 'do_shortcode');

/*******************************************/


/********* STRING MANIPULATIONS ************/

function safeguard_pix_trim($text, $length, $end = '[...]') {
	$text = preg_replace('`\[[^\]]*\]`', '', $text);
	$text = strip_tags($text);
	$text = substr($text, 0, $length);
	$text = substr($text, 0, last_pos($text, " "));
	$text = $text . $end;
	return $text;
}

function safeguard_pix_last_pos($string, $needle){
   $len=strlen($string);
   for ($i=$len-1; $i>-1;$i--){
       if (substr($string, $i, 1)==$needle) return ($i);
   }
   return FALSE;
}

function safeguard_pix_limit_words($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 	if($string == "")
		return '';
	else
		return implode(' ', array_slice($words, 0, $word_limit)).'...';
}

function safeguard_pix_custom_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 10; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'safeguard_pix_custom_tag_cloud_widget' );

/*******************************************/

/********** GET PAGES BY PARAMS ************/

/*-- Get root parent of a page --*/
function safeguard_pix_get_root_page($page_id) 
{
	global $wpdb;
	
	$parent = $wpdb->get_var($wpdb->prepare("SELECT post_parent FROM $wpdb->posts WHERE post_type='page' AND ID = '%d'", $page_id));
	
	if ($parent == 0) 
		return $page_id;
	else 
		return safeguard_pix_get_root_page($parent);
}


/*-- Get page name by ID --*/
function safeguard_pix_get_page_name_by_ID($page_id)
{
	global $wpdb;
	$page_name = $wpdb->get_var($wpdb->prepare("SELECT post_title FROM $wpdb->posts WHERE ID = '%d'", $page_id));
	return $page_name;
}


/*-- Get page ID by Page Template --*/
function safeguard_pix_get_page_ID_by_page_template($template_name)
{
	global $wpdb;
	$page_ID = $wpdb->get_var($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '%s' AND meta_key = '_wp_page_template'", $template_name));
	return $page_ID;
}

/*-- Get page content (Used for pages with custom post types) --*/
if(!function_exists('safeguard_pix_getPageContent'))
{
	function safeguard_pix_getPageContent($pageId)
	{
		if(!is_numeric($pageId))
		{
			return;
		}
		global $wpdb;
		$sql_query = $wpdb->prepare("SELECT DISTINCT * FROM $wpdb->posts WHERE $wpdb->posts ID= %d", $pageId);
		$posts = $wpdb->get_results($sql_query);
		if(!empty($posts))
		{
			foreach($posts as $post)
			{
				return nl2br($post->post_content);
			}
		}
	}
}


/* -- Get page ID by Custom Field Value -- */
function safeguard_pix_get_page_ID_by_custom_field_value($custom_field, $value)
{
	global $wpdb;
	$page_ID = $wpdb->get_var($wpdb->prepare("
	    SELECT wposts.ID
    	FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	    WHERE wposts.ID = wpostmeta.post_id 
    	AND wpostmeta.meta_key = '%s' 
	    AND (wpostmeta.meta_value like '%s,%' OR wpostmeta.meta_value like '%,%s,%' OR wpostmeta.meta_value like '%,%s' OR wpostmeta.meta_value = '%s')		
    	AND wposts.post_status = 'publish' 
	    AND wposts.post_type = 'page'
		LIMIT 0, 1", $custom_field, $value, $value, $value, $value ));

	return $page_ID;
}
/*******************************************/

add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) $content_width = 960;
add_filter('the_excerpt', 'do_shortcode');

/******* POSTS RELATED BY TAXONOMY *********/

function safeguard_pix_get_taxonomy_related_posts($post_id, $taxonomy, $limit, $args=array()) {
  $query = new WP_Query();
  $terms = wp_get_object_terms($post_id, $taxonomy);
  if (count($terms)) {
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);
    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, 
      'post__in' => $post_ids,
	  'exclude' => $post_id,
      'taxonomy' => $taxonomy,
      'term' => $terms[0]->slug,
	  'posts_per_page' => $limit
    ));
    $query = new WP_Query($args);
  }
  return $query;
}

/********************************************/

/*************  ENABLE SESSIONS *************

function safeguard_pix_cp_admin_init() {
	if (!session_id())
	session_start();
}

add_action('init', 'safeguard_pix_cp_admin_init');

/********************************************/


/**************  GOOGLE FONTS ***************/

function safeguard_pix_font_name($string){
		
	$check = strpos($string, ':');
	if($check == false){
		return $string;
	} else { 
		preg_match("/([\w].*):/i", $string, $matches);
		return $matches[1];
	} 

} 



/************** LIST TAXONOMY ***************/

function safeguard_pix_list_taxonomy($taxonomy, $id='')
{
	$args = array ('hide_empty' => false);
	$tax_terms = get_terms($taxonomy, $args); 
	$active = '';
	$output = '<ul id="'.esc_attr($id).'">';

	foreach ($tax_terms as $tax_term) {
		if ($taxonomy  == $tax_term)
		{
			$active  = ' active';
		}
		$output.='<li><a href="'.esc_url(get_term_link($tax_term, $taxonomy)) . '" class="'.esc_attr($active).'">'.wp_kses_post($tax_term->name).'</a></li>';
	}
	$output.='</ul>';
	
	return $output;
}

/********************************************/


/*************** MEGA MENU ******************/
function safeguard_pix_nav_menu_args( $args ) {
	$args['walker'] = new SafeguardPix_Walker_Menu();
	return $args;
}


add_filter('wp_nav_menu_args','safeguard_pix_nav_menu_args');
/********************************************/