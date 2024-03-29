<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
	exit;// Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop'])) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns'])) {
	$woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);
}

// Ensure visibility
if (!$product || !$product->is_visible()) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if (0 == ($woocommerce_loop['loop']-1)%$woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns']) {
	$classes[] = 'first';
}
if (0 == $woocommerce_loop['loop']%$woocommerce_loop['columns']) {
	$classes[] = 'last';
}
?>
<div class="col-lg-3 col-sm-4 col-xs-6">
<div class="box wow fadeInDown">

<?php do_action('woocommerce_before_shop_loop_item');?>

	<a href="<?php the_permalink();?>">

<?php
/**
 * woocommerce_before_shop_loop_item_title hook
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
do_action('woocommerce_before_shop_loop_item_title');

/**
 * woocommerce_shop_loop_item_title hook
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */?>
<a href="" class="title-product">
<?php the_title();?>
oke
</a>
<?php

/**
 * woocommerce_after_shop_loop_item_title hook
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
do_action('woocommerce_after_shop_loop_item_title');// gia
?>


<?php

/**
 * woocommerce_after_shop_loop_item hook
 *
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
?>
<div class="add-to-cart">
<?php do_action('woocommerce_after_shop_loop_item');?>
</div>
<?php

?>
</div>
</div>
