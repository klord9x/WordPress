<?php
/*** The template for displaying comments ***/
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) : ?>

<p class="nocomment">
  <?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'safeguard' ); ?>
</p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>
<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
 <h3 class="widget-title"><span>
  <?php esc_html_e( 'Comments', 'safeguard' ); ?>
  <a href="#comments">(<?php echo get_comments_number(); ?>)</a></span></h3>
  

  
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
<div class="navigation">
  <div class="nav-previous">
    <?php previous_comments_link( wp_kses_post(__( '<span class="meta-nav">&larr;</span> Older Comments', 'safeguard' ) )); ?>
  </div>
  <div class="nav-next">
    <?php next_comments_link( wp_kses_post(__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'safeguard' ) )); ?>
  </div>
</div>
<!-- .navigation -->
<?php endif; ?>
<ul class="comments-list unstyled clearfix">
  <?php wp_list_comments('callback=safeguard_pix_comment'); ?>
</ul>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
<div class="navigation">
  <div class="nav-previous">
    <?php previous_comments_link( wp_kses_post(__( '<span class="meta-nav">&larr;</span> Older Comments', 'safeguard' ) )); ?>
  </div>
  <div class="nav-next">
    <?php next_comments_link( wp_kses_post(__( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'safeguard' ) )); ?>
  </div>
</div>
<!-- .navigation -->
<?php endif; // check for comment navigation ?>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments">
  <?php esc_html_e( 'Comments are closed.', 'safeguard' ); ?>
</p>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>

 <h3 class="widget-title"><span><i class="fa flaticon-wrench44"></i>
    <?php comment_form_title( 'Leave a Comment', 'Leave a Reply to %s' ); ?>
    </span> </h3>
  <div class="cancel-comment-reply bottom10">
    <?php cancel_comment_reply_link(); ?>
  </div>
  <div class="padding25">
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p class="bottom20">
      <?php esc_html_e('You must be', 'safeguard')?>
      <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">
      <?php esc_html_e('logged in', 'safeguard')?>
      </a>
      <?php esc_html_e('to post a comment.', 'safeguard')?>
    </p>
    <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="ui-form " >
      <?php if ( $user_ID ) : ?>
      <div class="row ">
        <div class="col-xs-12 col-sm-12">
          <p class="bottom20">
            <?php esc_html_e('Logged in as', 'safeguard')?>
            <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php"><?php echo wp_kses_post($user_identity); ?></a>. <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_html_e('Log out of this account', 'safeguard')?>"> </a>
            <?php esc_html_e('Log out', 'safeguard')?>
          </p>
        </div>
      </div>
      <?php else : ?>
      
      
      <fieldset>
       <div class="row ">
     <div class="col-lg-6">
                  <div class="input-group "> 
            <input class="input-text" type="text" name="author" id="author" placeholder="<?php esc_html_e('Name', 'safeguard')?>" title="<?php esc_html_e('Name', 'safeguard')?>" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
          </div></div>
          
          <div class="col-lg-6">
                  <div class="input-group "> 
            <input  class="input-text"  type="text" name="email" id="email" placeholder="<?php esc_html_e('Email', 'safeguard')?>" title="<?php esc_html_e('Email', 'safeguard')?>" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
      </div></div></div>
               <div class="row"> 
      </div>
      </fieldset>
      
      
      
      <?php endif; ?>
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="input-group">
            <textarea   class=" <?php if ( $user_ID ) : ?>    ta-login   <?php else : ?>   ta-not-login <?php endif; ?>" name="comment"  placeholder="<?php esc_html_e('Your Message *', 'safeguard')?>" title="<?php esc_html_e('Comment', 'safeguard')?>" id="comment"  tabindex="4"></textarea><i class="icon icon-bubbles"></i>
          </div>
        </div>
      </div>
       <div class="row"> <div class="  col-xs-12 col-sm-12 text-right">
       
       <button type="submit" class="btn btn-primary "><?php esc_html_e( 'Send Message.', 'safeguard' ); ?>  </button>
       
       
      
        
        </span></button>
      </div>  </div>
      <?php comment_id_fields(); ?>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php endif; // If registration required and not logged in ?>
  </div>

<?php endif;  ?>
