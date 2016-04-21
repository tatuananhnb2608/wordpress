

<?php add_action('sale_product_tw', function () {?>

		<?php $args = array('post_type' =>
			'product', 'posts_per_page'    => 8, 'meta_key'    => 'khuyen_mai', 'orderby'    => 'rand',
			'posts_per_page'               => 1,

		); $loop = new WP_Query($args);if
		($loop->have_posts()) {while
			($loop->have_posts()):$loop->the_post();?>
											<div class="item">
												<div class="">
													<div class="box wow fadeInDown">
														<a class="post-img" title="<?php the_title();?>" href="<?php
			the_permalink();?>">
															<div class="screen">
																<div class="frame">             <?php wc_get_template('loop/sale-
								flash.php');?>
																	<?php the_post_thumbnail('shop_catalog');?>
																</div>
															</div>
														</a>
														<a id="" class="title-product" href="<?php the_permalink();?>"
															title="<?php the_title();?>">             <?php the_title();
			?></a>
															<div class="price">
																<span class="amount">             <?php do_action('_price');?>
																</span>
															</div>
															<div class="add-to-cart">             <?php do_action('add_cart');?>
															</div>
														</div>
													</div>
												</div>             <?php endwhile;} else {echo
			__('No products found');
		}wp_reset_postdata();
		?>

		<?php });?>







<?php add_filter('__product', function () {?>
										<?php
		$home_products = ot_get_option('category_home');
		if ($home_products) {
			foreach ($home_products as $product_cat_id) {
				$pr_term = get_term($product_cat_id, 'product_cat');
				?>
																		<div class="widget list-product">
																			<h3 class="title-module">
																				<a href="<?php echo get_term_link($pr_term->slug, 'product_cat');?>" title=""><i class="fa fa-apple"></i> <?php echo $pr_term->name;
				?></a>
																				</h3>
																				<div class="row">

				<?php
				$agrs = array(
					'post_type'   => 'product',
					'post_status' => 'publish',
					'showposts'   => 4,
					'tax_query'   => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'id',
							'terms'    => $product_cat_id,
						)
					)
				);
				$productshome = new WP_Query($agrs);
				while ($productshome->have_posts()):$productshome->the_post();
				?>
																					<div class="col-lg-3 col-sm-4 col-xs-6">
																						<div class="box wow fadeInDown">
																							<a class="post-img" title="" href="<?php the_permalink();?>">
																								<div class="screen">
																									<div class="frame">
				<?php wc_get_template('loop/sale-
														flash.php');?>
																										<?php the_post_thumbnail('shop_catalog');?>
																									</div>
																								</div>
																							</a>
																							<a id="" class="title-product" href="<?php get_permalink();?>" title=""><?php the_title();
				?></a>
																								<div class="price">
																									<span class="amount">
				<?php do_action('_price');?>
				</span>
																								</div>
																								<div class="add-to-cart">
				<?php do_action('add_cart');?>
				</div>
																							</div>
																						</div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
				<div class="clear"></div>
																					</div>
																				</div>

				<?php
			}
		}

		?>

		<?php });?>




