<?php
/**
 * The template for displaying search forms in Compactor
 *
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ) ?>" class="searchform" method="get" role="search">
	<div class="form-group">
		<input type="text" id="s" class="form-control" name="s" placeholder="<?php echo esc_attr__('Search...','compactor') ?>">
		<button type="submit" value="<?php echo esc_attr__('Search...','compactor') ?>" id="searchsubmit">  </button>
	</div>
</form>


