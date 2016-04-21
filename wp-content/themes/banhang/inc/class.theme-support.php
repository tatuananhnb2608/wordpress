<?php

function load_setup_themes() {
	load_theme_textdomain('banhang', get_template_directory().'/languages');
	add_theme_support('automatic-feed-links');

	add_theme_support('html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		));
	add_theme_support('post-formats', array(
			'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video',
		));
	add_theme_support('post-thumbnails');
	add_image_size('thumb-new', 80, 70, array('center', 'center'));
	// add_image_size('thumb-sp', 215, 184, array('center', 'center'));
	// // // add_image_size('thumbs-sp', 70, 70, array('center', 'center'));

	add_theme_support('custom-header');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('widgets');
	add_theme_support('menus');
	$defaults = array(
		'default-color'          => '#fff',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support('custom-background', $defaults);

	// register_nav_menus(
	// 	array(
	// 		'main-nav'   => 'Menu chính',
	// 		'footer-nav' => 'Footer menu',
	// 	)
	// );
	// add_action('menu', function () {
	// 		wp_nav_menu(array(
	// 				'theme_location'  => 'main-nav', // tên location cần hiển thị
	// 				'container'       => 'div', // thẻ container của menu
	// 				'container_class' => 'main-nav', //class của container
	// 				'menu_class'      => 'collapse navbar-collapse navbar-ex1-collapse clearfix'// class của menu bên trong
	// 			));
	// 	});
	// add_action('footer_navs', function () {
	// 		wp_nav_menu(array(
	// 				'theme_location'  => 'footer-nav', // tên location cần hiển thị
	// 				'container'       => 'div', // thẻ container của menu
	// 				'container_class' => 'col-md-8',
	// 				'container_id'    => 'menu-bottom',
	// 				'menu_class'      => ''// class của menu bên trong
	// 			));
	// 	});

}
add_action('after_setup_theme', 'load_setup_themes');

/// end load support

function load_style_script() {

	wp_register_script('jquery', THEME_URL.'/js/jquery.js');
	wp_enqueue_script('jquery');

	wp_register_script('bootstrapjs', THEME_URL.'/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('bootstrapjs');

	wp_register_script('carousel', THEME_URL.'/js/owl.carousel.min.js');
	wp_enqueue_script('carousel');

	wp_register_script('dcverticalmegamenu', THEME_URL.'/js/jquery.dcverticalmegamenu.1.3.js');
	wp_enqueue_script('dcverticalmegamenu');

	wp_register_script('hoverIntent', THEME_URL.'/js/jquery.hoverIntent.minified.js');
	wp_enqueue_script('hoverIntent');

	wp_register_script('wow', THEME_URL.'/js/wow.min.js');
	wp_enqueue_script('wow');

	wp_register_script('global', THEME_URL.'/js/global.js');
	wp_enqueue_script('global');

	wp_register_script('migrate', THEME_URL.'/js/jquery-migrate.min.js');
	wp_enqueue_script('migrate');

	wp_register_style('bootstrap_style', THEME_URL.'/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap_style');

	wp_register_style('carousel', THEME_URL.'/css/owl.carousel.min.css');
	wp_enqueue_style('carousel');

	wp_register_style('owl_theme', THEME_URL.'/css/owl.theme.default.min.css');
	wp_enqueue_style('owl_theme');

	wp_register_style('animate', THEME_URL.'/css/animate.min.css');
	wp_enqueue_style('animate');

	wp_register_style('vertical', THEME_URL.'/css/vertical-menu.css');
	wp_enqueue_style('vertical');

	wp_register_style('font-awesome', THEME_URL.'/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');

	wp_register_style('reset', THEME_URL.'/css/reset.css');
	wp_enqueue_style('reset');

	wp_register_style('wp-core', THEME_URL.'/css/wp-core.css');
	wp_enqueue_style('wp-core');

	wp_register_style('style', THEME_URL.'/style.css');
	wp_enqueue_style('style');

}

add_action('wp_enqueue_scripts', 'load_style_script');
?>