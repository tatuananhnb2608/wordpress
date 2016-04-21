<?php get_header();?>
<div class="container">

	<div class="row">
		<div class="col-md-12">
<?php if (have_posts()):while (have_posts()):the_post();?>
<article id="post-<?php the_ID();?>" <?php post_class();
?>>

<h1 class="entry-title"><?php the_title();
?></h1>

<?php edit_post_link();
?>
<section  style="border-left: 1px solid green;border-right: 1px solid green;border-bottom: 1px solid green;padding-left: 5px;padding-right: 5px;padding-left: 5px;border-radius: 5px;">
<?php if (has_post_thumbnail()) {the_post_thumbnail();}?>
<?php the_content();?>
<div class="entry-links"><?php wp_link_pages();?></div>
</section>
</article>
<?php if (!post_password_required()) {comments_template('', true);
}
?>
<?php endwhile;
endif;
?>
</div>
	</div>
</div>


<?php get_footer();?>