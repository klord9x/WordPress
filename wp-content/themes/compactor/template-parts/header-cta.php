<?php
if (compactor_get_option('action_button') != "") { ?>
	<div class="header-cta show-for-large-up large-screen">
		<?php echo html_entity_decode(compactor_get_option('action_button')); ?>
	</div>
<?php }
