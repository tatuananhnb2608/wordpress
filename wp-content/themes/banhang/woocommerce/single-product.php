<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
	exit;// Exit if accessed directly
}
?>
<?php get_header();?>
<div id="main">
	<div class="container">

<div class="col-lg-12">
<?php do_action('woocommerce_before_main_content');?>
</div>

		<div class="row">

			<!-- end sildebar  -->


			<div class="col-md-12">

<?php woocommerce_product_loop_start();?>

<?php woocommerce_product_subcategories();?>

<?php while (have_posts()):the_post();?>
<div class="col-sm-8" >

<?php
do_action('woocommerce_before_single_product_summary');

?>
</div>
					<!-- end -->
					<div class="col-sm-4">
<?php woocommerce_template_single_title();?>
<div class="gia">
<?php woocommerce_template_single_price();
?>
</div>
						<div class="khuyenmai">
<?php echo get_field('khuyen_mai');?>
</div>
						<div class="category">
<?php echo $product->get_categories(', ', '<span class="posted_in">'._n('Category:', 'Categories:', $cat_count, 'woocommerce').' ', '</span>');?>.
<?php echo $product->get_tags(', ', '<span class="tagged_as">'._n('Tag:', 'Tags:', $tag_count, 'woocommerce').' ', '</span>');?>
</div>
						<div class="tomtat">
							<span>MÔ TẢ NGẮN GỌN </span>
<?php woocommerce_template_single_excerpt();
?>
</div>

<?php woocommerce_template_single_add_to_cart();

?>
</div>
<?php endwhile;// end of the loop. ?>

<?php woocommerce_product_loop_end();?>
</div>
		</div>
		<!-- End content product  -->

	</div>
</div>

</div>
</div>
</div>
<div class="tab">
	<div class="col-md-12">
<?php
do_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
?>
</div>

</div>
</div>
<?php get_footer();
?>