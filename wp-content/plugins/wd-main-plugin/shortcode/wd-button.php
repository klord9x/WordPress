<?php
function compactor_button($atts)
{
  extract(shortcode_atts(array(
    'compactor_btn_text' => 'Read More',
    'compactor_btn_link' => '',
    'compactor_btn_style' => 'btn-solid',
    'compactorbtn_bg_color' => 'btn-color-1',
    'compactor_btn_hover_bg_color' => 'hover-color-1',
    'custom_color' => '',
    'compactor_btn_custom_text_color' => '',
    'compactor_btn_custom_bg_color' => '',
    'compactor_btncustom_hover_color' => '',
    'compactor_btn_custom_hover_bg_color' => '',
    'compactorbtn_btn_size' => 'btn-medium',
    'compactorbtn_btn_border' => 'btn-round',
    'compactorbtn_btn_align' => 'text-left',
    'compactor_btn_icon' => '',
    'compactor_btn_icon_position' => 'after',
    'compactor_show_icon' => '',
    'compactor_btn_icon_style' => '',
    'css_animation' => 'no'),
    $atts));
  ob_start();


  // get the url from visual composer link string
	$compactor_btn_link = vc_build_link( $compactor_btn_link );

  $btn_classes = $compactor_btn_style . " " . $compactorbtn_bg_color . " " . $compactor_btn_hover_bg_color . " " . $compactorbtn_btn_size . " " . $compactorbtn_btn_border . " " . $compactor_btn_icon_style . " icon-" . $compactor_btn_icon_position;

  $animation_classes = "";
  $data_animated = "";

  if (($css_animation != 'no')) {
    $animation_classes = " animated ";
    $data_animated = "data-animated=$css_animation";
  }?>

  <div
    class="wd-btn-wrap <?php echo esc_attr($compactorbtn_btn_align) . ' ' . esc_attr($animation_classes); ?>" <?php echo esc_attr($data_animated); ?>>
    <a href="<?php echo $compactor_btn_link["url"] ?>" class="wd-btn <?php echo esc_attr($btn_classes) ?>"
      <?php if ($custom_color == 'yes') {
        ?>
        style="<?php echo compactor_check_if_empty('color', $compactor_btn_custom_text_color) ?>;  <?php echo compactor_check_if_empty('background-color', $compactor_btn_custom_bg_color) ?>"
        onMouseOver="this.style.color='<?php echo $compactor_btncustom_hover_color ?>', this.style.backgroundColor='<?php echo $compactor_btn_custom_hover_bg_color ?>'"
        onMouseOut="this.style.color='<?php echo $compactor_btn_custom_text_color ?>', this.style.backgroundColor='<?php echo $compactor_btn_custom_bg_color ?>'"
        <?php
      } ?>


    >
      <?php if ($compactor_show_icon == 'yes') { ?>
        <span class="button-wrp">
					<?php if ($compactor_btn_icon_position == 'before') { ?>
            <i class="<?php echo esc_html($compactor_btn_icon); ?> before"></i>
          <?php } ?>
          <span><?php echo esc_attr($compactor_btn_text); ?></span>
          <?php if ($compactor_btn_icon_position == 'after') { ?>
            <i class="<?php echo esc_html($compactor_btn_icon); ?> after"></i>
          <?php } ?>
				</span>
      <?php } else {
        echo esc_attr($compactor_btn_text);
      } ?>
    </a>
  </div>

  <?php return ob_get_clean();
}

add_shortcode('compactor_button', 'compactor_button');