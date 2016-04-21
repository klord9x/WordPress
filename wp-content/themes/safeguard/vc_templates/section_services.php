<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $template
 * @var $cat_serv
 * @var $count
 * @var $buttext
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Services
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$out = $cnt = '';

if( $template == 'isotop' && $cat_serv == '' ):
	$out .= '<p>'.esc_html__('No departments selected. To fix this, please login to your WP Admin area and set the departments you want to show by editing this shortcode and setting one or more departments in the multi checkbox field "Departments".', 'safeguard');
else: 

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';
		
$args = array(
			'post_type' => 'services', 
			'orderby' => 'menu_order',
			'order' => 'ASC'
		);
if( is_numeric($count) )
	$args['showposts'] = $count;
else
	$args['posts_per_page'] = -1;
	
$wp_query = new WP_Query( $args );
	
if($template == 'isotop'){
	
	$services = get_objects_in_term( explode( ",", $cat_serv ), 'services_category');	
	$args = array(
				'post_type' => 'services', 
				'orderby' => 'menu_order',
				'post__in' => $services,			 
				'order' => 'ASC'
			);
	if( is_numeric($count) )
		$args['showposts'] = $count;
	else
		$args['posts_per_page'] = -1;
		
	$wp_query = new WP_Query( $args );
$out .= '
	<div class="isotope-wrap">
		<div class="container-fluid">
			<ul id="filter" class="nav nav-tabs">
				<li class="active"><a href="#" data-filter="*" class="current">'.esc_html__('All services', 'safeguard').'</a></li>';
				
				$Safeguard_Walker = new Safeguard_Portfolio_Walker();
				$args = array(
								'taxonomy' => 'services_category', 
								'hide_empty' => '1', 
								'include' => $cat_serv, 
								'title_li'=> '', 
								'walker' => $Safeguard_Walker, 
								'show_count' => '0', 
								'echo' => '0'
							);
				$categories = wp_list_categories ($args);

$out .= '
				'.$categories.'
			</ul>
		</div>
		<div class="isotope-frame ">
			<div class="isotope-filter isotope">
		';	
		
			if ($wp_query->have_posts()):
				while ($wp_query->have_posts()) :
					$wp_query->the_post();		
					$cats = wp_get_object_terms(get_the_ID(), 'services_category');							
					if ($cats){
						$cat_slugs = '';
						foreach( $cats as $cat ){
							$cat_slugs .= $cat->slug . " ";
						}
					} 
					$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard_pix-services-thumb', array('class' => 'full-width'));
					/*
					$t_id = $cat->term_id;
					$cat_meta = get_option("services_category_$t_id");
					*/
				
					$out .= '
						<div class="service-item col-xs-12 col-sm-4 isotope-item '.esc_attr($cat_slugs).'">
							<div class="img-hover-effect">'.wp_kses_post($thumbnail).'</div>
							<h4>'.wp_kses_post(get_the_title()).'</h4>
							<p>'.safeguard_pix_limit_words(get_the_excerpt(), 20).'</p>
							<a class="btn btn-success btn-sm" href="'.esc_url(get_permalink(get_the_ID())).'">'.wp_kses_post($buttext).'</a>
						</div>
					';
		
				endwhile;
			endif;
		
$out .= '
			</div>		
		</div>
	</div>
		';				
			
} elseif($template == 'landing') {

	$out .= '
			<div class="container-fluid inner-offset">    
				<div class="row services">
			';
	
	if ($wp_query->have_posts()):
			while ($wp_query->have_posts()) :
				$wp_query->the_post();
				$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard_pix-services-thumb', array('class'	=> "full-width"));
	$out .= '
				<div class="service-item col-xs-12 col-sm-4">
					<div class="img-hover-effect">'.wp_kses_post($thumbnail).'</div>
					<h4>'. wp_kses_post(get_the_title()) .'</h4>
					<p>'. safeguard_pix_limit_words(get_the_excerpt(), 20) .'</p>
					<a class="btn btn-success btn-sm" href="'. esc_url(get_permalink(get_the_ID())) .'">'.wp_kses_post($buttext).'</a>
				</div>
    ';
			endwhile;
		endif;
	
	$out .= '
				</div>               
			</div>
			';
	
} else {
$out .= '
	<div class="row main-grid">
		<div class="col-sm-3">
			<div class="sidebar-container">
				<div>
					<ul class="styled">';
						$args = array( 'taxonomy' => 'services_category', 'hide_empty' => '1', 'title_li'=> '', 'show_count' => '0', 'echo' => '0');
						$categories = wp_list_categories ($args);
$out .= '
						'.$categories.'
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-9">
			<div class="row services">
		';
	
									
	if ($wp_query->have_posts()):
		while ($wp_query->have_posts()) :
			$wp_query->the_post();		
			$cats = wp_get_object_terms(get_the_ID(), 'services_category');											   
			 
			$thumbnail = get_the_post_thumbnail(get_the_ID(), 'safeguard_pix-services-thumb', array('class' => 'full-width'));
			/*
			$t_id = $cat->term_id;
			$cat_meta = get_option("services_category_$t_id");
			*/
		
$out .= '		
		<div class="service-item col-xs-6 col-sm-4 col-md-4 col-lg-4">
			<div class="img-hover-effect">'.wp_kses_post($thumbnail).'</div>
			<h4>'.wp_kses_post(get_the_title()).'</h4>
			<p>'.safeguard_pix_limit_words(get_the_excerpt(), 20).'</p>
			<a class="btn btn-success btn-sm" href="'.esc_url(get_permalink(get_the_ID())).'">'.wp_kses_post($buttext).'</a>
		</div>
		';

		endwhile;
	endif;
	 
$out .= '
			</div>
		</div>
	</div>
	';
}		
$out .= '</div>';
endif;	
echo $out;