<?php
/**
 * The sidebar containing the main widget area
 *
 */
?>

<?php if (is_active_sidebar ('sidebar-2')) : ?>
	<aside class="large-4 small-12 sidebar-second columns sidebar sidebar-left">
			<?php dynamic_sidebar ('sidebar-2'); ?>
		</aside><!-- #secondary -->
<?php endif; ?>


