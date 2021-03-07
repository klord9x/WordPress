<?php function compactor_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>" class="wd-comment">
        <header class="wd-comment-author-img">
            <?php echo get_avatar($comment, $size = '90'); ?>
        </header>

        <?php if ($comment->comment_approved == '0') : ?>
            <div class="notice alert-box">
                <p class="bottom"><?php echo esc_html__('Your comment is awaiting moderation.', 'compactor') ?></p>
            </div>
        <?php endif; ?>

        <section class="wd-comment-text">
            <div class="comment-info">
                <div class="author-meta">
                    <?php printf('<h5 class="comment_name">%s</h5>', get_comment_author()) ?>
                    <time class="comment_date" datetime="<?php echo comment_date('c') ?>">
                        <?php printf(esc_html__('%1$s', 'compactor'), get_comment_date(), get_comment_time()) ?>
                    </time>
                    <?php edit_comment_link(esc_html__('(Edit)', 'compactor'), '', '') ?>
                </div>
            </div>
            <?php comment_text() ?>
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </section>
    </article>
<?php } ?>

<?php

if (post_password_required()) { ?>
    <section id="comments">
        <div class="notice alert-box">
            <p class="bottom"><?php echo esc_html__('This post is password protected. Enter the password to view comments.', 'compactor'); ?></p>
        </div>
    </section>
    <?php
    return;
}
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if (have_comments()) : ?>
    <section id="comments">
        <h4 class="comments_title"><?php echo esc_html__('Comments', 'compactor'); ?></h4>
        <ol class="commentlist">
            <?php wp_list_comments('callback=compactor_comments'); ?>

        </ol>
        <footer>
            <nav id="comments-nav">
                <div
                    class="comments-previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'compactor')); ?></div>
                <div
                    class="comments-next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'compactor')); ?></div>
            </nav>
        </footer>
    </section>
<?php else : // this is displayed if there are no comments so far ?>
    <?php if (comments_open()) : ?>
    <?php else : // comments are closed ?>
        <section id="comments">
            <div class="notice alert-box">
                <p class="bottom"><?php echo esc_html__('Comments are closed.', 'compactor') ?></p>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php if (comments_open()) : ?>

    <?php if (compactor_get_option('comment_registration') && !is_user_logged_in()) { ?>
        <p><?php printf(esc_html__('You must be <a href="%s">logged in</a> to post a comment.', 'compactor'), wp_login_url(get_permalink())); ?></p>
    <?php } else {
        $fields = array(
            'author' =>
                '<p class="comment-form-author"><input type="text" placeholder="' . esc_attr__('Name', 'compactor') . '" required class="five" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ></p>',
            'email' =>
                '<p class="comment-form-email"> <input type="text" placeholder="' . esc_attr__('E-mail', 'compactor') . '" required class="five" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="2" ></p>',
            'url' =>
                '<p class="comment-form-url">  <input type="text" placeholder="' . esc_attr__('Website', 'compactor') . '" required class="five" name="url" id="url" value="' . esc_attr($comment_author_url) . '" size="22" tabindex="3"></p>',
        );
        $args = array(
            'class_submit' => 'submit',
            'label_submit' => esc_html__('Post Comment', 'compactor'),
            'title_reply' => esc_html__('Post a Comment', 'compactor'),
            'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
            'title_reply_after' => '</h4>',
            'comment_notes_before' => '',
            'fields' => apply_filters('comment_form_default_fields', $fields),
            'comment_field' => '<p class="comment-form-comment"><textarea id="comment" placeholder="' . esc_attr__('Comment', 'compactor') . '" name="comment" cols="45" rows="4" aria-required="true">' .
                '</textarea></p>',
        ); ?>
        <?php comment_form($args);
    } ?>


<?php endif; // if you delete this the sky will fall on your head ?>