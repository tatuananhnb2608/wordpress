<?php
define(THEME_URL, get_template_directory_uri());
require ('inc/class.theme-support.php');
require ('inc/class.widget.php');
require ('inc/class.register-menu.php');
require ('inc/class.query.php');
require ('inc/woo-product.php');
require ('inc/all_layout_cart.php');
include ('plugin/advanced-custom-fields/acf.php');
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title) {
	return $title.esc_attr(get_bloginfo('name'));
}
function blankslate_custom_pings($comment) {
	$GLOBALS['comment'] = $comment;
	?>
																																																					<li <?php comment_class();
	?> id="li-comment-<?php comment_ID();?>"><?php echo comment_author_link();
	?></li>
	<?php
}
add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count) {
	if (!is_admin()) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id='.$id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}
