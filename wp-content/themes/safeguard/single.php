<?php
/**
 * The Template for displaying all single posts.
 */
$safeguard_pix_custom =  get_post_custom($post->ID);
$safeguard_pix_layout = isset ($safeguard_pix_custom['safeguard_pix_page_layout']) ? $safeguard_pix_custom['safeguard_pix_page_layout'][0] : '2';
$safeguard_pix_sidebar = isset ($safeguard_pix_custom['safeguard_pix_selected_sidebar'][0]) ? $safeguard_pix_custom['safeguard_pix_selected_sidebar'][0] : 'global-sidebar-1';
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
?>
<?php get_header();?>

<main class="section" id="main">
  <div class="container">
    <div class="row">
      <?php if ($safeguard_pix_layout == '3'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
      <div class="col-xs-12 <?php if ($safeguard_pix_layout == '1'):?>  col-sm-12 col-md-12 <?php else: ?> col-sm-12 col-md-9 <?php endif?>">
        <section role="main" class="main-content contentsingle-post ">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php esc_attr(the_ID());?>"<?php post_class('post format-image clearfix'); ?>>
            <?php			
                    $safeguard_pix_format  = get_post_format();
                    $safeguard_pix_format = !in_array($safeguard_pix_format, array("quote", "gallery", "video")) ? 'standared' : $safeguard_pix_format;
					$safeguard_pix_icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
                    get_template_part('template-parts/post-format-single/blog', $safeguard_pix_format);
                ?>
                
           	<div class="entry-main"> 
            
             <?php if($safeguard_pix_options['safeguard_pix_blog_show_date']): ?>
             
             <div class="box-date-post"> <span class="date-1"><?php echo get_the_time('j'); ?></span> <span class="date-2">  <?php echo get_the_time('M'); ?></span> </div>
             
  		                     
  <?php endif?>  
              
                <div class="entry-meta clearfix">
                  
                  <div class="meta">
                   <span class="meta-i"> <?php esc_html_e("By", 'safeguard') ?> <?php the_author_posts_link(); ?> </span>  <span class="divider-bog">/</span>
				  <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>                  
                  <?php 
				  	if(!empty($safeguard_pix_options['safeguard_pix_blog_show_category']) && $safeguard_pix_options['safeguard_pix_blog_show_category'] == 1){
						$safeguard_pix_categories = get_the_category($post->ID);
                        if($safeguard_pix_categories){
                            $safeguard_pix_output = '<span class="meta-i">'.esc_html__('In: ', 'safeguard');						
                            foreach($safeguard_pix_categories as $safeguard_pix_category) {
                                $safeguard_pix_output .= '<a href="'.esc_url(get_category_link( $safeguard_pix_category->term_id )).'" >'.wp_kses_post($safeguard_pix_category->cat_name).'</a> ';
                            }
                            $safeguard_pix_output .= '</span>';
                            echo wp_kses_post($safeguard_pix_output);						
                        }
					}
					if(!empty($safeguard_pix_options['safeguard_pix_blog_show_tag']) && $safeguard_pix_options['safeguard_pix_blog_show_tag'] == 1){	
						$safeguard_pix_posttags = get_the_tags($post->ID);
                        if ($safeguard_pix_posttags) {
                            $safeguard_pix_output = '<span class="meta-i">'.esc_html__('Tags: ', 'safeguard');
                            foreach($safeguard_pix_posttags as $safeguard_pix_tag) {
                                $safeguard_pix_output .= '<a href="'.esc_url(get_tag_link( $safeguard_pix_tag->term_id )).'" >'.wp_kses_post($safeguard_pix_tag->name).'</a> ';
                            }
                            $safeguard_pix_output .= '</span>';
                            echo wp_kses_post($safeguard_pix_output);
                        }
					}
                  ?>
                  
                  <?php endif; // End if 'post' == get_post_type()?>
                    <?php if( 'open' == $post->comment_status && $safeguard_pix_options['safeguard_pix_blog_show_comments']) : ?>      	
                   <span class="divider-bog">/</span> <span class="meta-i">              
                        <?php esc_html_e( 'Comments: ', 'safeguard' ); ?><?php comments_popup_link( esc_html__( '0', 'safeguard' ), esc_html__( '1', 'safeguard' ), esc_html__( '%', 'safeguard' )); ?>              
                    </span>
                    <?php endif?>
                  </div>
                  
                  <?php wp_link_pages();?>
                </div>
              
                <h3 class="entry-title">
                  <?php the_title(); ?>
                </h3>
                
                <div class="entry-content">
                  <?php the_content(); ?>
                </div>
                
          <?php if(!empty($safeguard_pix_options['safeguard_pix_blog_share']) && $safeguard_pix_options['safeguard_pix_blog_share'] == 1) echo do_shortcode('[share]'); ?>
            
              </div>
            
            
          </article>
        </section>
    <?php if(!empty($safeguard_pix_options['safeguard_pix_blog_show_author']) && $safeguard_pix_options['safeguard_pix_blog_show_author'] == 1) : ?>
        <?php 
			$safeguard_pix_get_avatar = get_avatar(get_the_author_meta('user_email'), 85);
			preg_match("/src='(.*?)'/i", $safeguard_pix_get_avatar, $safeguard_pix_matches);
			$safeguard_pix_src = !empty($safeguard_pix_matches[1]) ? $safeguard_pix_matches[1] : '';
		?>
        <section class="about-autor ">
        
        <h3 class="widget-title"><span> <?php esc_html_e('About Author', 'safeguard')?></span></h3>

          <article class="comment img">
            <div class="avatar-placeholder ">
            <img src="<?php echo esc_url($safeguard_pix_src) ?>)"  alt="<?php esc_attr_e('Avatar', 'safeguard') ?>"/> </div>
            <header class="comment-header"> <cite class="comment-author">
              <?php the_author_posts_link(); ?>
              </cite>
              <time class="comment-datetime" datetime="2012-10-27"><span class="icon-clock" aria-hidden="true"></span> <?php echo date_i18n( get_option('date_format'), strtotime( get_the_author_meta( 'user_registered') ) ); ?> </time>
            </header>
            <div class="comment-body">
              <?php the_author_meta( 'description'); ?>
            </div>
          </article>
        </section>
    <?php endif; ?>
    <?php if(!empty($safeguard_pix_options['safeguard_pix_blog_show_author_posts']) && $safeguard_pix_options['safeguard_pix_blog_show_author_posts'] == 1) :?>
        <?php
  	$args = array(
		'author'        =>  get_the_author_meta( 'ID'), 
		'orderby'       =>  'post_date',
		'order'         =>  'ASC',
		'posts_per_page'=> 4 
    );
	$safeguard_pix_author_posts = get_posts( $args );

	if(!empty($safeguard_pix_author_posts) && count($safeguard_pix_author_posts) > 2) :
  ?>
        <section class="about-autor ">
        
           <h3 class="widget-title"><span> <?php esc_html_e('author posts  ', 'safeguard') ?></span></h3>
           

          <div class="padding25">
            <div class="row">
              <?php foreach($safeguard_pix_author_posts as $safeguard_pix_apost){ ?>
              <?php $safeguard_pix_tumbnail = get_the_post_thumbnail( $safeguard_pix_apost->ID ) != '' ? get_the_post_thumbnail( $safeguard_pix_apost->ID ) : '<img src="'.esc_url(get_template_directory_uri()).'/images/noimage.jpg">'; ?>
              <div class="  col-lg-3 col-md-3  col-sm-6 col-xs-6   ">
                <div class="box-simple-image">                  
                 <a href="<?php echo esc_url(get_permalink( $safeguard_pix_apost->ID )); ?>"> <?php echo wp_kses_post($safeguard_pix_tumbnail); ?>  </a></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty($safeguard_pix_options['safeguard_pix_blog_show_comments']) && $safeguard_pix_options['safeguard_pix_blog_show_comments'] == 1) : ?>
        <div class="section-comment ">
          <?php comments_template(); ?>
          <?php $test = false; if ($test) {comment_form(); } ?>
        </div>
    <?php endif; ?>
        <?php endwhile; ?>
      </div>
      <?php if ($safeguard_pix_layout == '2'): require_once(get_template_directory() .'/template-parts/sidebar.php'); endif?>
    </div>
  </div>
</main>
<?php get_footer();?>
