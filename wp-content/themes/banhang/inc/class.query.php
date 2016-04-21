<?php

add_action('query_new', function () {?>
								<?php
		$per_page = ot_get_option('s__b_i_vi_t_hi_n_th__');
		if (empty($per_page)) {
			$per_page = 2;
		}
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $per_page,

		);
		$loop = new WP_Query($args);
		if ($loop->have_posts()):
		while ($loop->have_posts()):$loop->the_post();?>
																														<!-- post -->
																															<ul>
																																<li>
																																	<a href="<?php the_permalink();?>" title="">
		<?php the_post_thumbnail('thumb-new');?>
																														</a>
																																	<a href="<?php the_permalink();?>" title="" class="news-title">
		<?php the_title();?>
																																	</a>
																																	<p class="post-date"><i class="fa fa-calendar"></i> <?php the_time('jS F Y')?></p>
																																</li>
																															</ul>
		<?php endwhile;?>
		<!-- post navigation -->
		<?php  else :?>
																															<!-- no posts found -->
																															<ul>
																																<li>
																																	<a href="<?php the_permalink();?>" title="">
																																		<img width="80" height="70" src="http://www.kenshoping.com/wp-content/uploads/2014/10/ecommerce-data-sets-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="ecommerce-data-sets">
																																	</a>
																																	<a href="<?php the_permalink();?>" title="" class="news-title">
																																		Tài khoản &amp; đơn hàng
																																	</a>
																																	<p class="post-date"><i class="fa fa-calendar"></i><?php the_time('jS F Y')?></p>
																																</li>
																															</ul>
		<?php endif;?>

		<?php
	});?>
