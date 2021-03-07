<?php get_header(); ?>
<section class="titlebar ">
    <div class="row">
        <div>
            <h1 id="page-title" class="title"><?php echo esc_html__('404', 'compactor'); ?></h1>
        </div>

    </div>
</section>
<div class="row">
    <div class="not_found">
        <section>
            <h2 class="not_found__title">
                <?php echo esc_html__('Oops, This Page Could Not Be Found! ', 'compactor'); ?>

            </h2>
            <p class="not_found__message">
                <?php echo esc_html__('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. ', 'compactor'); ?>
            </p>
            <h1 class="not_found__404"><?php echo esc_html__('404 ', 'compactor'); ?></h1>
            <div class="not_found__search">
                <?php get_search_form(); ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer();