<?php get_header();?>

<?php if (have_posts()):?>
	<div class="container">
		<div class="row">
			<h1 class="entry-title"><?php printf(__('Search Results for: %s', 'blankslate'), get_search_query());?></h1>
		</header>
<?php while (have_posts()):the_post();?>
			<?php get_template_part('entry');?>

<?php endwhile;?>
		<?php get_template_part('nav', 'below');?>
	<?php  else :?>

		<h2 class="entry-title"><?php _e('Nothing Found', 'blankslate');?></h2>

		<section class="entry-content">
			<p class="bg-dannger">
				<h3 style="background: green; color: white; padding: 50px 0px;">Xin lỗi không có kết quả trả về <a style="color: white;" class="btn btn-danger" href="<?php echo get_home_url();?>">BACK HOME </a></h3>

			</p>
<?php get_search_form();?>
</div>
	</div>


<?php endif;?>

<?php get_footer();?>