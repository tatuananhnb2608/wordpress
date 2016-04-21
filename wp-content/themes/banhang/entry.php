<article id="post-<?php the_ID();?>" <?php post_class();
?>>

	<div class="col-sm-4">
<?php if (is_singular()) {echo '<h1 class="title">';} else {echo '<h2 class="entry-title">';}?><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark"><?php the_title();
?></a><?php if (is_singular()) {echo '</h1>';} else {echo '</h2>';}?> <?php edit_post_link();
?>
<?php if (!is_search()) {get_template_part('entry', 'meta');
}
?>
<?php get_template_part('entry', (is_archive() || is_search()?'summary':'content'));?>
<?php if (!is_search()) {get_template_part('entry-footer');
}
?>
<div class="span4">
		<a class="thumbnail" href="<?php the_permalink();?>">
<?php the_post_thumbnail('shop_catalog');?>
		</a>

	</div>

</div>

</article>