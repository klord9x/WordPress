<?php
if (!class_exists('compactor_myCustomFields')) {

	class compactor_myCustomFields {
		/**
		 * @var  string $compactor_prefix The compactor_prefix for storing custom fields in the postmeta table
		 */
		var $compactor_prefix = '';
		/**
		 * @var  array $compactor_postTypes An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
		 */
		var $compactor_postTypes = array("page", "post", "portfolio", "testimonials", "testimonials", "team-member", "wd-team-member");
		/**
		 * @var  array $customFields Defines the custom fields available
		 */
		var $compactor_customFields = array();


		function __construct() {
			add_action('admin_menu', array(&$this, 'compactor_createCustomFields'));
			add_action('save_post', array(&$this, 'compactor_saveCustomFields'), 1, 2);
			// Comment this line out if you want to keep default custom fields meta box
			add_action('do_meta_boxes', array(&$this, 'compactor_removeDefaultCustomFields'), 10, 3);

			$this->compactor_customFields = array(

				// ---------------------Pages---------------------

				array(
					"name" => "wd_one_page",
					"title" => esc_html__("One Page", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "checkbox",
					"values" => array(
						"yes" => "Yes",
						"no" => "No"
					),
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_show_title_area",
					"title" => esc_html__("Show title area", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "selectbox",
					"values" => array(
						"yes" => "Yes",
						"no" => "No"
					),
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_title_area_style",
					"title" => esc_html__("Title area style", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "selectbox",
					"values" => array(
						"standard" => "Standard Style",
						"advanced" => "Advanced Style"
					),
					"scope" => array(""),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_title_area_bg_color",
					"title" => esc_html__("Title area background color", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "colorpicker",
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_title_area_bg_img",
					"title" => esc_html__("Title area background image", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "image-title-image",
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_show_title",
					"title" => esc_html__("Show title", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "selectbox",
					"values" => array(
						"yes" => "Yes",
						"no" => "No"
					),
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_title_position",
					"title" => esc_html__("Title position", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "selectbox",
					"values" => array(
			      "left" => "Left",
						"center" => "center",
						"right" => "right"
					),
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_page_title_color",
					"title" => esc_html__("Title color", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "colorpicker",
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "bg-parallax",
					"title" => esc_html__("show background parallax", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "checkbox",
					"values" => array(
						"no" => "No",
						"yes" => "Yes"
					),
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "bg-parallax-text",
					"title" => esc_html__("background parallax text", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "short-text-200",
					"scope" => array("page"),
					"capability" => "manage_options",
					"dependency" => ''
				),

				// ---------------------Pages/>---------------------
				// ---------------------Team---------------------
				array(
					"name" => "job_title",
					"title" => esc_html__("Job title", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("team-member"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "team-facebook",
					"title" => esc_html__("Facebook Url", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("team-member"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "team-instagram",
					"title" => esc_html__("Instagram Url", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("team-member"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "team-twitter",
					"title" => esc_html__("Twitter Url", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("team-member"),
					"capability" => "manage_options",
					"dependency" => ""
				),

				// ---------------------team/>---------------------


				// ---------------------testimonail---------------------
				array(
					"name" => "job_title",
					"title" => "Job title",
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("testimonials"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "title_bg_img",
					"title" => esc_html__("Section background image", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "image-title-image",
					"scope" => array("testimonials"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				// ---------------------testimonail/>---------------------
				// ---------------------video---------------------
				array(
					"name" => "video_type",
					"title" => esc_html__("Video type", 'compactor'),
					"description" => "",
					"float_left" => "yes",
					"clear_after" => "",
					"type" => "selectbox",
					"values" => array(
						"youtube" => "Youtube",
						"vimeo" => "Vimeo",
						"self_hosted" => "Self Hosted"
					),
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_youtube_link",
					"title" => esc_html__("youtube link", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_youtube_link",
					"title" => esc_html__("youtube link", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_vimeo_id",
					"title" => esc_html__("vimeo", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_video_webm",
					"title" => esc_html__("Video webm", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_video_mp4",
					"title" => esc_html__("Video mp4", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),
				array(
					"name" => "wd_video_ogv",
					"title" => esc_html__("Video ogv", 'compactor'),
					"description" => "",
					"float_left" => "",
					"clear_after" => "",
					"type" => "text",
					"scope" => array("post"),
					"capability" => "manage_options",
					"dependency" => ""
				),


				// ---------------------video/>---------------------

			);

		}

		/**
		 * Remove the default Custom Fields meta box
		 */
		function compactor_removeDefaultCustomFields($type, $context, $post) {
			foreach (array('normal', 'advanced', 'side') as $context) {
				foreach ($this->compactor_postTypes as $postType) {
					remove_meta_box('postcustom', $postType, $context);
				}
			}
		}

		/**
		 * Create the new Custom Fields meta box
		 */
		function compactor_createCustomFields() {
			if (function_exists('add_meta_box')) {
				foreach ($this->compactor_postTypes as $postType) {
					if ($postType == "page") {
						add_meta_box('my-custom-fields', esc_html__('Title page options', 'compactor'), array(&$this, 'compactor_displayCustomFields'), 'page', 'advanced', 'high');
					}
					if ($postType == "team-member") {
						add_meta_box('my-custom-fields', esc_html__('Team informations', 'compactor'), array(&$this, 'compactor_displayCustomFields'), 'team-member', 'advanced', 'high');
					}
					if ($postType == "wd-team-member") {
						add_meta_box('my-custom-fields', esc_html__('Team Member informations', 'compactor'), array(&$this, 'compactor_displayCustomFields'), 'wd-team-member', 'advanced', 'high');
					}
					if ($postType == "testimonials") {
						add_meta_box('my-custom-fields', esc_html__('Testimonials image', 'compactor'), array(&$this, 'compactor_displayCustomFields'), 'testimonials', 'advanced', 'high');
					}

					if ($postType == "post") {
						add_meta_box('my-custom-fields', esc_html__('Video post format', 'compactor'), array(&$this, 'compactor_displayCustomFields'), 'post', 'advanced', 'high');
					}
				}
			}
		}

		/**
		 * Display the new Custom Fields meta box
		 */


		function compactor_displayCustomFields() {
			global $post;
			global $wdoptions_proya;
			global $compactor_fontArrays;
			?>
      <div class="form-wrap">
				<?php
				wp_nonce_field('my-custom-fields', 'my-custom-fields_wpnonce', false, true);
				foreach ($this->compactor_customFields as $customField) {
					// Check scope
					$scope = $customField['scope'];
					$dependency = $customField['dependency'];
					$output = false;
					foreach ($scope as $scopeItem) {
						switch ($scopeItem) {
							default:
								{
									if ($post->post_type == $scopeItem) {
										if ($dependency != "") {
											foreach ($dependency as $dependencyKey => $dependencyValue) {
												foreach ($dependencyValue as $dependencyVal) {
													if (isset($wdoptions_proya[$dependencyKey]) && $wdoptions_proya[$dependencyKey] == $dependencyVal) {
														$output = true;
														break;
													}
												}
											}
										} else {
											$output = true;
										}
									} else {
										break;
									}
								}
						}
						if ($output) break;
					}
					// Check capability
					if (!current_user_can($customField['capability'], $post->ID))
						$output = false;
					// Output if allowed
					if ($output) { ?>
						<?php
						switch ($customField['type']) {
							case "checkbox":
								{
									// Checkbox
									if ($customField['float_left'] == 'yes') {
										$float_left = 'float_left';
									} else {
										$float_left = '';
									}
									echo '<div class="form-field ' . $float_left . ' form-required">';
									echo '<label for="' . $this->compactor_prefix . $customField['name'] . '" style="display:inline;"><b>' . $customField['title'] . '</b></label>&nbsp;&nbsp;';
									echo '<input type="checkbox" name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" value="yes"';
									if (get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true) == "yes")
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '</div>';
									break;
								}

						case "selectbox": {
							// Selectbox
							if ($customField['float_left'] == 'yes') {
								$float_left = 'float_left';
							} else {
								$float_left = '';
							}
							echo '<div class="form-field ' . $float_left . ' form-required">';
							echo '<label for="' . $this->compactor_prefix . $customField['name'] . '" style="display:inline;"><b>' . $customField['title'] . '</b></label>&nbsp;&nbsp;';
							echo '<select name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '"> ';
							?>
							<?php foreach ($customField['values'] as $valuesKey => $valuesValue) { ?>
              <option value="<?php echo esc_attr($valuesKey); ?>" <?php if (get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true) == $valuesKey) { ?> selected="selected" <?php } ?>><?php echo esc_attr($valuesValue); ?></option>
						<?php } ?>

						<?php
						echo '</select>';
						echo '</div>';
						break;
						}
						case "selectbox-category":
							{
								$categories = get_categories();
								if ($customField['float_left'] == 'yes') {
									$float_left = 'float_left';
								} else {
									$float_left = '';
								}
								echo '<div class="form-field ' . $float_left . ' form-required">';
								echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>&nbsp;&nbsp;';
								echo '<select name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '"> ';
								echo '<option value=""></option>';
								foreach ($categories as $category) :
									echo '<option value="' . $category->term_id . '"';
									if (get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true) == $category->term_id) {
										echo 'selected="selected"';
									}
									echo '>';
									echo esc_attr($category->name);
									?>&nbsp;&nbsp;&nbsp;<?php
									echo '</option>';

								endforeach;
								echo '</select>';
								echo '</div>';
								break;
							}
						case "image-title-image": {
						wp_enqueue_media();

						?>
              <script type="text/javascript">
                jQuery(document).ready(function ($) {

                  jQuery('.upload_button').click(function () {
                    wp.media.editor.send.attachment = function (props, attachment) {
                      jQuery('.title_image').val(attachment.url);
                    }
                    wp.media.editor.open(this);

                    return false;
                  });

                });
              </script>

						<?php

						if ($customField['float_left'] == 'yes') {
							$float_left = 'float_left';
						} else {
							$float_left = '';
						}
						echo '<div class="form-field ' . $float_left . ' form-required">';
						$wd_page_bg_img = get_post_meta($post->ID, 'wd_page_title_area_bg_img', true);
						//print $wd_page_bg_img;
						echo '<label for="' . $this->compactor_prefix . $customField['name'] . '" style="display:inline;"><b>' . $customField['title'] . '</b></label>&nbsp;&nbsp;';
						echo '<div class="image_holder"><input type="text" id="' . $this->compactor_prefix . $customField['name'] . '" name="' . $this->compactor_prefix . $customField['name'] . '" class="title_image" value="' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '" /><input class="upload_button button-primary" type="button" value="Upload file"></div>';
						echo '</div>';
						break;
						}
						case "font-family": {
						// Selectbox
						if ($customField['float_left'] == 'yes') {
							$float_left = 'float_left';
						} else {
							$float_left = '';
						}
						echo '<div class="form-field ' . $float_left . ' ">';
						echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>&nbsp;&nbsp;';
						echo '<select name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '"> ';
						?>
              <option value="" <?php if (get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true) == "-1") { ?> selected="selected" <?php } ?>>
                Default
              </option>
							<?php foreach ($compactor_fontArrays as $compactor_fontArray) { ?>
              <option <?php if (get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true) == str_replace(' ', '+', $compactor_fontArray["family"])) {
								echo "selected='selected'";
							} ?> value="<?php echo str_replace(' ', '+', $compactor_fontArray["family"]); ?>"><?php echo $compactor_fontArray["family"]; ?></option>
						<?php } ?>
						<?php
						echo '</select>';
						echo '</div>';
						break;
						}
						case "colorpicker": {


						add_action('load-widgets.php', 'wd_load_color_picker');
						wp_enqueue_style('wp-color-picker');
						wp_enqueue_script('wp-color-picker');
						//Colorpicker
						wp_enqueue_media();

						wp_enqueue_script('wp-color-picker');
						wp_enqueue_style('wp-color-picker');

						wp_enqueue_script('colorpick', get_template_directory_uri() . "/inc/js/bootstrap-colorpicker.min.js", array('jquery'));
						wp_enqueue_style('colorpick', get_template_directory_uri() . "/inc/css/bootstrap-colorpicker.min.css");

						?>
              <script type="text/javascript">
                jQuery(document).ready(function ($) {

                  $('.wd-color-picker').colorpicker(
                    {format: 'rgba'}
                  );

                  jQuery('#wd_upload_btn').click(function () {
                    wp.media.editor.send.attachment = function (props, attachment) {
                      jQuery('#wd_logo_filed').val(attachment.url);
                    }
                    wp.media.editor.open(this);

                    return false;
                  });

                });
              </script>

						<?php


						if ($customField['float_left'] == 'yes') {
							$float_left = 'float_left';
						} else {
							$float_left = '';
						}
						echo '<div class="form-field ' . $float_left . ' colorpicker_input">';
						echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>';
						echo '<div class="colorSelector"><div style="background-color:' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '"></div></div>';
						echo '<input type="text" class="wd-color-picker" data-default-color="#C0392B" name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '" size="10" maxlength="10" />';
						echo '</div>';
						break;
						}
						case "textarea":
						case "wysiwyg": {
						// Text area
						if ($customField['float_left'] == 'yes') {
							$float_left = 'float_left';
						} else {
							$float_left = '';
						}
						echo '<div class="form-field ' . $float_left . ' form-required">';
						echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>';
						echo '<textarea name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" columns="30" rows="3">' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '</textarea>';
						// WYSIWYG
						if ($customField['type'] == "wysiwyg") { ?>
              <script type="text/javascript">
                jQuery(document).ready(function () {
                  jQuery("<?php echo $this->compactor_prefix . $customField['name']; ?>").addClass("mceEditor");
                  if (typeof(tinyMCE) == "object" && typeof(tinyMCE.execCommand) == "function") {
                    tinyMCE.execCommand("mceAddControl", false, "<?php echo $this->compactor_prefix . $customField['name']; ?>");
                  }
                });
              </script>
						<?php }
						echo '</div>';
						break;
						}
						case "short-text-200":
							{
								// Plain text field
								if ($customField['float_left'] == 'yes') {
									$float_left = 'float_left';
								} else {
									$float_left = '';
								}
								echo '<div class="form-field ' . $float_left . ' short_text_200">';
								echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>';
								echo '<input type="text" name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '" />';
								echo '</div>';
								break;
							}
						case "hidden": {
						// Plain text field
						if ($customField['float_left'] == 'yes') {
							$float_left = 'float_left';
						} else {
							$float_left = '';
						}
						echo '<div class="form-field ' . $float_left . ' form-required">';
						echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>';
						echo '<input type="hidden" class="rating-value" name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '" />';
						echo '</div>'; ?>
              <ul class="rating">
                <li data-value="1"><i class="fa fa-star"></i></li>
                <li data-value="2"><i class="fa fa-star"></i></li>
                <li data-value="3"><i class="fa fa-star"></i></li>
                <li data-value="4"><i class="fa fa-star"></i></li>
                <li data-value="5"><i class="fa fa-star"></i></li>
              </ul>
							<?php break;
						}
							default:
								{
									// Plain text field
									if ($customField['float_left'] == 'yes') {
										$float_left = 'float_left';
									} else {
										$float_left = '';
									}
									echo '<div class="form-field ' . $float_left . ' form-required">';
									echo '<label for="' . $this->compactor_prefix . $customField['name'] . '"><b>' . $customField['title'] . '</b></label>';
									echo '<input type="text" name="' . $this->compactor_prefix . $customField['name'] . '" id="' . $this->compactor_prefix . $customField['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $this->compactor_prefix . $customField['name'], true)) . '" />';
									echo '</div>';
									break;
								}
						}
						?>
						<?php if ($customField['description']) echo '<p>' . $customField['description'] . '</p>'; ?>
						<?php if ($customField['clear_after'] == 'yes') echo '<div class="clear"></div>'; ?>

						<?php
					}
				} ?>
      </div>
			<?php
		}


		/**
		 * Save the new Custom Fields values
		 */
		function compactor_saveCustomFields($post_id, $post) {
			if (!isset($_POST['my-custom-fields_wpnonce']) || !wp_verify_nonce($_POST['my-custom-fields_wpnonce'], 'my-custom-fields'))
				return;
			if (!current_user_can('edit_post', $post_id))
				return;
			if (!in_array($post->post_type, $this->compactor_postTypes))
				return;
			foreach ($this->compactor_customFields as $customField) {
				if (current_user_can($customField['capability'], $post_id)) {

					if (isset($_POST[$this->compactor_prefix . $customField['name']]) && trim($_POST[$this->compactor_prefix . $customField['name']] !== '')) {

						$value = $_POST[$this->compactor_prefix . $customField['name']];
						// Auto-paragraphs for any WYSIWYG
						if ($customField['type'] == "wysiwyg") $value = wpautop($value);
						update_post_meta($post_id, $this->compactor_prefix . $customField['name'], $value);
					} else {
						delete_post_meta($post_id, $this->compactor_prefix . $customField['name']);
					}
				}
			}


		}


	} // End Class

} // End if class exists statement
/*--------------------meta box multi image uploade-------------------*/

// add meta box
function compactor_multiple_image() {
	add_meta_box('compactor_meta_box_multiple_image', 'Multiple Image', 'compactor_upload_image', array('post', 'portfolio'));
}

add_action('add_meta_boxes', 'compactor_multiple_image');
function compactor_upload_image() {
	global $post; ?>

  <div class="add_portfolio_images">
    <h3><?php echo esc_html__('Portfolio Images (multiple upload)', 'compactor') ?></h3>
    <div class="add_portfolio_images_inner">

      <button class="wd-gallery-upload button button-primary button-large"><?php echo esc_html__('Browse', 'compactor') ?></button>
      <ul class="wd-gallery-images-holder clearfix">
				<?php
				$portfolio_image_gallery_val = get_post_meta($post->ID, 'wd_portfolio-image-gallery', true);

				if ($portfolio_image_gallery_val != '') $portfolio_image_gallery_array = explode(',', $portfolio_image_gallery_val);

				if (isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array) != 0):

					foreach ($portfolio_image_gallery_array as $gimg_id):

						$gimage_wp = wp_get_attachment_image_src($gimg_id, 'thumbnail', true);
						echo '<li class="wd-gallery-image-holder"><img src="' . esc_url($gimage_wp[0]) . '"/></li>';

					endforeach;

				endif;
				?>
      </ul>
      <input type="hidden" value="<?php echo esc_attr($portfolio_image_gallery_val); ?>" id="wd_portfolio-image-gallery"
             name="wd_portfolio-image-gallery">
    </div>
  </div>
	<?php
}

//save meta box
if (isset($_POST['wd_portfolio-image-gallery'])) {
	function compactor_save_meta_box_image($post_id) {
		update_post_meta($post_id, 'wd_portfolio-image-gallery', $_POST['wd_portfolio-image-gallery']);
	}

	add_action('save_post', 'compactor_save_meta_box_image');
}
//ajax
if (!function_exists('compactor_gallery_upload_get_images')) {
	function compactor_gallery_upload_get_images() {
		$ids = $_POST['ids'];
		$ids = explode(",", $ids);
		foreach ($ids as $id):
			$image = wp_get_attachment_image_src($id, 'thumbnail', true);
			echo '<li class="wd-gallery-image-holder"><img src="' . esc_url($image[0]) . '"/></li>';
		endforeach;
		exit;
	}
}
add_action('wp_ajax_compactor_gallery_upload_get_images', 'compactor_gallery_upload_get_images');

if (!class_exists('compactor_meta_box')) {
	class compactor_meta_box {
		var $customfields = array(
			array(
				"name"			=> "page_vertical_area_transparency",
				"title"			=> "Enable transparent left menu area on load",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""	=>	"",
					"no"	=>	"No",
					"yes"	=>	"Yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency"	=> array("vertical_area" => array("yes")),
			),
			array(
				"name"			=> "header-style",
				"title"			=> "Header style",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""	=>	"",
					"light"	=>	"Light",
					"dark"	=>	"Dark"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
		);
	}
}