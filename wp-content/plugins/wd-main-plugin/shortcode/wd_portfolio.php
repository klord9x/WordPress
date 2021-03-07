<?php
function wd_vc_portfolio ($atts) {
	extract(shortcode_atts(array(
		'layout' => 'grid',
		'hover_style' => 'style-1',
		'itemperpage' => '10',
		'columns' => '3',
		'auto_play' => '',
		'number' => '3',
		'category_filter' => 'false',
		'portfolio_categories' => '',
		'css_animation' => 'no'
	), $atts));
	ob_start();

  $data_animated = $animation_classes = "";

	if(($css_animation != 'no')){
		$animation_classes =  " animated ";
		$data_animated = "data-animated=$css_animation";
	}

  if ($layout === 'masonry' and $category_filter !== 'false') {
    $portfolio_cats = compactor_get_categories('portfolio_categories'); ?>
    <div class="filters">
      <div class="button-group filters-button-group">
        <button class="portfolio_cats is-checked" data-filter="*"><?php echo esc_html__('show all', 'compactor'); ?></button>
        <?php
        foreach($portfolio_cats as $cats) {
          echo '<button class="portfolio_cats" data-filter=".' . esc_attr($cats) . '">' . esc_html($cats) . '</button> ';
        }
        ?>
      </div>
    </div>
    <?php
  }
	$portfolio_categories_array = explode(",", $portfolio_categories);

  $taxonomy_param = array();

  if($portfolio_categories_array[0] != "" ) {
    $taxonomy_param = array(
      //'relation' => 'AND',
      array(
        'taxonomy' => 'portfolio_categories',
        'field' => 'slug',
        'terms' => $portfolio_categories_array
      )
    );
  }

	$loop = new WP_Query(array(
	    'post_type' => 'portfolio',
      'posts_per_page' => $itemperpage,
      'tax_query' => $taxonomy_param,
      )); ?>

	<div class="portfolio_<?php if($layout != 'masonry'){echo $hover_style;}else{echo 'style-3';}  ?>">
	<?php
		include( plugin_dir_path( __FILE__ ).'portfolio/content-'.$layout.'.php');
	?>
	</div>
	<?php

	return ob_get_clean();
}

add_shortcode('wd_vc_portfolio', 'wd_vc_portfolio');