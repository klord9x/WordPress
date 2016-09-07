<!-- Right -->
<div id="right_column" class="column">
    <div class="mini-cart-items">
    <?php woocommerce_mini_cart();
    ?>
    </div>
    <script type="text/javascript">
    var CUSTOMIZE_TEXTFIELD = 1;
    var customizationIdMessage = 'Customization #';
    var removingLinkText = 'remove this product from my cart';
    </script>
    <!-- MODULE Block cart -->
    <div id="cart_block" class="block exclusive">
        <h4><a href="#">GIỎ HÀNG</a>
        <span id="block_cart_expand" class="hidden">&nbsp;</span>
        <span id="block_cart_collapse">&nbsp;</span>
        </h4>

        <div class="block_content">
            <!-- block summary -->
            <div id="cart_block_summary" class="collapsed">
                <span class="ajax_cart_quantity">0</span>
                <span class="ajax_cart_product_txt_s">products</span>
                <span class="ajax_cart_product_txt" style="display:none">product</span>
                <span class="ajax_cart_total">00 VNĐ</span>
                <span class="ajax_cart_no_product" style="display:none">(empty)</span>
            </div>
            <!-- block list of products -->
            <div id="cart_block_list" class="expanded">
                <p class="hidden" id="cart_block_no_products">No products</p>
                <div class="cart-prices">
                    <div class="cart-prices-block">
                        <span>Shipping</span>
                        <span id="cart_block_shipping_cost" class="price ajax_cart_shipping_cost">00 VNĐ</span>
                    </div>
                    <div class="cart-prices-block">
                        <span>Total</span>
                        <span id="cart_block_total" class="price ajax_block_cart_total">00 VNĐ</span>
                    </div>
                </div>
                <p id="cart-buttons">
                    <a href="#" class="button" title="Check out">Check out</a>
                </p>
            </div>
        </div>
    </div>
    <!-- /MODULE Block cart -->
    <!-- Block payment logo module -->
    <div id="paiement_logo_block_left" class="paiement_logo_block">
        <a href="#">
                <img src="<?php echo get_template_directory_uri();?>/images/payments.png" alt="visa" width="230" height="150">
            </a>
    </div>
    <!-- /Block payment logo module -->
</div>
</div>
<div class="clearblock"></div>
