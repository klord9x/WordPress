<?php
/********************* Customize *********************/
add_action('customize_register', 'safeguard_pix_remove_customize_sections');

function safeguard_pix_remove_customize_sections($wp_customize)
	{
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('nav');
	$wp_customize->remove_panel('widgets');

	// / Global Colors ///

	$wp_customize->add_section('safeguard_pix_colors', array(
		'title' => esc_html__('Global Colors', 'safeguard') ,
		'priority' => 20
	));
	$wp_customize->add_setting('safeguard_pix_customize_options[first_color]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_attr',

	));
	$wp_customize->add_setting('safeguard_pix_customize_options[second_color]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_attr',

	));
	$wp_customize->add_setting('safeguard_pix_customize_options[third_color]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_attr',

	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'first_color', array(
		'label' => esc_html__('First Color', 'safeguard') ,
		'section' => 'safeguard_pix_colors',
		'settings' => 'safeguard_pix_customize_options[first_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'second_color', array(
		'label' => esc_html__('Second Color', 'safeguard') ,
		'section' => 'safeguard_pix_colors',
		'settings' => 'safeguard_pix_customize_options[second_color]'
	)));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'third_color', array(
		'label' => esc_html__('Third Color', 'safeguard') ,
		'section' => 'safeguard_pix_colors',
		'settings' => 'safeguard_pix_customize_options[third_color]'
	)));

	// ////////////////////////////////////////////////////////
	// / Global Font ///

	$wp_customize->add_section('safeguard_pix_font', array(
		'title' => esc_html__('Global Font', 'safeguard') ,
		'priority' => 25,
		'description' => 'Add new <a href="//www.google.com/fonts/" target="_blank">Google Web Fonts</a>'
	));
	$wp_customize->add_setting('safeguard_pix_customize_options[font_family]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_html',

	));
	$wp_customize->add_setting('safeguard_pix_customize_options[font_weight]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_html',

	));
	$wp_customize->add_control('safeguard_pix_font_family_control', array(
		'label' => esc_html__('Font Family', 'safeguard') ,
		'section' => 'safeguard_pix_font',
		'settings' => 'safeguard_pix_customize_options[font_family]',
		'description' => 'Example: Oswald'
	));
	$wp_customize->add_control('safeguard_pix_font_weight_control', array(
		'label' => esc_html__('Font Weight', 'safeguard') ,
		'section' => 'safeguard_pix_font',
		'settings' => 'safeguard_pix_customize_options[font_weight]',
		'description' => 'Example: 300'
	));

	// ////////////////////////////////////////////////////////
	// / Title Font ///

	$wp_customize->add_section('safeguard_pix_font_title', array(
		'title' => esc_html__('Title Font', 'safeguard') ,
		'priority' => 30,
		'description' => 'Add new <a href="//www.google.com/fonts/" target="_blank">Google Web Fonts</a>'
	));
	$wp_customize->add_setting('safeguard_pix_customize_options[font_title_family]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_html',

	));
	$wp_customize->add_setting('safeguard_pix_customize_options[font_title_weight]', array(
		'default' => '',
		'type' => 'option',

		'sanitize_callback' => 'esc_html',

	));
	$wp_customize->add_control('safeguard_pix_font_title_family_control', array(
		'label' => esc_html__('Font Family', 'safeguard') ,
		'section' => 'safeguard_pix_font_title',
		'settings' => 'safeguard_pix_customize_options[font_title_family]',
		'description' => 'Example: Oswald'
	));
	$wp_customize->add_control('safeguard_pix_font_title_weight_control', array(
		'label' => esc_html__('Font Weight', 'safeguard') ,
		'section' => 'safeguard_pix_font_title',
		'settings' => 'safeguard_pix_customize_options[font_title_weight]',
		'description' => 'Example: 700'
	));

	// ////////////////////////////////////////////////////////

}


function safeguard_pix_customize_live_preview(){
	if (isset($_POST['wp_customize']) && $_POST['wp_customize'] == 'on') {
		$settings = json_decode(stripslashes($_POST['customized']));
		$settings_array = array();
		foreach($settings as $key => $val){
			$key = substr(str_replace("safeguard_pix_customize_options[", "", $key), 0, -1);
			$settings_array[$key] = $val;
		}
		if(class_exists('WP_Session')) {
			$safeguard_pix_wp_session = WP_Session::get_instance();
			$safeguard_pix_wp_session['customize_live_preview'] = $settings_array;
		}else {
			update_option('safeguard_pix_customize_live_preview', $settings_array);
		}
	}
}
add_action( 'customize_preview_init', 'safeguard_pix_customize_live_preview');

?>