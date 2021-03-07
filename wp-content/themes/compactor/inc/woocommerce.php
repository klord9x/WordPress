<?php

add_action('wp', 'wd_woo_setup', 20);

function wd_woo_setup()
{
    if (function_exists('is_woocommerce')) {
        if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
            add_action('wp_enqueue_scripts', 'wd_woo_setup_scripts_styles', 30);
            //add_action('woocommerce_before_shop_loop', 'wd_woo_toggle_button', 20);
        }
    }
}


// Scripts & styles
function wd_woo_setup_scripts_styles()
{
//// Enqueue dashboard icons
    wp_enqueue_style('dashicons');
}


// Toggle button
function wd_woo_toggle_button()
{

    $grid_view = __('Grid view', 'compactor');
    $list_view = __('List view', 'compactor');

    $output = sprintf('<nav class="gridlist-toggle"><a href="#" id="show_grid" title="%1$s"><span class="dashicons dashicons-grid-view"></span> <em>%1$s</em></a><a href="#" id="show_list" class="active" title="%2$s"><span class="dashicons dashicons-exerpt-view"></span> <em>%2$s</em></a></nav>', $grid_view, $list_view);

    echo html_entity_decode($output);
}


if (function_exists('is_woocommerce')) {


    if (!function_exists('woocommerce_template_loop_product_link_open')) {
        /**
         * Insert the opening anchor tag for products in the loop.
         */
        function woocommerce_template_loop_product_link_open()
        {
            global $product;

            $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);
        }
    }


    if (!function_exists('woocommerce_template_loop_product_link_close')) {
        /**
         * Insert the opening anchor tag for products in the loop.
         */
        function woocommerce_template_loop_product_link_close()
        {

        }
    }


    if (!function_exists('woocommerce_get_product_thumbnail')) {

        /**
         * Get the product thumbnail, or the placeholder if not set.
         *
         * @param string $size (default: 'woocommerce_thumbnail').
         * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0).
         * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0).
         * @return string
         */
        function woocommerce_get_product_thumbnail($size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0)
        {
            global $product;

            $image_size = apply_filters('single_product_archive_thumbnail_size', $size);

            $output = "<div class='product-image-wrapper'>";
            if ($product) {
                $output .= '<a href="' . get_the_permalink() . '">' . $product->get_image($image_size) . '</a>';
            }
            $output .= "</div>";

            return $output;
        }
    }


    if (!function_exists('woocommerce_template_loop_product_title')) {

        /**
         * Show the product title in the product loop. By default this is an H2.
         */
        function woocommerce_template_loop_product_title()
        {
            echo '<div class="product-details-wrapper">
              <h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">
                <a href="' . get_the_permalink() . '">' . get_the_title() . ' </a>
              </h2>';
        }
    }

    if (!function_exists('woocommerce_template_loop_add_to_cart')) {

        /**
         * Get the add to cart template for the loop.
         *
         * @param array $args Arguments.
         */
        function woocommerce_template_loop_add_to_cart($args = array())
        {
            global $product;

            if ($product) {
                $defaults = array(
                    'quantity' => 1,
                    'class' => implode(
                        ' ',
                        array_filter(
                            array(
                                'button',
                                'product_type_' . $product->get_type(),
                                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                            )
                        )
                    ),
                    'attributes' => array(
                        'data-product_id' => $product->get_id(),
                        'data-product_sku' => $product->get_sku(),
                        'aria-label' => $product->add_to_cart_description(),
                        'rel' => 'nofollow',
                    ),
                );

                $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

                if (isset($args['attributes']['aria-label'])) {
                    $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
                }

                wc_get_template('loop/add-to-cart.php', $args);

                echo "</div>";
            }
        }
    }


    /**
     * Change number of related products output
     */

    add_filter('woocommerce_output_related_products_args', 'compactor__related_products_args', 20);

    function compactor__related_products_args($args) {
        $args['posts_per_page'] = 4; // 4 related products
        $args['columns'] = 4; // arranged in 4 columns
        return $args;
    }


    /**
     * Sets up the content width value based on the theme's design and stylesheet.
     */
    if (!isset($content_width)) {
        $content_width = 625;
    }

    /*---------wooocomerce---------*/
    //Reposition WooCommerce breadcrumb
    function compactor_woocommerce_remove_breadcrumb() {
        remove_action(
            'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    }

    add_action(
        'woocommerce_before_main_content', 'compactor_woocommerce_remove_breadcrumb'
    );

    function compactor_woocommerce_custom_breadcrumb()
    {
        woocommerce_breadcrumb();
    }

    add_action('woo_custom_breadcrumb', 'compactor_woocommerce_custom_breadcrumb');


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
    add_filter('woocommerce_add_to_cart_fragments', 'compactor_woocommerce_header_add_to_cart_fragment');

    function compactor_woocommerce_header_add_to_cart_fragment($fragments)
    {
        ob_start();
        ?>
        <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"
           title="<?php echo esc_attr__('View your shopping cart', 'compactor'); ?>"><?php echo sprintf(esc_html__('%d item', 'compactor', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
            - <?php echo WC()->cart->get_cart_total(); ?></a>
        <?php

        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }


    /**
     * --------------- Number of Products to dispaly per page (9) -----------
     */
    add_filter('loop_shop_per_page', 'compactor_loop_shop_per_page', 20);

    function compactor_loop_shop_per_page($cols) {
        // $cols contains the current number of product
        $cols = compactor_get_option('products_per_page', 12);
        return $cols;
    }


// Enable Woocommerce LightBox

    add_action('after_setup_theme', 'compactor_woocommcere_setup');
    function compactor_woocommcere_setup()
    {
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

    /*
   * Remove 'Product Description' heading
   */
    add_filter('woocommerce_product_description_heading', '__return_null');

}
//----------- woocomerce mini cart ------------
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {

    $fragments['.min-cart-count'] = '<span class="min-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';

    return $fragments;

}
