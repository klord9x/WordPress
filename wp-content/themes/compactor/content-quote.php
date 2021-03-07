<article <?php post_class(); ?>>
    <div class="wd-post__body">
        <i class="fas fa-quote-right"></i>
        <blockquote>
            <?php the_excerpt() ?>
        </blockquote>
        <div class="author">
            <?php echo esc_html__('Post By : ', 'compactor') ?>
            <span><?php the_author(); ?></span>
        </div>
    </div>

</article>