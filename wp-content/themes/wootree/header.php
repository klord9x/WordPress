<!DOCTYPE html>
<html <?php language_attributes(); ?> />

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head();?>
</head>

<body <?php body_class(); ?> id="cms" >
    <div id="wrapper1">
        <div id="wrapper2">
            <div id="wrapper3">
                <div id="wrapper4">
                    <div id="header">
                        <a id="header_logo" href="<?php echo get_home_url();  ?>" title="Chocopolis">
                            <img class="logo" src="<?php echo  get_template_directory_uri().'/images/choco_img/logo/logo_1.png'; ?>" alt="Chocopolis">
                        </a>
                        <div id="header_right">
                            <!-- Block user information module HEADER -->
                            <div id="header_user">                            
                                <ul>
                                    <li id="header_user_info" style="color: red;">
                                        HOTLINE: (+848)6681 7518 - (+84)906 988 543
                                    </li>
                                    <!-- mini cart -->
                                    <li id="shopping_cart">
                                        <a title="Your Shopping Cart">GIỎ HÀNG:</a>
                                        <?php 
                                            $sl = WC()->cart->get_cart_contents_count();
                                            if ( $sl ) : ?>
                                            <span class="ajax_cart_quantity"><?php echo $sl; ?></span>
                                            <span class="ajax_cart_product_txt" >sản phẩm</span>
                                        <?php else : ?>
                                            <span class="ajax_cart_product_txt_s">(empty)</span>
                                        <?php endif; ?>
                                    </li>
                                    <!-- /mini cart -->
                                </ul>
                            </div>

                            <!-- Menu -->
                            <?php wpt_get_menu('header_links'); ?>
                            <!-- /Menu -->
                            <div class="tmbanner1">
                                <a href="" title=""><img src="<?php echo  get_template_directory_uri().'/images/choco_img/logo/logo_2.png'; ?>" alt="" title=""></a>
                            </div>
                            <!-- /tmbanner1 -->
                            <!-- Block search module TOP -->
                            <div id="search_block_top">
                                <form method="get" action="#" id="searchbox">
                                    <input class="search_query" type="text" id="search_query_top" name="search_query" placeholder="Tìm kiếm">
                                    <a href="javascript:document.getElementById('searchbox').submit();">Go!</a>
                                    <input type="hidden" name="orderby" value="position">
                                    <input type="hidden" name="orderway" value="desc">
                                </form>
                            </div>
                            <!-- /Block search module TOP -->
                            <!-- TM Categories -->
                            <div id="tmcategories">
                            </div>
                            <!-- /TM Categories -->
                        </div>
                    </div>
                    <!-- /header -->
