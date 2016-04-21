<?php

/*************** PORTFOLIO POST-TYPES  *****************/



add_action('save_post', 'safeguard_pix_save_details');
function safeguard_pix_save_details(){

	global $post;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;
		
    if (isset($_POST['safeguard_pix_hidden_flag'])) {
	
		$custom_meta_fields = array(
			'_safeguard_pix_sidebar_pos',
			'_page_portfolio_cat',
			'_page_portfolio_num_items_page',
			'_portfolio_type',
			'_safeguard_pix_sidebar_post',
			'_safeguard_pix_post_head',
			'_safeguard_pix_post_slider',
			'_safeguard_pix_promotext',
			'_portfolio_no_lightbox',
			'_portfolio_link',
			'_portfolio_video',
			'_portfolio_featured',
			'_blog_videoap',
			'_blog_video',
			'_blog_mediatype'
		);
		
			
		foreach( $custom_meta_fields as $custom_meta_field ){
			if(isset($_POST[$custom_meta_field]) )
			{
				if(is_array($_POST[$custom_meta_field]))
				{
					$cats = '';
					foreach($_POST[$custom_meta_field] as $cat){
						$cats .= $cat . ",";
					}
					$data = substr($cats, 0, -1);
					update_post_meta($post->ID, $custom_meta_field, $data);
				}
				else
				{
					update_post_meta($post->ID, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])) );
				}
			}
			else
			{
				delete_post_meta($post->ID, $custom_meta_field);
			}
		}
	
	}
}

function safeguard_pix_post_options($value){
	global $post;
?>

	<div class="option-item" id="<?php echo esc_attr($value['id']) ?>-item">
		<span class="label"><?php  echo wp_kses_post($value['name']); ?></span>
	<?php
		$id = $value['id'];
		$get_meta = get_post_custom($post->ID);
		$meta_box_value = get_post_meta($post->ID, $id, true);
		if( isset( $get_meta[$id][0] ) )
			$current_value = $get_meta[$id][0];
			
	switch ( $value['type'] ) {
		
		case 'text': ?>
			<input  name="<?php echo esc_attr($value['id']); ?>" id="<?php  echo esc_attr($value['id']); ?>" type="text" value="<?php echo (isset($current_value) && !empty( $current_value )) ? esc_attr($current_value) : '' ?>" />
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif?>
		<?php 
		break;

		case 'checkbox':
			if(isset($current_value) && !empty( $current_value ) ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
				<input type="checkbox" name="<?php echo esc_attr($value['id']) ?>" id="<?php echo esc_attr($value['id']) ?>" value="true" <?php echo wp_kses_post($checked); ?> />	
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif?>		
		<?php	
		break;
		
		case 'select':
		?>
			<select name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>">
				<?php foreach ($value['options'] as $key => $option) { ?>
				<option value="<?php echo esc_attr($key) ?>" <?php if (isset($current_value) && !empty( $current_value ) && $current_value == $key) { echo ' selected="selected"' ; } ?>><?php echo wp_kses_post($option); ?></option>
				<?php } ?>
			</select>
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif?>
		<?php
		break;
		
		case 'textarea':
		?>
			<textarea style="direction:ltr; text-align:left; width:430px;" name="<?php echo esc_attr($value['id']); ?>" id="<?php echo esc_attr($value['id']); ?>" type="textarea" cols="100%" rows="3" tabindex="4"><?php echo isset($current_value) ? $current_value : ''  ?></textarea>
			<?php if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif?>
		<?php
		break;
		
		case 'slider':
			if ($meta_box_value == '') $meta_box_value = 9;  
			echo '
			<script type="text/javascript">		
			jQuery(document).ready(function () {
				"use strict";
				jQuery( "#'.esc_js($value['id']).'-slider" ).slider({ 
					value: '.esc_js($meta_box_value).', 
					min: '.esc_js($value['min']).', 
					max: '.esc_js($value['max']).', 
					step: '.esc_js($value['step']).', 
					slide: function( event, ui ) { 
						jQuery( "#'.esc_js($value['id']).'" ).val( ui.value ); 
					} 
				});
			});
			</script>';  
			
			echo '<div id="'.esc_attr($value['id']).'-slider" class="slider-container"></div>
			<input type="text" name="'.esc_attr($value['id']).'" id="'.esc_attr($value['id']).'" value="'.esc_attr($meta_box_value).'" size="5" class="minimal-textbox custom-tm" />
			<div class="clear"></div>';
			if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif;
		break;
		
		case 'portfolio_cat':
			// Get the categories first
			$args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0' );
			$categories = get_categories( $args ); 
			
			$selected_cats = explode( ",", $meta_box_value );
			
			echo '<ul class="portfolio-listing">';

			// Loop through each category
			foreach ($categories as $category) {
											
				foreach ($selected_cats as $selected_cat) {
					if($selected_cat == $category->cat_ID){ $checked = 'checked="checked"'; break; } else { $checked = ""; }
				}
				
				echo '<li>
					<input style="width: 14px;" type="checkbox" id="pcategory' . esc_attr($category->cat_ID) . '" name="' . esc_attr($value[ 'id' ]) . '[]" value="' . esc_attr($category->cat_ID) . '" ' . $checked . ' />
					<label for="pcategory'.esc_attr($category->cat_ID).'" class="inline">' . $category->name . '</label>
					</li>';
			}
			
			echo '</ul>';
			if (isset($value ['hint'])):?><a href="#" class="mo-help tooltip" title="<?php echo esc_attr($value ['hint'])?>"></a><?php endif;
		break;
		
	
	} ?>
	</div>
<?php
}


/* создаем мета бокс для layout */
add_action( 'add_meta_boxes', 'safeguard_pix_layout_side' );
function safeguard_pix_layout_side() {
	add_meta_box(
		'safeguard_pix_layout_side',
		'Page Layout',
		'safeguard_pix_layout_side_content',
		null,
		'side', /* место размещения */
		'default'
	);
}

/* добавляем на страницу каталога новое поле контента для галереи*/
function safeguard_pix_layout_side_content( $post ) {
	echo '<p><strong>Page Layout</strong></p><p><select class="rwmb-select" name="page_layout" />';
	$sel_l = get_post_meta($post->ID, 'page_layout', 1);
	echo '	<option value="" '.esc_attr(selected( $sel_l, '' )).' >Default</option>
			<option value="layout-wide" '.esc_attr(selected( $sel_l, 'layout-wide' )).' >Wide</option>
			<option value="layout-boxed" '.esc_attr(selected( $sel_l, 'layout-boxed' )).' >Boxed</option>
		</select></p>';
		
	echo '<input type="hidden" name="extra_fields_nonce" value="'.esc_attr(wp_create_nonce(__FILE__)).'" />';		
}

/* сохраняем изменения  */
add_action( 'save_post', 'safeguard_pix_layout_side_save' );
function safeguard_pix_layout_side_save( $post_id ) {
	if ( !empty($_POST['extra_fields_nonce']) && !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // выходим если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // выходим если юзер не имеет право редактировать запись

	if( !isset($_POST['header_type']) && !isset($_POST['header_sticky']) && !isset($_POST['page_layout']) ) return false;	// выходим если данных нет

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['page_layout'] = trim($_POST['page_layout']);
	
	if( empty($_POST['page_layout']) ){
		delete_post_meta($post_id, 'page_layout'); // удаляем поле если значение пустое
	}else{
		update_post_meta($post_id, 'page_layout', $_POST['page_layout']); // add_post_meta() работает автоматически
	}

	return $post_id;
}

?>