<article <?php post_class("wd-post wd-post--quote ".$post_class); ?>>
    <div class="wd-post__body">
        <i class="fa fa-quote-right"></i>
        <blockquote>
            <?php the_excerpt() ?>
        </blockquote>
        <div class="author">
            <?php echo esc_html__('Post By : ', 'compactor') ?>
            <span><?php the_author(); ?></span>
        </div>
    </div>
</article>