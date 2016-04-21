<?php
register_nav_menus(array(
		'menu-top'            => 'menu top',
		'container-main-menu' => ' container main menu',
		'mega-menu'           => 'Menu Top Content Left ',
		'nav-menu'            => 'Menu Top nav menu  ',
		'nav-menu-mobi'       => 'Menu mobi ',
	));
add_action('banhang_menu-top', function () {
		wp_nav_menu(array(
				'theme_location'  => 'menu-top', // tên location cần hiển thị
				'container'       => 'div', // thẻ container của menu
				'container_class' => 'menu-top',
				'menu_class'      => 'menu', // class của menu bên trong
				'menu_id'         => 'menu-menu-phu',
			));
	});
add_action('banhang_container-main-menu-mobi', function () {
		wp_nav_menu(array(
				'theme_location'  => 'nav-menu-mobi', // tên location cần hiển thị
				'container'       => 'div', // thẻ container của menu
				'container_class' => 'off-canvas-inner',
				'menu_class'      => 'menu', // class của menu bên trong
			));
	});
add_action('banhang_mega-menu', function () {
		wp_nav_menu(array(
				'theme_location' => 'mega-menu', // tên location cần hiển thị
				// 'container'       => 'div', // thẻ container của menu
				// 'container_class' => 'dcjq-vertical-mega-men',
				'menu_class' => 'menu',
				'menu_id'    => 'mega',
			));
	});
add_action('banhang_nav-menu', function () {
		wp_nav_menu(array(
				'theme_location'  => 'nav-menu', // tên location cần hiển thị
				'container_class' => 'container-main-menu',
				'container'       => 'nav', // thẻ container của menu
			));

	});

function add_search_to_wp_menu($items, $args) {
	if ('nav-menu' === $args->theme_location) {
		$items .= '<li class="search menu-item menu-item-search">';
		$items .= '<form id="searchform" method="get" class="menu-search-form" action="'.get_bloginfo('home').'/"><p><input class="text_input" type="text" value="Enter Text &amp; Click to Search" name="s" id="s" onfocus="if (this.value == \'Enter Text &amp; Click to Search\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'Enter Text &amp; Click to Search\';}" /><input type="submit" class="my-wp-search"  id="searchsubmit" value="search" /></p></form>';
		$items .= '</li>';
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'add_search_to_wp_menu', 10, 2);

?>