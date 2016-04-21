<?php


/***********************************

	Plugin Name:  PixthemeCustom
	Plugin URI:   http://templines.com/
	Description:  Additional functionality for PixTheme
	Version:      1.0
	Author:       PixTheme
	Author URI:   http://templines.com
	License:      GPLv2 or later	
	Text Domain:  PixThemeCustom
	Domain Path:  /languages/
	
***********************************/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // disable direct access
}


/************* STATICBLOCK ***************/


	if(!function_exists('pixtheme_init_staticblocks')) {
	function pixtheme_init_staticblocks(){
			$labels = array(
				'name'               => _x( 'Static Blocks', 'post type general name', 'PixTheme' ),
				'singular_name'      => _x( 'Static Block', 'post type singular name', 'PixTheme' ),
				'menu_name'          => _x( 'Static Blocks', 'admin menu', 'PixTheme' ),
				'name_admin_bar'     => _x( 'Static Block', 'add new on admin bar', 'PixTheme' ),
				'add_new'            => _x( 'Add New', 'book', 'PixTheme' ),
				'add_new_item'       => __( 'Add New Block', 'PixTheme' ),
				'new_item'           => __( 'New Block', 'PixTheme' ),
				'edit_item'          => __( 'Edit Block', 'PixTheme' ),
				'view_item'          => __( 'View Block', 'PixTheme' ),
				'all_items'          => __( 'All Blocks', 'PixTheme' ),
				'search_items'       => __( 'Search Block', 'PixTheme' ),
				'parent_item_colon'  => __( 'Parent Block:', 'PixTheme' ),
				'not_found'          => __( 'No blocks found.', 'PixTheme' ),
				'not_found_in_trash' => __( 'No blocks found in Trash.', 'PixTheme' )
			);
	
			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'staticblock' ),
				'capability_type'    => 'post',
				'has_archive'        => 'staticblocks',
				'hierarchical'       => false,
				'menu_position'      => 8,
				'supports'           => array( 'title', 'editor',  'thumbnail', 'page-attributes', 'comments' ),
				'menu_icon'			 => get_template_directory_uri() . "/library/functions/img/pix-static.png"
			);
		
	
	        register_post_type( 'staticblocks', $args );
		}
	
	}
	if(!function_exists('pix_show_productpage_static_block')) {
			function pix_show_productpage_static_block() {
			    $product = get_post(get_the_ID());
				// Do not show this on variable products
				if ( $product->product_type <> 'variable' ) {
					$args = array(
						'post_type'        => 'staticblocks',
						'post_status'      => 'publish',
					);
					$staticBlocksData = get_posts( $args );
					foreach($staticBlocksData as $_block){
						$staticBlocks[$_block->ID] = $_block->post_title;
					}
				
				
					
		
					
					$staticblock = get_post_meta( $product->ID, '_static_bottom', true );
		
					echo '<div class="show_if_simple show_if_variable">';
					pixtheme_wp_select_multiple( array( 
						'id' => '_static_bottom', 
						'label' => __( 'Static Block Description', 'PixTheme' ), 
						'options' => $staticBlocks, 
						'name' => '_static_bottom[]',
						'desc_tip' => true, 
						'description' => __( 'Select the block to display at the bottom of the product page' , 'PixTheme'),
						'value' => explode(",",$staticblock)
					) );
			
					echo '</div>';
				}
			}
		}
		
		
		if(!function_exists('pixtheme_add_bottom_block_product')) {
			function pixtheme_add_bottom_block_product() {
				$output = "";
				$product = get_post(get_the_ID());
				$staticblockIDs = get_post_meta( $product->ID, '_static_bottom', true );
				$staticblockIDsExploded = explode(',',$staticblockIDs);
				foreach($staticblockIDsExploded as $_staticblockID){
					if (!is_numeric($_staticblockID)) continue;
					$staticblock = get_post($_staticblockID);
					$output .= '<div class="stblock_content">' . apply_filters( 'the_content',$staticblock->post_content) . '</div>';
				}
				
				echo $output;
			}
		}
		
		
		
		if(!function_exists('pixtheme_woocommerce_product_quick_edit_save')) {
			function pixtheme_woocommerce_product_quick_edit_save($product_id){
				
				if ( isset( $_REQUEST['_static_bottom'] ) ){
					if (!get_post_meta( $product_id, '_static_bottom', true )){
						add_post_meta($product_id, '_static_bottom', wc_clean( implode(",",$_REQUEST['_static_bottom'] )));
					}else{
						update_post_meta( $product_id, '_static_bottom', wc_clean( implode(",",$_REQUEST['_static_bottom'] )) );	
					}
					
				}else{
					if (get_post_meta( $product_id, '_static_bottom', true )){
						update_post_meta( $product_id, '_static_bottom', wc_clean( "," ) );	
					}
				}
			}
		}
				
		
		
		
		if(!function_exists('pixtheme_staticblocks_get')) {
		    function pixtheme_staticblocks_get () {
		        $return_array = array();
		        $args = array( 'post_type' => 'staticblocks', 'posts_per_page' => 30);     
				$myposts = get_posts( $args );
		        $i=0;
		        foreach ( $myposts as $post ) {
		            $i++;
		            $return_array[$i]['label'] = get_the_title($post->ID);
		            $return_array[$i]['value'] = $post->ID;
		        } 
		        wp_reset_postdata();
		        return $return_array;
		    }
		}
		
		
		if(!function_exists('pixtheme_staticblocks_show')) {
		    function pixtheme_staticblocks_show ($id = false) {
		        echo pixtheme_staticblocks_single($id);
		    }
		}
		
		
		if(!function_exists('pixtheme_staticblocks_single')) {
		    function pixtheme_staticblocks_single($id = false) {
		    	if(!$id) return;
		    	
		    	$output = false;
		    	
		    	$output = wp_cache_get( $id, 'pixtheme_staticblocks_single' );
		    	
			    if ( !$output ) {
			   
			        $args = array( 'include' => $id,'post_type' => 'staticblocks', 'posts_per_page' => 1);
			        $output = '';
			        $myposts = get_posts( $args );
			        foreach ( $myposts as $post ) {
			        	setup_postdata($post);
						
			        	$output = do_shortcode(get_the_content($post->ID));
			        	
						$shortcodes_custom_css = get_post_meta( $post->ID, '_wpb_shortcodes_custom_css', true );
						if ( ! empty( $shortcodes_custom_css ) ) {
							$output .= '<style type="text/css" data-type="vc_shortcodes-custom-css">';
							$output .= $shortcodes_custom_css;
							$output .= '</style>';
						}
			        } 
			        wp_reset_postdata();
			        
			        wp_cache_add( $id, $output, 'pixtheme_staticblocks_single' );
			    }
			    
		        return $output;
		   }
		}
		
		
		
/************* PORTFOLIO ***************/

//add_action('init', 'pixtheme_portfolio_register');

function pixtheme_portfolio_register() {	

	register_post_type( 'portfolio' , 
						array(
							'label' => 'Portfolio',
							'singular_label' => 'Portfolio',
							'exclude_from_search' => false,
							'publicly_queryable' => true,
							'menu_position' => null,
							'show_ui' => true, 
							'public'  =>   true,
							'show_in_menu'  =>   true,
							'menu_icon'     =>   get_template_directory_uri() . '/library/functions/img/pix-portfolio.png',
							'query_var' => true,
							'capability_type' => 'page',
							'hierarchical' => false,
							'edit_item' => __( 'Edit Work', 'PixTheme'),
							'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
						)
					);

	register_taxonomy( 'portfolio_category', 
						'portfolio', 
						array( 'hierarchical' => true, 
								'label' => __('Categories', 'PixTheme'),
								'singular_label' => __('Category', 'PixTheme'), 
								'public' => true,
  								'show_tagcloud' => false,
								'query_var' => true,
			 					'rewrite' => array('slug' => 'portfolio_category' , 'with_front' => false)
						)
					);  
	
	add_filter('manage_edit-portfolio_columns', 'pixtheme_portfolio_edit_columns');
	add_action('manage_posts_custom_column',  'pixtheme_portfolio_custom_columns');
	
	function pixtheme_portfolio_edit_columns($columns){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'portfolio_image' => 'Image Preview',
			'title' => 'Title',
			'portfolio_category' => 'Category',
			'portfolio_description' => 'Description',
			
		);
	
		return $columns;
	}
	
	function pixtheme_portfolio_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "portfolio_category":  
				echo get_the_term_list($post->ID, 'portfolio_category', '', ', ','');  
				break;  

			case 'portfolio_description':
				the_excerpt();  
				break;  

			case 'portfolio_image':
				the_post_thumbnail( array(100, 100) );
				break;
		}
	}
}


function pixtheme_post_type_link_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
    if ( strpos('%portfolio_category%', $post_link)  < 0 ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'portfolio' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'portfolio_category');
    if ( !$terms ) {
      return str_replace('portfolio/category/%portfolio_category%/', '', $post_link);
    }
    return str_replace('%portfolio_category%', $terms[0]->slug, $post_link);
}
  
add_filter('post_type_link', 'pixtheme_post_type_link_filter_function', 1, 3);
  

add_action( 'admin_menu', 'pixtheme_register_portfolio_menu' );

function pixtheme_register_portfolio_menu() {
	add_submenu_page(
		'edit.php?post_type=portfolio',
		'Order portfolio',
		'Sort items',
		'edit_pages', 'portfolio-order',
		'pixtheme_portfolio_order_page'
	);
}


function pixtheme_portfolio_order_page() 
{
	?></pre>
	<div class="wrap">
        <h2>Sort Items</h2>
        Simply drag the items up or down and they will be saved in that order.
        
        <?php $slides = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
        <table id="sortable-table-portfolio" class="wp-list-table widefat fixed posts">
            <thead>
                <tr>
                    <th class="column-order">Order</th>
                    <th class="column-title">Title</th>
                    <th class="column-thumbnail">Thumbnail</th>
         
                </tr>
            </thead>
            <tbody data-post-type="portfolio"><!--?php while( $products--->
				<?php if( $slides->have_posts() )  : ?>
                    <?php while ($slides->have_posts()): $slides->the_post(); ?>
                        <tr id="post-<?php esc_attr(the_ID()); ?>">
                            <td class="column-order"><img title="" src="<?php echo esc_url(get_stylesheet_directory_uri()) . '/images/move-icon-vertical.png'; ?>" alt="Move Icon" height="32" /></td>
                            <td class="column-title"><strong><?php the_title(); ?></strong></td>
                    		<td class="column-thumbnail"><?php the_post_thumbnail( 'blog-thumb' ); ?></td>
                         </tr>
                    <?php endwhile; ?>
                <?php else : ?>        
                    No portfolio items found, make sure you create one.
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>	
            </tbody>
            <tfoot>
                <tr>
                    <th class="column-order">Order</th>
                    <th class="column-title">Title</th>
                    <th class="column-thumbnail">Thumbnail</th>
                </tr>
            </tfoot>
        </table>
 	</div>
	<pre>
	<!-- .wrap -->	
	<?php 
}

add_action( 'wp_ajax_pixtheme_portfolio_update_post_order', 'pixtheme_portfolio_update_post_order' );

function pixtheme_portfolio_update_post_order() {
	global $wpdb;

	$post_type     = $_POST['postType'];
	$order        = $_POST['order'];

	/**
	*    Expect: $sorted = array(
	*                menu_order => post-XX
	*            );
	*
	*/
	
	foreach( $order as $menu_order => $post_id )
	{
		$post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
		$menu_order     = intval($menu_order);
		wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
	}

	die( '1' );
}


// добавляет вызов функции при инициализации административного раздела
add_action('admin_init', 'pix_category_custom_fields', 1);
// функция расширения функционала административного раздела
function pix_category_custom_fields()
    {
		add_action( 'edited_services_category', 'pix_category_custom_fields_save'); 
		add_action( 'services_category_edit_form_fields', 'pix_category_custom_fields_form');
        // добавления действия после отображения формы ввода параметров категории
        add_action('services_category_add_form_fields', 'pix_category_custom_fields_add_form');
        // добавления действия при сохранении формы ввода параметров категории
        add_action('created_services_category', 'pix_category_custom_fields_save');
    }

function pix_category_custom_fields_form($tag)
    {
        $t_id = $tag->term_id;
        $cat_meta = get_option("services_category_$t_id");
?>
        <tr class="form-field">
        	<th scope="row" valign="top"><label for="tag-pix_serv_title"><?php _e('Department Title', 'PixTheme'); ?></label></th>
        	<td>
        		<input type="text" name="pix_serv_title" id="tag-pix_serv_title" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['pix_serv_title']) ? esc_attr($cat_meta['pix_serv_title']) : ''; ?>">
        	</td>
        </tr>
        <tr class="form-field">
        	<th scope="row" valign="top"><label for="tag-pix_serv_add_title"><?php _e('Department Additional Title', 'PixTheme'); ?></label></th>
            <td>
                <input type="text" name="pix_serv_add_title" id="tag-pix_serv_add_title" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['pix_serv_add_title']) ? esc_attr($cat_meta['pix_serv_add_title']) : ''; ?>">
            </td>
        </tr>
        <tr class="form-field">
        	<th scope="row" valign="top"><label for="tag-pix_icon"><?php _e('Department Icon', 'PixTheme'); ?></label></th>
        	<td>
        		<input type="text" name="pix_icon" id="tag-pix_icon" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['pix_icon']) ? esc_attr($cat_meta['pix_icon']) : ''; ?>"><br />
                <span class="description"><?php _e('Icon class', 'PixTheme'); ?></span>
            </td>
        </tr>
        <tr class="form-field">
        	<th scope="row" valign="top"><label for="tag-pix_serv_url"><?php _e('Department Link', 'PixTheme'); ?></label></th>
        	<td>
        		<input type="text" name="pix_serv_url" id="tag-pix_serv_url" size="25" style="width:60%;" value="<?php echo esc_attr($cat_meta['pix_serv_url']) ? esc_attr($cat_meta['pix_serv_url']) : ''; ?>"><br />
                <span class="description"><?php _e('Url', 'PixTheme'); ?></span>
        	</td>
        </tr>        
        <?php
    }
	
function pix_category_custom_fields_add_form($tag)
    {
?>	
        <div class="form-field">
        	<label for="tag-pix_serv_title"><?php _e('Department Title', 'PixTheme'); ?></label>
        	<input type="text" name="pix_serv_title" id="tag-pix_serv_title" size="40" value="">
        </div>
        <div class="form-field">
        	<label for="tag-pix_serv_add_title"><?php _e('Department Additional Title', 'PixTheme'); ?></label>
        	<input type="text" name="pix_serv_add_title" id="tag-pix_serv_add_title" size="40" value="">
        </div>
        <div class="form-field">
        	<label for="tag-pix_icon"><?php _e('Department Icon', 'PixTheme'); ?></label>
        	<input type="text" name="pix_icon" id="tag-pix_icon" size="40" value="">
            <br />
            <p><?php _e('Icon class', 'PixTheme'); ?></p>
        </div>
        <div class="form-field">
        	<label for="tag-pix_serv_url"><?php _e('Department Link', 'PixTheme'); ?></label>
        	<input type="text" name="pix_serv_url" id="tag-pix_serv_url" size="40" value="">
            <br />
            <p><?php _e('Url', 'PixTheme'); ?></p>
        </div>
        
        <?php
    }
    
function pix_category_custom_fields_save($term_id)
    {
        if (isset($_POST['pix_icon']) || isset($_POST['pix_serv_url'])) {
            $t_id = $term_id;
            $cat_meta = get_option("services_category_$t_id");
			if (isset($_POST['pix_icon'])) {
				$cat_meta['pix_icon'] = $_POST['pix_icon'];
			}
			if (isset($_POST['pix_serv_url'])) {
				$cat_meta['pix_serv_url'] = $_POST['pix_serv_url'];
			}
			if (isset($_POST['pix_serv_title'])) {
				$cat_meta['pix_serv_title'] = $_POST['pix_serv_title'];
			}
			if (isset($_POST['pix_serv_add_title'])) {
				$cat_meta['pix_serv_add_title'] = $_POST['pix_serv_add_title'];
			}
            //save the option array
            update_option("services_category_$t_id", $cat_meta);			
        }
    }


/************* SERVICES ***************/

//add_action('init', 'pixtheme_services_register');

function pixtheme_services_register() {	

	register_post_type( 'services' , 
						array(
							'label' => 'Services',
							'singular_label' => 'Services',
							'exclude_from_search' => false,
							'publicly_queryable' => true,
							'menu_position' => null,
							'show_ui' => true, 
							'public'  =>   true,
							'show_in_menu'  =>   true,
							'menu_icon'     =>   get_template_directory_uri() . '/library/functions/img/pix-service.png',
							'query_var' => true,
							'capability_type' => 'page',
							'hierarchical' => false,
							'edit_item' => __( 'Edit Work', 'PixTheme'),
							'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
						)
					);

	register_taxonomy( 'services_category', 
						'services', 
						array( 'hierarchical' => true, 
								'label' => __('Departments', 'PixTheme'),
								'singular_label' => __('Department', 'PixTheme'), 
								'public' => true,
  								'show_tagcloud' => false,
								'query_var' => true,
			 					'rewrite' => array('slug' => 'services_category')
						)
					);  
	
	add_filter('manage_edit-services_columns', 'pixtheme_services_edit_columns');
	add_action('manage_posts_custom_column',  'pixtheme_services_custom_columns');
	
	function pixtheme_services_edit_columns($columns){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'services_image' => 'Image Preview',
			'title' => 'Title',
			'services_category' => 'Department',
			'services_description' => 'Description',
			
		);
	
		return $columns;
	}
	
	function pixtheme_services_custom_columns($column){
		global $post;
		switch ($column)
		{
			case "services_category":  
				echo get_the_term_list($post->ID, 'services_category', '', ', ','');  
				break;  

			case 'services_description':
				the_excerpt();  
				break;  

			case 'services_image':
				the_post_thumbnail(array(100, 100));
				break;
		}
	}
	
	add_filter('manage_edit-services_category_columns', 'pixtheme_services_category_columns');
	add_filter('manage_services_category_custom_column', 'pixtheme_services_category_custom_column', 10, 3);
	
	function pixtheme_services_category_columns($columns){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'name' => __('Name', 'PixTheme'),			
		    'description' => __('Description', 'PixTheme'),
			'slug' => __('Slug', 'PixTheme'),
			'posts' => __('Count', 'PixTheme'),
			'pix_serv_url' => __('Url', 'PixTheme')
		);
	
		return $columns;
	}
	
	function pixtheme_services_category_custom_column($c, $column_name, $term_id){
			
		$t_id = $term_id;
		$cat_meta = get_option("services_category_$t_id"); 
		switch ($column_name)
		{
			case "pix_serv_url":  ;
				echo esc_attr($cat_meta['pix_serv_url']);            
				break;  
			
			default:
            	break;
		}		
		
	}
}


function pixtheme_services_link_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
    if ( strpos('%services_category%', $post_link)  < 0 ) {
      return $post_link;
    }
    $post = get_post($id);
    if ( !is_object($post) || $post->post_type != 'services' ) {
      return $post_link;
    }
    $terms = wp_get_object_terms($post->ID, 'services_category');
    if ( !$terms ) {
      return str_replace('services/category/%services_category%/', '', $post_link);
    }
    return str_replace('%services_category%', $terms[0]->slug, $post_link);
}
  
add_filter('post_type_link', 'pixtheme_services_link_filter_function', 1, 3);
  

add_action( 'admin_menu', 'pixtheme_register_services_menu' );

function pixtheme_register_services_menu() {
	add_submenu_page(
		'edit.php?post_type=services',
		'Order services',
		'Sort items',
		'edit_pages', 'services-order',
		'pixtheme_services_order_page'
	);
}


function pixtheme_services_order_page() 
{
	?></pre>
	<div class="wrap">
        <h2>Sort Items</h2>
        Simply drag the items up or down and they will be saved in that order.
        
        <?php $slides = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
        <table id="sortable-table-services" class="wp-list-table widefat fixed posts">
            <thead>
                <tr>
                    <th class="column-order">Order</th>
                    <th class="column-title">Title</th>
                    <th class="column-thumbnail">Thumbnail</th>
         
                </tr>
            </thead>
            <tbody data-post-type="services"><!--?php while( $products--->
				<?php if( $slides->have_posts() )  : ?>
                    <?php while ($slides->have_posts()): $slides->the_post(); ?>
                        <tr id="post-<?php esc_attr(the_ID()); ?>">
                            <td class="column-order"><img title="" src="<?php echo esc_url(get_stylesheet_directory_uri()) . '/images/move-icon-vertical.png'; ?>" alt="Move Icon" height="32" /></td>
                            <td class="column-title"><strong><?php the_title(); ?></strong></td>
                    		<td class="column-thumbnail"><?php the_post_thumbnail( 'blog-thumb' ); ?></td>
                         </tr>
                    <?php endwhile; ?>
                <?php else : ?>        
                    No services items found, make sure you create one.
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>	
            </tbody>
            <tfoot>
                <tr>
                    <th class="column-order">Order</th>
                    <th class="column-title">Title</th>
                    <th class="column-thumbnail">Thumbnail</th>
                </tr>
            </tfoot>
        </table>
 	</div>
	<pre>
	<!-- .wrap -->	
	<?php 
}

add_action( 'wp_ajax_pixtheme_services_update_post_order', 'pixtheme_services_update_post_order' );

function pixtheme_services_update_post_order() {
	global $wpdb;

	$post_type     = $_POST['postType'];
	$order        = $_POST['order'];

	/**
	*    Expect: $sorted = array(
	*                menu_order => post-XX
	*            );
	*
	*/
	
	foreach( $order as $menu_order => $post_id )
	{
		$post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
		$menu_order     = intval($menu_order);
		wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
	}

	die( '1' );
}




/************* EVENTS ******************/

function pix_event_post_type() {
	
	$labels = array(
		'name'                  =>   __( 'Events', 'PixTheme' ),
		'singular_name'         =>   __( 'Event', 'PixTheme' ),
		'add_new_item'          =>   __( 'Add New Event', 'PixTheme' ),
		'all_items'             =>   __( 'All Events', 'PixTheme' ),
		'edit_item'             =>   __( 'Edit Event', 'PixTheme' ),
		'new_item'              =>   __( 'New Event', 'PixTheme' ),
		'view_item'             =>   __( 'View Event', 'PixTheme' ),
		'not_found'             =>   __( 'No Events Found', 'PixTheme' ),
		'not_found_in_trash'    =>   __( 'No Events Found in Trash', 'PixTheme' )
	);
	 
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt'
	);
	 
	$args = array(
		'label'         =>   __( 'Events', 'PixTheme' ),
		'labels'        =>   $labels,
		'description'   =>   __( 'A list of upcoming events', 'PixTheme' ),
		'public'        =>   true,
		'show_in_menu'  =>   true,
		'menu_icon'     =>   get_template_directory_uri() . '/library/functions/img/event.png',
		'has_archive'   =>   true,
		'rewrite'       =>   true,
		'supports'      =>   $supports
	);
	 
	register_post_type( 'event', $args );
	
	register_taxonomy( 'event_category', 
						'event', 
						array( 'hierarchical' => true, 
								'label' => __('Categories', 'PixTheme'),
								'singular_label' => __('Category', 'PixTheme'), 
								'public' => true,
  								'show_tagcloud' => false,
								'query_var' => 'true',
			 					'rewrite' => array('slug' => 'event_category' , 'with_front' => false)
						)
					);
					
	add_filter( 'manage_edit-event_columns', 'pix_custom_columns_head', 10 );
	add_action( 'manage_posts_custom_column', 'pix_custom_columns_content', 10, 2 );
	
	function pix_custom_columns_head( $defaults ) {
		unset( $defaults['date'] );
	 	unset( $defaults['title'] );
		
	 	$defaults['event_image'] = __( 'Image Preview', 'uep' );
		$defaults['title'] = __( 'Title', 'uep' );
	 	$defaults['event_category'] = __( 'Category', 'uep' );
		$defaults['event_start_date'] = __( 'Start Date', 'uep' );
		$defaults['event_end_date'] = __( 'End Date', 'uep' );
		$defaults['event_venue'] = __( 'Venue', 'uep' );
	 
		return $defaults;
	}
	
	
	function pix_custom_columns_content( $column_name, $post_id ) {
				
	 	if ( 'event_image' == $column_name ) {
			the_post_thumbnail( 'blog-thumb' );
		}
		
		if ( 'event_category' == $column_name ) {
			echo get_the_term_list($post_id, 'event_category', '', ', ',''); 
		}		
		
		if ( 'event_start_date' == $column_name ) {
			$start_date = get_post_meta( $post_id, 'event-start-date', true );
			echo date( 'F d, Y', $start_date );
		}
	 
		if ( 'event_end_date' == $column_name ) {
			$end_date = get_post_meta( $post_id, 'event-end-date', true );
			echo date( 'F d, Y', $end_date );
		}
	 
		if ( 'event_venue' == $column_name ) {
			$venue = get_post_meta( $post_id, 'event-venue', true );
			echo wp_kses_post($venue);
		}
	}
	

}



//add_action('init', 'pixtheme_portfolio_register');
add_action('init', 'pixtheme_services_register');
//add_action( 'init', 'pix_event_post_type' );
add_action( 'init', 'pixtheme_init_staticblocks' );
add_action( 'woocommerce_product_options_advanced', 'pix_show_productpage_static_block', 55 );
add_action('save_post','pixtheme_woocommerce_product_quick_edit_save');
add_action('woocommerce_after_single_product_summary','pixtheme_add_bottom_block_product',15);


/************** Multiselect Field***************/
function pixtheme_wp_select_multiple( $field ) {
    global $thepostid, $post, $woocommerce;

    $thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
    $field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
    $field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
    $field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
    $field['value']         = isset( $field['value'] ) ? $field['value'] : ( get_post_meta( $thepostid, $field['id'], true ) ? get_post_meta( $thepostid, $field['id'], true ) : array() );

    echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '" class="' . esc_attr( $field['class'] ) . '" multiple="multiple">';

    foreach ( $field['options'] as $key => $value ) {

        echo '<option value="' . esc_attr( $key ) . '" ' . ( in_array( $key, $field['value'] ) ? 'selected="selected"' : '' ) . '>' . esc_html( $value ) . '</option>';

    }

    echo '</select> ';

    if ( ! empty( $field['description'] ) ) {

        if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
            echo '<img class="help_tip" data-tip="' . esc_attr( $field['description'] ) . '" src="' . esc_url( WC()->plugin_url() ) . '/assets/images/help.png" height="16" width="16" />';
        } else {
            echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
        }

    }
    echo '</p>';
}
/********************************************/

function pixtheme_share_buttons($atts, $content=NULL){

	global $post;
	if(!isset($post->ID)) return;
	$permalink = get_permalink($post->ID);
	$image =  wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'preview-thumb' );

	$post_title = rawurlencode(get_the_title($post->ID));

    $out='
			<div class="social-links__inner pull-right">
				<span class="social-links__name">SHARE THIS ARTICLE</span>
				<a href="http://www.facebook.com/sharer.php?u='.esc_url($permalink).'&amp;images='.esc_url($image[0]).'" title="'.__('Facebook', 'transcargo').'" target="_blank" class="text-center"><i class="icon fa fa-facebook"></i></a>
				<a href="https://twitter.com/share?url='.esc_url($permalink).'&text='.esc_attr($post_title).'" title="'.__('Twitter', 'transcargo').'" target="_blank" class="text-center"><i class="icon fa fa-twitter"></i></a>
				<a href="http://plus.google.com/share?url='.esc_url($permalink).'&title='.esc_attr($post_title).'" title="'.__('Google +', 'transcargo').'" target="_blank" class="text-center"><i class="icon fa fa-google-plus"></i></a>
				<a href="http://pinterest.com/pin/create/button/?url='.esc_url($permalink).'&amp;media='.esc_url($image[0]).'&amp;description='.esc_attr($post_title).'" title="'.__('Pinterest', 'transcargo').'" target="_blank" class="text-center"><i class="icon fa fa-pinterest-p"></i></a>
			</div>
		';

    return $out;
}

add_shortcode('share', 'pixtheme_share_buttons');

?>