<?php

class Wd_Customizer {

	public function Customizer_registration($section = array(), $parms = array(), $wp_customize) {
		$wp_customize->add_panel($this->menuSlug, array(
			'title' => esc_html($this->pageTitle),
			'priority' => 10,
			'description' => esc_html__('Allows you to customize some example settings for compactor', 'compactor'),
		));
		foreach ($section as $item) {
			$sectionTitle = $item["sectionName"];
			$sectionid = str_replace(" ", "", $item["sectionName"]);
			$wp_customize->add_section($sectionid, array(
				'title' => $sectionTitle,
				'panel' => $this->menuSlug,
			));
			foreach ($parms as $items) {
				$optionTitle = $items["label"];
				$optionType = $items["type"];
				$optionDescription = $items["description"];
				$optionValue = $items["defaultValue"];
				$optionParent = $items["parent"];
				$option_ID = $items["id"];
				$settingID = "wd_options_array[$option_ID]";
				$optionID = "wd_options_array[$option_ID]";
				if ($sectionid == $optionParent) {
					$wp_customize->add_setting($settingID, array(
						'default' => $optionID,
						'type' => 'option',
						'sanitize_callback' => 'wd_date_sanitized',
					));
					switch ($optionType) {
						case "text";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'settings' => $settingID,
									'description' => $optionDescription,
									'type' => 'text',
									'choices' => $optionValue
								)
							);
							break;
						case "textarea";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'description' => $optionDescription,
									'settings' => $settingID,
									'type' => 'textarea',
									'choices' => $optionValue
								)
							);
							break;
						case "dropdown";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'settings' => $settingID,
									'description' => $optionDescription,
									'type' => 'select',
									'choices' => $optionValue
								)
							);
							break;
						case "checkbox";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'settings' => $settingID,
									'description' => $optionDescription,
									'type' => 'checkbox',
									'choices' => $optionValue
								)
							);
							break;
						case "imgupload";
							$wp_customize->add_control(
								new WP_Customize_Image_Control($wp_customize, $optionID,
									array(
										'label' => $optionTitle,
										'section' => $sectionid,
										'settings' => $settingID,
										'description' => $optionDescription,
										'choices' => $optionValue
									)
								));
							break;
						case "color";
							$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'description' => $optionDescription,
									'settings' => $settingID,
									'default' => compactor_get_option($option_ID),
								)));
							break;
						case "radio";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'description' => $optionDescription,
									'settings' => $settingID,
									'type' => 'radio',
									'choices' => $optionValue
								)
							);
							break;
						case "grid";
							$wp_customize->add_control(
								$optionID,
								array(
									'label' => $optionTitle,
									'section' => $sectionid,
									'description' => $optionDescription,
									'settings' => $settingID,
									'type' => 'select',
									'choices' => $optionValue
								)
							);
							break;
						case "font";
							$this->customizer_font($option_ID, $optionTitle, $sectionid, $wp_customize);
							break;
					}
				}
			}
		}
	}

	public function customizer_font($option_ID, $optionTitle, $sectionid, $wp_customize) {
		$familyName = $option_ID . "_font_family";
		$optionID = "wd_options_array[$familyName]";
		$font = compactor_get_option($familyName);

		$wp_customize->add_setting($optionID, array(
			'default' => compactor_get_option($familyName),
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$optionID,
			array(
				'label' => $optionTitle . " font family",
				'section' => $sectionid,
				'settings' => $optionID,
				'type' => 'select',
				'choices' => wd_Font_family()
			)
		);
		$styleName = $option_ID . "_font_style";
		$styleID = "wd_options_array[$styleName]";
		$wp_customize->add_setting($styleID, array(
			'default' => compactor_get_option($styleName),
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$styleID,
			array(
				'label' => $optionTitle . " font style",
				'section' => $sectionid,
				'settings' => $styleID,
				'type' => 'select',
				'choices' => wd_Font_style($font)
			)
		);
		$weightName = $option_ID . "_font_weight";
		$weightID = "wd_options_array[$weightName]";
		$wp_customize->add_setting($weightID, array(
			'default' => compactor_get_option($weightName),
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$weightID,
			array(
				'label' => $optionTitle . " font weight",
				'section' => $sectionid,
				'settings' => $weightID,
				'type' => 'select',
				'choices' => wd_Font_weight($font)
			)
		);
		$sizeName = $option_ID . "_font_size";
		$sizeID = compactor_get_option($sizeName);
		$wp_customize->add_setting($sizeID, array(
			'default' => $sizeID,
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$sizeID,
			array(
				'label' => $optionTitle . " font size",
				'section' => $sectionid,
				'settings' => $sizeID,
				'type' => 'text',
			)
		);
		$letterSpacingName = $option_ID . "_letter_spacing";
		$letterSpacingID = "wd_options_array[$letterSpacingName]";
		$wp_customize->add_setting($letterSpacingID, array(
			'default' => compactor_get_option($letterSpacingName),
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$letterSpacingID,
			array(
				'label' => $optionTitle . " font letterSpacing",
				'section' => $sectionid,
				'settings' => $letterSpacingID,
				'type' => 'text',
			)
		);
		$subsetsName = $option_ID . "_font_subsets";
		$subsetsID = "wd_options_array[$subsetsName]";
		$wp_customize->add_setting($subsetsID, array(
			'default' => compactor_get_option($subsetsName),
			'type' => 'option',
			'sanitize_callback' => 'wd_date_sanitized',
		));
		$wp_customize->add_control(
			$subsetsID,
			array(
				'label' => $optionTitle . " font subsets",
				'section' => $sectionid,
				'settings' => $subsetsID,
				'type' => 'select',
				'choices' => wd_Font_subsets($font)
			)
		);
	}
}

function wd_date_sanitized($data) {
	return $data;
}