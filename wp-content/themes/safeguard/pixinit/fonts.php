<?php
function safeguard_pix_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$font_1 = _x( 'on', 'Exo font: on or off', 'safeguard' );

	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$font_2 = _x( 'on', 'Ubuntu', 'safeguard' );

	$font_3 = _x( 'on', 'Source Sans Pro', 'safeguard' );

	if ( 'off' !== $font_1 || 'off' !== $font_2 ) {
		$font_families = array();

		if ( 'off' !== $font_1 ) {
			$font_families[] = 'Exo:400,400italic,500,500italic,600,600italic,700,700italic';
		}

		if ( 'off' !== $font_2 ) {
			$font_families[] = 'Ubuntu:400,400italic,500,500italic';
		}
		
		if ( is_admin() && 'off' !== $font_3 ) {
			$font_families[] = 'Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

function safeguard_pix_fonts(){

	wp_enqueue_style( 'safeguard-fonts', safeguard_pix_fonts_url(), array(), null );

	$safeguard_pix_customize = get_option('safeguard_pix_customize_options');
	$bodyFont = !empty($safeguard_pix_customize['font_family']) && $safeguard_pix_customize['font_family'] != '' ? $safeguard_pix_customize['font_family'] : '';
	$bodyWeight = !empty($safeguard_pix_customize['font_weight']) && $safeguard_pix_customize['font_weight'] != '' ? $safeguard_pix_customize['font_weight'] : '';
	$titleFont = !empty($safeguard_pix_customize['font_title_family']) && $safeguard_pix_customize['font_title_family'] != '' ? $safeguard_pix_customize['font_title_family'] : '';
	$titleWeight = !empty($safeguard_pix_customize['font_title_weight']) && $safeguard_pix_customize['font_title_weight'] != '' ? $safeguard_pix_customize['font_title_weight'] : '';
	if (($bodyFont != '' || $titleFont != '') && ($bodyFont == $titleFont)){
		$api_font = str_replace(" ", '+', $bodyFont);
		if ($bodyWeight != '' || $titleWeight != ''){
			$api_font.= ':';
			if ($bodyWeight == $titleWeight){
				$api_font.= $bodyWeight;
			}
			elseif ($bodyWeight != '' && $titleWeight != ''){
				$api_font.= $bodyWeight < $titleWeight ? $bodyWeight . ',' . $titleWeight : $titleWeight . ',' . $bodyWeight;
			}
		}

		$font_name = str_replace(" ", '-', $bodyFont);
		wp_enqueue_style('safeguard_pix-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
	}else{
		if ($bodyFont != ''){
			$api_font = str_replace(" ", '+', $bodyFont);
			$api_font.= $bodyWeight != '' ? ':' . $bodyWeight : '';
			$font_name = str_replace(" ", '-', $bodyFont);
			wp_enqueue_style('safeguard_pix-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
		}

		if ($titleFont != ''){
			$api_font = str_replace(" ", '+', $titleFont);
			$api_font.= $titleWeight != '' ? ':' . $titleWeight : '';
			$font_name = str_replace(" ", '-', $titleFont);
			wp_enqueue_style('safeguard_pix-font-' . $font_name, "//fonts.googleapis.com/css?family=" . $api_font);
		}
		
	}
	
}

add_action('wp_enqueue_scripts', 'safeguard_pix_fonts');
/************************************************************/
?>