<?php

function safeguard_pix_add_adminpanel() {
	
	global $options;
	$upload_tracking = array();
	$options_array = array();
	
	
	if (isset($_REQUEST['caction']) && $_REQUEST['caction'] == 'save') {
		foreach($options as $value) {
			if (isset($value['id']) && isset($_REQUEST[$value['id']])) {
				if (!preg_match("/^[\s]{1,1000}$/D", $_REQUEST[$value['id']])) {
					$options_array[$value['id']] = stripslashes($_REQUEST[$value['id']]);
				}
			}

			// Upload
			if ($value['type'] == 'upload') {
				$id = $value['id'];
				$override['test_form'] = false;
				$override['action'] = 'save';
				if (!empty($_FILES['attachment_' . $id]['name'])) {
					$file = wp_handle_upload($_FILES['attachment_' . $id], $override);
					$file['upload_name'] = $value['name'];
					$upload_tracking[] = $file;

					// Check if not error
					if (!isset($file['error'])) {

						// Update option
						$options_array[$id] = $file['url'];
						// Add attachment
						add_attachment($file);
					}
				}
				elseif (empty($_FILES['attachement_' . $id]['name']) && $_REQUEST[$id] != '') {
					$options_array[$value['id']] = $_REQUEST[$value['id']];
				}
			}

			update_option('safeguard_pix_tracking', $upload_tracking);
		}
		update_option('safeguard_pix_general_settings', $options_array);
		$qstr = preg_split("/\?/", $_SERVER['REQUEST_URI']);
		header("Location: http://".$_SERVER['HTTP_HOST'].$qstr[0]."?page=adminpanel&saved=true");

	}
		
	// Load admin menu
	get_template_part('library/admin/admin-panel/menu');

}
// Load modules
get_template_part('library/admin/admin-panel/general-settings');


/** Attachments **/
function add_attachment($file) {
	
	$url = $file['url'];
	$type = $file['type'];
	$file = $file['file'];
	$filename = basename($file);

	// Construct the attachment array
	$attachment = array(
		'post_title' => $filename,
		//'post_content' => $descr,
		'post_type' => 'attachment',
		//'post_parent' => $post,
		'post_mime_type' => $type,
		'guid' => $url
	);

	// Save the data
	$id = wp_insert_attachment($attachment, $file, $post='');
	if (preg_match('!^image/!', $attachment['post_mime_type'])) {
		$imagesize = getimagesize($file);
		$imagedata['width'] = $imagesize['0'];
		$imagedata['height'] = $imagesize['1'];
		list($uwidth, $uheight) = wp_constrain_dimensions($imagedata['width'], $imagedata['height']);
		$imagedata['hwstring_small'] = "height='$uheight' width='$uwidth'";
		$imagedata['file'] = $file;
		add_post_meta($id, '_wp_attachment_metadata', $imagedata);
	}
}

/*** CONSTRUCTOR ***/

function adminpanel_contructor($options) {
	
	$get_options = get_option('safeguard_pix_general_settings');
	foreach($options as $value) {
		$id = isset($value['id']) ? $value['id'] : '';
		switch ($value['type']) {
				case 'open' : ?>
		<div id="<?php echo esc_attr($value['tab_id']); ?>">
		<?php 
			break; 
			case 'close' :
		?>
		</div>
<!-- ////////////////////////// UPLOAD ////////////////////////// -->
<?php
	break;
	case 'toggle':
?>	
	<h2 class="toggle-trigger"><a href="#" class="tr"><?php echo wp_kses_post($value['item_name']); ?></a></h2> 
			<div class="toggle-container"> 
				<div class="block"> 
<?php	
	break;
	case 'toggle_close':
?>	
		</div> 
	</div> 
<?php	
	break;
	case 'upload':
?>
<div>
	<div class="safeguard_pix_input">
		<div class="r-upload">
			<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
			<input type="file" name="attachment_<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>"/>
		</div>
		<div>
		<label for="<?php echo esc_attr($value['id']); ?>">&nbsp;</label>
		<input name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="text" value="<?php if (isset($get_options[$id]) && $get_options[$id] != '') echo stripslashes($get_options[$id]); else echo esc_attr($value['std']) ?>" class="inputs"/>
		<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
		</div>
		<div style="margin-top:20px">
		<?php if (isset($get_options[$id]) && !empty($get_options[$id])) : ?>
			<label for=""><?php esc_html_e('Preview', 'safeguard') ?></label>
			<a href="<?php echo esc_url($get_options[$id]); ?>"><img src="<?php echo esc_url($get_options[$id]) ?>" alt="<?php esc_attr_e('Preview', 'safeguard') ?>" style="max-width:250px" /></a>
			<div class="clearfix"></div>
		<?php endif; ?>
		
		</div>
	</div>
</div>

<!-- Textboxes -->
<?php
	break;
	case 'text':
?>
<div class="safeguard_pix_input safeguard_pix_text">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	<input name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="text" value="<?php if (isset($get_options[$id]) && $get_options[$id] != '') echo (esc_attr($get_options[$id])); else echo (isset ($value['std']) ? esc_attr($value['std']) : ''); ?>" class="inputs"/>
	<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
</div>

<!-- ////////////////////////// COLOR ////////////////////////// -->
<?php
	break;
	case 'color':
?>
<div class="safeguard_pix_input">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	<input name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="text" value="<?php if (isset($get_options[$id]) && $get_options[$id] != '') echo stripslashes($get_options[$id]); else echo esc_attr($value['std']) ?>" class="inputs color-picker"/>
	<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
</div>

<!-- checkboxes -->
<?php
	break;
	case 'checkbox':
?>
<div class="safeguard_pix_input safeguard_pix_checkbox">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	
  	<?php
	if (isset($get_options[$id]) && $get_options[$id]) {
		$checked = 'checked="checked"';
	}
	else {
		$checked = '';
	} 
	if (isset($value['default'])){
		if (!isset($get_options[$id]) && $value['default'] == true){
			$checked = 'checked="checked"';			
		}
	}
	
	?>
	<div class="check-box">
    	<input type="checkbox" name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" value="true" <?php echo wp_kses_post($checked); ?> />
  	</div>
	<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
</div>

<!-- Select Box -->
<?php
	break;
	case 'select':
?>
<div class="safeguard_pix_input safeguard_pix_select">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	<select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" size="1" >
	    <?php
		foreach($value['options'] as $option) {
		if ($get_options[$id] == $option['value']) $selected = 'selected="selected"';
		else $selected = '';
		echo "<option $selected value='" . esc_attr($option['value']) . "'>" . $option['text'] . "</option>";
		} ?>
	</select>
  	<small><?php echo isset ($value['desc']) ? $value['desc'] : ''; ?></small><div class="clearfix"></div>
</div>

<?php
	break;
	case 'background':
?>
            
    <div class="safeguard_pix_input safeguard_pix_select">
        <label for="<?php echo esc_attr($value['id']); ?>" style="width:100%; float:none; margin-bottom:10px"><?php echo wp_kses_post($value['name']); ?></label>
        <p style="margin-bottom:20px"><?php echo wp_kses_post($value['desc']); ?></p>
        <div class="backgrounds">                	
		    <?php foreach ($value['options'] as $option) :
				if ($get_options[$id] == $option) $checked = 'checked="checked"';
				else $checked = '';
		 	?>
		       	<div class="skin-background">
        	   		<img src="<?php echo get_template_directory_uri() ?>/img/backgrounds/<?php echo esc_attr($option)?>"  />
        	   		<table>
	        	   		<tr>
		        	   		<td><label for="<?php echo esc_attr($option); ?>"><?php echo wp_kses_post($option); ?></label></td>
		        	   		<td>
		        	   			<input type="radio" <?php echo wp_kses_post($checked)?> name="<?php echo esc_attr($value['id']); ?>" value="<?php echo esc_attr($option); ?>" id="<?php echo esc_attr($value['id']); ; ?>" <?php if (get_option( $value['id'] ) == $option) { echo 'checked="checked"'; } ?> />
		        	   		</td>
	        	   		</tr>
        	   		</table>
        	   </div>
			
    		<?php endforeach; ?>
        </div>
        <div class="clear"></div>
     
    </div>


<!-- ////////////////////////// SELECT CATEGORY ////////////////////////// -->
<?php
	break;
	case 'select_category':
?>
<div class="safeguard_pix_input safeguard_pix_select">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	<select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" size="1" class="r-select">
    <option value="_all"<?php if ($get_options[$id] == '_all'): ?> selected="selected" <?php endif; ?>>All</option>
		<?php
		foreach((get_categories()) as $category) {
			if ($category->term_id == $get_options[$id]) {
				$selected = "selected=\"selected\"";
			} else { 
				$selected = "";
			}
		echo "<option $selected value=\"" . $category->term_id . "\">" . $category->cat_name . "</option>" . "\n";
		} ?>
	</select>
  	<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
</div>

<!-- TextAreas -->
<?php
	break;
	case 'textarea':
?>
<div class="safeguard_pix_input">
	<label for="<?php echo esc_attr($value['id']); ?>"><?php echo wp_kses_post($value['name']); ?></label>
	<textarea name="<?php echo esc_attr($value['id']); ?>" type="<?php echo esc_attr($value['type']); ?>" cols="" rows=""><?php if (isset($get_options[$id]) && $get_options[$id] != '') echo stripslashes($get_options[$id]); else echo wp_kses_post($value['std']) ?></textarea>
	<small><?php echo wp_kses_post($value['desc']); ?></small><div class="clearfix"></div>
</div>
<?php
	break;
	
		}
	}
}
// Add admin menu
 add_action('admin_menu', 'safeguard_pix_add_adminpanel'); 
?>
