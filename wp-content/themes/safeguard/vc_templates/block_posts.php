<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $btn_text
 * @var $link
 * @var $skin
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Section_Reviews
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$href = vc_build_link( $link );
$link = isset($href['url']) ? $href['url'] : ''; 
$date = '';

$safeguard_pix_options = get_option('safeguard_pix_general_settings');
$skin = $skin == '' ? 'pix-lastnews-light' : $skin;

$out = $css_animation != '' ? '<div class="animated '.esc_attr($skin).'" data-animation="' . esc_attr($css_animation) . '">' : '<div class="'.esc_attr($skin).'">';	

$out .= $btn_text != '' ? '<a class="btn btn-danger pull-right read-all-news" href="'.esc_url($link).'">'.wp_kses_post($btn_text).'</a>' : '';

$out .= '
		<div class="hgroup">
            <h1>'.wp_kses_post($title).'</h1>
            <h2>'.wp_kses_post(do_shortcode($content)).'</h2>
        </div>
';

$args = array(
			'ignore_sticky_posts' => true,
			'showposts' => 3,
		);

$wp_query = new WP_Query( $args );
			 					
	if ($wp_query->have_posts()):
		$i=0;
		$cnt = $wp_query->post_count;	
 		
		while ($wp_query->have_posts()) : 							
			$wp_query->the_post();
			$custom = get_post_custom(get_the_ID());
			$i++;
			
			if(safeguard_pix_get_option('safeguard_pix_blog_show_date', '1')){
				$date = '<small>'.wp_kses_post(get_the_time('M j, Y')).'</small>';  
			}

			if($i == 1){
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'safeguard_pix-post-thumb-large');
				$thumbnail = isset($thumb[0]) && $thumb[0] != '' ? $thumb[0] : get_template_directory_uri().'/images/noimage.jpg';
				
				$out .= '
				
					<div class="col-sm-6 col-md-6 col-lg-6 one-news">
                		<div style="background-image:url('.esc_url($thumbnail).');">
                    		<div>
                        		<h3><a href="'.esc_url(get_the_permalink()).'">'.wp_kses_post(get_the_title()).'</a></h3>
                                <small class="news-author">'.esc_html__('BY ', 'safeguard').get_the_author_link().'</small>
                                '.$date.'
                            </div>
                        </div>
                    </div>
									
				';
				
			}else{
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'safeguard_pix-post-thumb-small');
				$thumbnail = isset($thumb[0]) && $thumb[0] != '' ? $thumb[0] : get_template_directory_uri().'/images/noimage.jpg';
				
				$out .= $i % 2 == 0 ? '
					<div class="col-sm-6 col-md-6 col-lg-6 two-news">' : '';
				
				$out .= '	
                        <div class="news-item row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div style="background-image:url('.esc_url($thumbnail).');"></div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div>
                                    <h3><a href="'.esc_url(get_the_permalink()).'">'.wp_kses_post(get_the_title()).'</a></h3>
                                    <small class="news-author">'.esc_html__('BY ', 'safeguard').get_the_author_link().'</small>
									'.$date.'
                                </div>
                            </div>
                        </div>
                ';
                
                $out .= $i % 2 == 1 || $i == $cnt ? '
                	</div>' : '';
	             
			}
			
		endwhile;

	endif;
	 
$out .= '            
        <!--end-->
	</div>
	';
	
echo $out;