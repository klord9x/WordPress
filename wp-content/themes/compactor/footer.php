<?php if (is_active_sidebar('footer') || is_active_sidebar('footer_column_three') || is_active_sidebar('footer_column_tow') || is_active_sidebar('footer_column_four')) { ?>
  <section class="first-footer">
    <h3 class="hide"><?php echo esc_html__('Footer', 'compactor'); ?></h3>
    <div class="row">
      <section class="block">
				<?php
				if (compactor_get_option('footer_column', 'four_columns') == 'one_columns') {
					$column_one = 12;
					$column_tow = '';
					$column_three = '';
					$column_four = '';

				} elseif (compactor_get_option('footer_column', 'four_columns') == 'tow_a_columns') {
					$column_one = 6;
					$column_tow = 6;
					$column_three = '';
					$column_four = '';
				} elseif (compactor_get_option('footer_column', 'four_columns') == 'tow_b_columns') {
					$column_one = 4;
					$column_tow = 8;
					$column_three = '';
					$column_four = '';
				} elseif (compactor_get_option('footer_column', 'four_columns') == 'tow_c_columns') {
					$column_one = 8;
					$column_tow = 4;
					$column_three = '';
					$column_four = '';

				} elseif (compactor_get_option('footer_column', 'four_columns') == 'three_columns') {
					$column_one = 4;
					$column_tow = 4;
					$column_three = 4;
					$column_four = '';
				} else {
					$column_one = 3;
					$column_tow = 3;
					$column_three = 3;
					$column_four = 3;
				}
				?>
        <div class="large-<?php echo esc_attr($column_one) ?> medium-6 columns">
					<?php dynamic_sidebar('footer') ?>
        </div>
				<?php if (compactor_get_option('footer_column', 'four_columns') == 'tow_a_columns' or compactor_get_option('footer_column', 'four_columns') == 'four_columns' or compactor_get_option('footer_column', 'four_columns') == 'three_columns' or compactor_get_option('footer_column', 'four_columns') == 'tow_b_columns' or compactor_get_option('footer_column', 'four_columns') == 'tow_c_columns') { ?>
          <div class="large-<?php echo esc_attr($column_tow) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_tow') ?>
          </div>
				<?php } ?>

				<?php if (compactor_get_option('footer_column', 'four_columns') == 'three_columns' or compactor_get_option('footer_column', 'four_columns') == 'four_columns') { ?>
          <div class="large-<?php echo esc_attr($column_three) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_three') ?>
          </div>
				<?php } ?>

				<?php if (compactor_get_option('footer_column', 'four_columns') == 'four_columns') { ?>
          <div class="large-<?php echo esc_attr($column_four) ?> medium-6 columns">
						<?php dynamic_sidebar('footer_columns_four') ?>
          </div>
				<?php } ?>
      </section>
    </div>
  </section>
<?php } ?>

<footer class="second-footer">
  <div class="row">
    <div class="copyright medium-12 large-12 columns">
      <div class="block text-center">
				<?php
				$compactor_copyright = html_entity_decode(compactor_get_option('copyright_text', '&copy; 2020 Compactor All rights reserved. '));
				echo esc_html($compactor_copyright);
				?>
      </div>
    </div>
  </div>
</footer>
</div>

<?php
$compactor_style = compactor_get_option('wd_menu_style');
if ($compactor_style == "offcanvas") { ?>
  <a class="exit-off-canvas"></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>