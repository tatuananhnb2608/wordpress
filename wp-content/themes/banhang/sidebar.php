<div class="col-lg-3 sidebar">
				<div class="widget menu-sp">
					<h3 class="title-module">
						<i class="fa fa-th-list"></i> Danh mục sản phẩm
					</h3>
					<div class="dcjq-vertical-mega-menu">
<?php do_action('banhang_mega-menu');?>
</div>
				</div>
				<!-- end menu san pham -->
				<div class="widget list-news-sidebar">
					<h3 class="title-module">
						<i class="fa fa-pencil"></i> Tin tức
					</h3>
<?php do_action('query_new');?>
</div>
<?php dynamic_sidebar('facebook-widget');?>
				<?php dynamic_sidebar('suport-widget');?>
				<?php do_action('ads');?>
</div>
