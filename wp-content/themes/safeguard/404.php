<?php /*** The template for displaying 404 pages (not found) ***/ ?>

<?php get_header();?>



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <section role="main" class="main-content page-404">
          <h1 class="notfound_title">
            <?php esc_html_e('Page not found', 'safeguard')?>
          </h1>
          <p class="notfound_description">
            <?php esc_html_e('The page you are looking for seems to be missing.Go back, or return to yourcompany.com to choose a new direction.Please report any broken links to our team.', 'safeguard')?>
          </p>
          <a class="button notfound_button" href="javascript: history.go(-1)">
          <?php esc_html_e('Return to previous page', 'safeguard')?>
          </a> </section>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
