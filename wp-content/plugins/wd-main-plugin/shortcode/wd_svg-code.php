<?php

if(!function_exists('wd_svg_code')) {
  function wd_svg_code($atts, $content = null) {
    extract(shortcode_atts(array(
      'svg_code' => '',
      'max_width' => '500px',
    ), $atts));


    ob_start();
    $svg_code = rawurldecode( base64_decode( strip_tags( $svg_code ) ) );

    echo "<div class='wd-svg' style='max-width:$max_width'> $svg_code </div>";

    return ob_get_clean();
  }
  add_shortcode('wd_svg_code', 'wd_svg_code');
}
