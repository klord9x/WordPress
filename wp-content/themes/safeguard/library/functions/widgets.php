<?php

/**** WIDGETS AREA ****/


/* ***************************************************** 
 * Plugin Name: Safeguard Flickr
 * Description: Retrieve and display photos from Flickr.
 * Version: 1.0
 * ************************************************** */
class safeguard_pix_flickr_widget extends WP_Widget {

	// Widget setup.
	function safeguard_pix_flickr_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'pix-flickr-widget',
			'description' => esc_html__('Display images from flickr', 'safeguard')
		);

		// Widget control settings.
		$control_ops = array(
			'id_base' => 'pix-flickr-widget'
		);

		// Create the widget.
		parent::__construct('pix-flickr-widget', esc_html__('Safeguard - Flickr images', 'safeguard') , $widget_ops, $control_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$id = $instance['flickr_id'];
		$nr = ($instance['flickr_nr'] != '') ? $nr = $instance['flickr_nr'] : $nr = 16;
		echo wp_kses_post($before_widget);
		if ($title) echo wp_kses_post($before_title . $title . $after_title);
		echo "
		<script type=\"text/javascript\">
			jQuery(document).ready(function(){
				'use strict';
				jQuery('#basicuse').jflickrfeed({
					limit: ".esc_js($nr).",
					qstrings: {
						id: '".esc_js($id)."'
					},
					itemTemplate: '<li><a href=\"http://www.flickr.com/photos/".esc_js($id)."\"><img src=\"{{image_s}}\" alt=\"{{title}}\" /></a></li>'
				});
			});
		</script>";
		echo '<ul id="basicuse" class="flickr-feed"></ul>'.wp_kses_post($after_widget);
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
		$instance['flickr_nr'] = strip_tags($new_instance['flickr_nr']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
		'title' => 'Latest From Flickr',
		'flickr_nr' => '9',
		'flickr_id' => '7992704@N05'
		);
		
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'safeguard'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
        
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php esc_html_e('Flickr ID:', 'safeguard'); ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" value="<?php echo esc_attr($instance['flickr_id']); ?>" class="widefat" />
            <?php /* <small style="line-height:12px;"><a href="http://www.idgettr.com">Find your Flickr user or group id</a></small> */ ?>
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('flickr_nr')); ?>"><?php esc_html_e('Number of photos:', 'safeguard'); ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id('flickr_nr')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('flickr_nr')); ?>" value="<?php echo esc_attr($instance['flickr_nr']); ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('safeguard_pix_flickr_widget');
function safeguard_pix_flickr_widget() {
	register_widget( 'safeguard_pix_flickr_widget' );
}
add_action( 'widgets_init', 'safeguard_pix_flickr_widget' );


/* ***************************************************** 
 * Plugin Name: 3-in-1 Posts
 * Description: Retrieve and display popular/latest posts/latest comments.
 * ************************************************** */
class safeguard_pix_totalposts_widget extends WP_Widget {

	// Widget setup.
	function safeguard_pix_totalposts_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_safeguard_pix_totalposts',
			'description' => esc_html__('Retrieve and display popular/latest posts/latest comments.', 'safeguard')
		);

		// Create the widget.
		parent::__construct('pix-totalposts-widget', esc_html__('Safeguard Popular/Latest posts/Last comments', 'safeguard') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo wp_kses_post($before_widget);
		if ($title) echo wp_kses_post($before_title . $title . $after_title);
		$post_count = $instance['post_count'];
		$post_category = $instance['post_category'];
		
		global $post;
		$args = array( 'posts_per_page' => $post_count);
		if (!empty($post_category))
		$args['category'] = $post_category;
		?>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#pop" data-toggle="tab"><?php esc_html_e('Popular', 'safeguard')?></a></li>
			<li><a href="#rec" data-toggle="tab"><?php esc_html_e('Recent', 'safeguard')?></a></li>
			<li><a href="#com" data-toggle="tab"><?php esc_html_e('Comments', 'safeguard')?></a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="pop">
				
					<?php $myposts = get_posts( $args ); 
					if ($myposts):
						foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
							<div class="media-tab">
								<a href="<?php the_permalink()?>" class="pull-left">
									<?php if(has_post_thumbnail()):?>
										<?php the_post_thumbnail('safeguard_pix-blog-thumb', array('class'=>'media-object') ); ?>
									<?php else:?>
										<img src = "http://placehold.it/59x59" alt="<?php esc_attr_e('No Image', 'safeguard') ?>" />
									<?php endif?>
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="<?php esc_url(the_permalink())?>"><?php the_title()?></a></h4> 
									<p><?php echo safeguard_pix_limit_words( get_the_excerpt(), 9)?></p>
								</div>
							</div>
						<?php endforeach; 
					endif; ?>
				
			</div>
			<div class="tab-pane fade" id="rec">
				<?php 
				$args ['orderby'] = 'comment_count';
				$myposts = get_posts( $args ); 
				
				if ($myposts):
					foreach( $myposts as $post ) :	setup_postdata($post);  ?>                 
						<div class="media-tab">
							<a href="<?php esc_url(the_permalink())?>" class="pull-left">
								<?php if(has_post_thumbnail()):?>
									<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
								<?php else:?>
									<img src = "http://placehold.it/59x59" alt="<?php esc_attr_e('No Image', 'safeguard') ?>" />
								<?php endif?>
							</a>
							<div class="media-body">
								<h4 class="media-heading"><a href="<?php esc_url(the_permalink())?>"><?php the_title()?></a></h4> 
								<p><?php echo safeguard_pix_limit_words( get_the_excerpt(), 9)?></p>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade" id="com">
				<?php 
				global $wpdb;	
				$sql = $wpdb->prepare("SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,70) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '%d' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT %d", 1, 5);
				$comments = $wpdb->get_results($sql);
				foreach ($comments as $comment) :?>
					<div class="media-tab  media-tab-comment">
						<a href="<?php echo esc_url(get_permalink($comment->ID).'#comment-'.$comment->comment_ID)?>" title="<?php echo esc_attr(strip_tags($comment->comment_author).' '.esc_html__('on ', 'safeguard').' '.$comment->post_title)?>" class="pull-left">
							<?php 
								if ( is_plugin_active( 'wp-user-avatar/wp-user-avatar.php' ) ) {
									$user = get_user_by('slug', $comment->comment_author);
									if(is_object($user))
 										echo get_wp_user_avatar($user->ID, 60);
 									else
 										echo get_avatar('', 60);
								}else{
									echo get_avatar($comment, '60');
								}
							?>
						</a>
						<div class="media-body">
                        
							<a href="<?php echo esc_url(get_permalink($comment->ID).'#comment-'.$comment->comment_ID)?>" title="<?php echo esc_attr(strip_tags($comment->comment_author).' '.esc_html__('on', 'safeguard').' '.$comment->post_title)?>">
                            
								<?php echo strip_tags($comment->comment_author)?>
							</a>
							<div class="tab-comment-body"><p><?php echo strip_tags($comment->com_excerpt)?></p></div>
                            
							<time datetime="<?php echo esc_attr(get_the_time('Y-m-d')); ?>"><i class="icon-calendar"></i><?php echo get_the_time('F d, Y'); ?></time>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
        <?php echo wp_kses_post($after_widget); 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['post_category'] = strip_tags($new_instance['post_category']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Blog posts',
			'post_count' => '3',
			'post_category' => ''
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('post_title')); ?>"><?php esc_html_e('Title', 'safeguard'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id('post_title')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('post_title')); ?>" value="<?php echo esc_attr($instance['post_title']); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php esc_html_e('Number of Posts to show', 'safeguard'); ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo esc_attr($this->get_field_id('post_category')); ?>"><?php esc_html_e('Category (Leave Blank to show from all categories)', 'safeguard'); ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id('post_category')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('post_category')); ?>" value="<?php echo esc_attr($instance['post_category']); ?>" class="widefat" />
		</p>
	<?php
	}
}

register_widget('safeguard_pix_totalposts_widget');



/**
 * Contact Form Widget Class
 */
class safeguard_pix_Contact_Form extends WP_Widget {
	
	function safeguard_pix_Contact_Form() {
		$widget_ops = array('classname' => 'safeguard_pix_contact_form_entries', 'description' => esc_html__("Contact widget", 'safeguard') );
		parent::__construct('safeguard_pix_Contact_Form', esc_html__('Safeguard - Contact Form', 'safeguard'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__('Contact Us', 'safeguard') : $instance['title'], $instance);
		$email = apply_filters('widget_title', empty($instance['email']) ? '' : $instance['email'], $instance);
		$success = apply_filters('widget_title', empty($instance['success']) ? esc_html__('Thank you, e-mail sent.', 'safeguard') : $instance['success'], $instance);
		
		echo wp_kses_post($before_widget);
		
		if ( $title ) echo wp_kses_post($before_title . $title . $after_title);
        ?>                
			<form action="#" method="post" id="contactFormWidget">
            
            <ul>
			
					<li>	<input type="text" name="wname" id="wname" value="" size="22" placeholder="<?php esc_html_e('Name', 'safeguard')?>"/> </li>
				
						<li>	<input type="text" name="wemail" id="wemail" value="" size="22" placeholder="<?php esc_html_e('Email', 'safeguard')?>" /> </li>
						
					
					<li>		<textarea name="wmessage" id="wmessage" cols="60" rows="10" placeholder="<?php esc_html_e('Message', 'safeguard')?>"></textarea> </li>
					
		
		
					
					<li class="text-right mini-btn-set">		<input type="submit" id="wformsend" value="<?php esc_html_e('Send', 'safeguard')?>" class="btn" name="wsend" /> </li>
                        
                        </ul>
			
			
				<div class="loading"></div>
                
				<div>
					<input type="hidden" name="wcontactemail" id="wcontactemail" value="<?php echo esc_attr($email)?>" />
					<input type="hidden" value="<?php echo esc_url(home_url('/'))?>" id="wcontactwebsite" name="wcontactwebsite" />
					<input type="hidden" name="wcontacturl" id="wcontacturl" value="<?php echo esc_url(get_template_directory_uri())?>/library/sendmail.php" />
				</div>
                
				<div class="clear"></div>
				<div class="widgeterror"></div>
				<div class="widgetinfo"><i class="icon-envelope"></i><?php echo wp_kses_post($success)?></div>
			</form>
		<?php
		echo wp_kses_post($after_widget);
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['success'] = strip_tags($new_instance['success']);
		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$success = isset($instance['success']) ? esc_attr($instance['success']) : '';
	?>
	
		<div>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:<br />', 'safeguard'); ?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Address:<br />', 'safeguard'); ?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></label></p>
		</div>
        <div>
        	<label for="<?php echo esc_attr($this->get_field_id('success')); ?>"><?php esc_html_e('Success Message:<br />', 'safeguard'); ?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('success')); ?>" name="<?php echo esc_attr($this->get_field_name('success')); ?>" type="text" value="<?php echo esc_attr($success); ?>" /></label></p>
		</div>
		<div style="clear:both"></div>
<?php
	}
}

register_widget('safeguard_pix_Contact_Form');



//////////////////////////////////////////
class safeguard_pix_works_widget extends WP_Widget {

	// Widget setup.
	function safeguard_pix_works_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_safeguard_pix_works',
			'description' => esc_html__('Display latest works (Portoflio)', 'safeguard')
		);

		// Create the widget.
		parent::__construct('pix-works-widget', esc_html__('Safeguard - Latest Works', 'safeguard') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['post_title']);
		
		echo wp_kses_post($before_widget);
		if ($title) echo wp_kses_post($before_title . $title . $after_title);
		$post_count = $instance['post_count'];
		$featured = $instance['featured'];
		$carousel = $instance['carousel'];
		
		$args = array('post_type' => 'portfolio', 'taxonomy'=> 'portfolio_category', 'posts_per_page' => $post_count);
		if ($featured)
		{
			$args['meta_key'] = '_portfolio_featured'; 
			$args['meta_value'] = '1';
		}
		$loop = new WP_Query($args);
		echo '<ul class="'.esc_attr($carousel).'">';
		while ( $loop->have_posts() ) : $loop->the_post();?>
		  <li>	
            <div class="media-pix-works">
				<a href="<?php esc_url(the_permalink())?>" class="media">
					<?php if(has_post_thumbnail()):?>
						<?php the_post_thumbnail('blog-thumb', array('class'=>'media-object') ); ?>
					<?php else:?>
						<img src = "http://placehold.it/59x59" alt="<?php esc_attr_e('No Image', 'safeguard') ?>" />
					<?php endif?>
				</a>
				<div class="media-body">
					<h4 class="media-heading"><a href="<?php esc_url(the_permalink())?>"><?php the_title()?></a></h4> 
					<p><?php echo safeguard_pix_limit_words(get_the_excerpt(), 15 )?></p>
				</div>
			</div>
          </li>
        <?php 
		endwhile;
        echo '</ul>';
		echo wp_kses_post($after_widget); 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['post_title'] = strip_tags($new_instance['post_title']);
		$instance['post_count'] = strip_tags($new_instance['post_count']);
		$instance['featured'] = strip_tags($new_instance['featured']);
		$instance['carousel'] = strip_tags($new_instance['carousel']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'post_title' => 'Recent works',
			'post_count' => '3',
			'featured' => '0',
			'carousel' => 'simple-pix-works',
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('post_title')); ?>"><?php esc_html_e('Title', 'safeguard'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id('post_title')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('post_title')); ?>" value="<?php echo esc_attr($instance['post_title']); ?>" class="widefat" />
		</p>
        
         <p>
			<label for="<?php echo esc_attr($this->get_field_id('featured')); ?>"><?php esc_html_e('Show only featured posts', 'safeguard'); ?></label> 
			<select id="<?php echo esc_attr($this->get_field_id('featured')); ?>" name="<?php echo esc_attr($this->get_field_name('featured')); ?>" class="widefat">
				<option value="0" <?php if( $instance['featured'] == 0):?>selected="selected"<?php endif?>>No</option> 
				<option value="1" <?php if( $instance['featured'] == 1):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('carousel')); ?>"><?php esc_html_e('Use carousel', 'safeguard'); ?></label> 
			<select id="<?php echo esc_attr($this->get_field_id('carousel')); ?>" name="<?php echo esc_attr($this->get_field_name('carousel')); ?>" class="widefat">
				<option value="simple-pix-works" <?php if( $instance['carousel'] == 'simple-pix-works'):?>selected="selected"<?php endif?>>No</option> 
				<option value="carousel-pix-works" <?php if( $instance['carousel'] == 'carousel-pix-works'):?>selected="selected"<?php endif?>>Yes</option> 
			</select>
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>"><?php esc_html_e('Number of Posts to show', 'safeguard'); ?></label> 
			<input id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" class="widefat" />
		</p>
	<?php
	}
}

//register_widget('safeguard_pix_works_widget');


//////////////////////////////////////////
class safeguard_pix_cats_widget extends WP_Widget {

	// Widget setup.
	function safeguard_pix_cats_widget() {

		// Widget settings.
		$widget_ops = array(
			'classname' => 'widget_portfolio_category',
			'description' => esc_html__('Display Portfolio Categories', 'safeguard')
		);

		// Create the widget.
		parent::__construct('pix-cats-widget', esc_html__('Safeguard - Portfolio Categories', 'safeguard') , $widget_ops);
	}

	// Display the widget on the screen.
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['cats_title']);
		
		echo wp_kses_post($before_widget);
		if ($title) echo wp_kses_post($before_title . $title . $after_title);
				
		$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
		$categories = get_categories($args);
		echo '<ul class="category-list unstyled clearfix">';
		$i=0;
		foreach($categories as $category){
			$i++;
			$class = $i == count($categories) ? 'class="li-last"' : '';
			?>
			<li <?php echo wp_kses_post($class)?>><a href="<?php echo esc_url(get_category_link( $category->term_id )); ?>"><i class="fa fa-long-arrow-right"></i><?php echo wp_kses_post($category->name); ?></a></li>				
            <?php
		}
		echo '</ul>';
		echo wp_kses_post($after_widget); 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cats_title'] = strip_tags($new_instance['cats_title']);
		return $instance;
	}

	function form($instance) {
		$defaults = array(
			'cats_title' => 'Portfolio Categories',
		);
		$instance = wp_parse_args((array)$instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('cats_title')); ?>"><?php esc_html_e('Title', 'safeguard'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id('cats_title')); ?>" type="text" name="<?php echo esc_attr($this->get_field_name('cats_title')); ?>" value="<?php echo esc_attr($instance['cats_title']); ?>" class="widefat" />
		</p>
        
	<?php
	}
}

//register_widget('safeguard_pix_cats_widget');

?>