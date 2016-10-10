<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php 
global $woocommerce_loop,$dh_ul_product_class;
$columns = isset($woocommerce_loop['columns']) ? ' columns-'.absint($woocommerce_loop['columns']):'';
$data_columns = isset($woocommerce_loop['columns']) ? absint($woocommerce_loop['columns']):'';
?>
<ul class="products<?php echo esc_attr($columns)?> <?php echo esc_attr($dh_ul_product_class)?>" data-columns="<?php echo esc_attr($data_columns)?>">