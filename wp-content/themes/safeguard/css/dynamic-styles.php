<?php
header("Content-type: text/css; charset: UTF-8");
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$safeguard_pix_options = get_option('safeguard_pix_general_settings');
$safeguard_pix_customize = get_option( 'safeguard_pix_customize_options' );

$safeguard_pix_customize_live_preview = array();
if(class_exists('WP_Session')) {
    $safeguard_pix_wp_session = WP_Session::get_instance();
    $pix_customize_live_preview = array();
    foreach($safeguard_pix_customize as $key => $val){
        if(isset($safeguard_pix_wp_session['customize_live_preview'][$key]))
            $pix_customize_live_preview[$key] = $garden_pix_wp_session['customize_live_preview'][$key];
    }
}else {
    $pix_customize_live_preview = get_option( 'safeguard_pix_customize_live_preview' );
    update_option('safeguard_pix_customize_live_preview', '');
}
$safeguard_pix_customize = !is_array($pix_customize_live_preview) ? $safeguard_pix_customize : array_merge($safeguard_pix_customize, $pix_customize_live_preview);
?>



  <?php if(isset($safeguard_pix_customize['first_color']) && $safeguard_pix_customize['first_color'] != ''):?>
		
  
html footer .copy{

background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;

}
  ::selection {
	background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> 
}
::-moz-selection {
	background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> 
}
  
  
  #page-preloader .spinner {
	border-top-color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;
    }
    
  
  .vc_btn3.vc_btn3-size-md{
  	background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;
  }
  
  .rev-btn{
  background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;
  border-color: #fff  !important;
  }
  
.navbar-main > li > .dropdown-menu, footer .color-part, .btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger, .btn.btn-danger:hover, .main-menu, .main-menu:before, #main-menu-bg, .stats > div > div:hover, .btn.btn-sm.btn-default:before, .big-hr.color-2, .our-services.styled div > a:hover:after, .adress-details > div > span:after, .comments > div > a.reply:hover, .comments > div > a.reply:after, nav.pagination a:hover, .tags a:hover, ul.blog-cats > li:hover, #menu-open, .main-menu section nav, .our-services div > a:hover > span, .testimonial-content span, .info-texts:after, .post-info:after, .customBgColor ,html  .big-hr , html .quote-form input[type=submit]  {
	background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;
}


html  body blockquote:before {
	background: <?php echo esc_attr($safeguard_pix_customize['first_color'])?>;
    }
    

html .pix-lastnews-dark .read-all-news {
    border-right-color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> !important;
    color: #fff !important;
}

html .big-hr:before, .big-hr:after ,html  .big-hr:after {
    border-top-color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?> ; 
}


.vc_icon_element-style-boxed-outline .vc_icon_element-icon {
    border-right-color:<?php echo esc_attr($safeguard_pix_customize['first_color'])?>  !important; 
    }
    
.stats > div > div:hover, .btn.btn-sm.btn-default:hover, .comments > div > a.reply:hover, nav.pagination a:hover, .tags a:hover, ul.blog-cats li:hover, .our-services div > a:hover > span, .testimonial-content span{

    border-color:  <?php echo esc_attr($safeguard_pix_customize['first_color'])?>  !important;
    }

.our-services div > a:hover > span:before, .our-services div > a:hover > span:after, .testimonial-content span:before, .testimonial-content span:after {
    border-bottom-color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?>  !important;
}

.stats span:first-child, footer .copy a, .twitter-feeds div span, .recent-posts div a:hover {
    color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?>  !important;
}
    
.info-texts div:last-child:before {
    border-top-color: <?php echo esc_attr($safeguard_pix_customize['first_color'])?>  !important;
}
  <?php endif?> 
  
  
    <?php if(isset($safeguard_pix_customize['second_color']) && $safeguard_pix_customize['second_color'] != ''):?>
    
 #page-preloader .spinner:after {
	border-top-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> !important;
}


	
html .btn.btn-sm {
    background: none !important;
}
html .btn.btn-sm:hover{
border-color:<?php echo esc_attr($safeguard_pix_customize['second_color'])?> !important;
}
.widget_archive .widget-title + ul > li, .widget_categories .widget-title + ul > li, .widget_pages .widget-title + ul > li, ul.menu > li {
border-left-color:<?php echo esc_attr($safeguard_pix_customize['second_color'])?> !important;
    }

.btn-success:hover, .big-hr.color-1, .one-news > div > div, .btn.btn-sm.btn-success:before, .our-services div > a:hover:after, nav.pagination a.active, ul.styled > li.active, ul.styled > li.current-cat, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover, .info-texts:before, ul.blog-cats > li:before, ul.blog-cats li > ul , .btn.btn-success, .btn-success:hover, .big-hr.color-1, .one-news > div > div, .btn.btn-sm.btn-success:before, .our-services div > a:hover:after, nav.pagination a.active, ul.styled > li.active, ul.styled > li.current-cat, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover, .info-texts:before, ul.blog-cats > li:before, ul.blog-cats li > ul , .title-option , .demo_changer .demo-icon , .vc_btn3.vc_btn3-color-green, .vc_btn3.vc_btn3-color-green.vc_btn3-style-flat , .pagination>li.current a , .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover{
background: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> !important;
}
    a{
	color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
}
html input[type="submit"] {
    background-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
    }
    

.btn-primary {
    background-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?>;
    border-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?>;
}

h1.color-1, h2.color-1, h3.color-1, h4.color-1, h5.color-1, h6.color-1, .twitter-feeds div i, .navbar-main .open > a, .navbar-main .open > a:focus, .navbar-main .open > a:hover, .navbar-main > li > a:focus, .navbar-main > li > a:hover, .navbar-main > li > .dropdown-menu > li > a:focus, .navbar-main > li > .dropdown-menu > li > a:hover{
color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
}
html .info-texts div:first-child:before {
    border-top-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
}

html .btn.btn-sm.btn-success:hover, nav.pagination a.active, .nav-tabs > li.active {
    border-color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
}



html .type-post.sticky:after{
color: <?php echo esc_attr($safeguard_pix_customize['second_color'])?> ;
}

  <?php endif?> 
  
  
  
  
    <?php if(isset($safeguard_pix_customize['third_color']) && $safeguard_pix_customize['third_color'] != ''):?>
    

 html  .info-texts div:before {
    border-bottom-color: <?php echo esc_attr($safeguard_pix_customize['third_color'])?> ;
}  

 html   header, .topmenu nav:first-child:before {
    border-top-color:<?php echo esc_attr($safeguard_pix_customize['third_color'])?> ;
}


html .why-us li span, .topmenu nav, .topmenu:before, footer, #to-top, .two-news > div div:last-child > div {
    background: <?php echo esc_attr($safeguard_pix_customize['third_color'])?> ;
}


   <?php endif?>
   
   
   
   
    
  <?php if(isset($safeguard_pix_customize['font_family']) && $safeguard_pix_customize['font_family'] != ''):?>
html body  , html .main-menu , html .btn{
    font-family: '<?php echo esc_attr($safeguard_pix_customize['font_family'])?>';
    font-weight: <?php echo esc_attr($safeguard_pix_customize['font_weight'])?>;    
}
    <?php endif?>
    <?php if(isset($safeguard_pix_customize['font_title_family']) && $safeguard_pix_customize['font_title_family'] != ''):?>
html h1, html  h2, html  h3,  html  h4, html  h5, html  h6 , html .navbar-main > li , html .btn , html ul.styled > li > a , html .widget_categories .cat-item a{
    font-family: '<?php echo esc_attr($safeguard_pix_customize['font_title_family'])?>';
    font-weight:<?php echo esc_attr($safeguard_pix_customize['font_title_weight'])?>;
}
    <?php endif?>


<?php if(isset($safeguard_pix_options['safeguard_pix_custom_css']) && $safeguard_pix_options['safeguard_pix_custom_css']):?>
<?php echo $safeguard_pix_options['safeguard_pix_custom_css'] ?>
<?php endif?>