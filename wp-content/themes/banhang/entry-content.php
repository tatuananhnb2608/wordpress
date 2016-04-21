<div id="main">
	<div class="container">
		<div class="row">
<?php get_sidebar();?>
<!-- end sidebar  -->

			<div class="col-lg-9 col-sm-12 col-xs-12">
				<div class="content-main">
					<div class="slider-box-tab">
<?php do_action('slider');?>
<section class="tabs clear">
							<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
							<label for="tab-1" class="tab-label-1"><i class="fa fa-heart-o"></i> Sản phẩm mới</label>
							<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
							<label for="tab-2" class="tab-label-2"><i class="fa fa-briefcase"></i> Sản phẩm nổi bật</label>
							<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3">
							<label for="tab-3" class="tab-label-3"><i class="fa fa-users"></i> Sản phẩm giảm giá</label>
							<div class="clear-shadow"></div>
							<div class="content">
								<div class="content-tab content-1">
									<div class="widget-odd list-product-tab">
										<div class="row">
<?php
$page = ot_get_option('san_pham_moi');
echo do_shortcode('[recent_products per_page="'.$page.'"]');

?>
<div class="clear-shadow"></div>
</div>
									</div>
								</div>
								<div class="content-tab content-2">
									<div class="widget-odd list-product-tab">
										<div class="row">
<?php
echo do_shortcode('[featured_products]');
?>
<div class="clear-shadow"></div>
</div>
									</div>
								</div>
								<div class="content-tab content-3">
									<div class="widget-odd list-product-tab">
										<div class="row">
<?php

echo do_shortcode('[sale_products]');
?>
</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="widget list-product ew_promotion_product">
						<h3 class="title-module">
							<span><i class="fa fa-rocket"></i> Sản phẩm khuyến mãi</span>
						</h3>
						<div class="promotion-products">
							<div id="owl-selling" class="owl-carousel">
<?php do_action('sale_product_tw');?>
</div>
							<!-- end san pham giam gia  -->
						</div>
					</div>
<?php apply_filters('__product', '');?>
</div>
				</div>
			</div>
		</div>
