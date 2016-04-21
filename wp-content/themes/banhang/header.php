<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(' | ', true, 'right');?></title>
<?php wp_head();?>
</head>
<body <?php body_class().'home main';?>>
	<div class="wrapper">
		<div id="header-wrapper">
			<header id="header" class="header">
				<div class="info-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
<?php
do_action('banhang_menu-top');
?>
</div>
						</div>
					</div>
				</div>
				<div id="logo">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-sm-12 col-xs-12">
								<div class="logo">
									<a href="<?php echo home_url();?>" title="">
<?php $logo = ot_get_option('logo');
if (!empty($logo)) {
	echo '<img src="'.$logo.'" alt="" />';
} else {
	the_title('<h1>', '<h1>', 'name');
}
?>
</a>
									</div>
								</div>
								<div class="col-lg-8 col-lg-offset-1 col-sm-12 col-xs-12">
<?php echo ot_get_option('phuong_thuc');?>
</div>
						</div>
					</div>
				</div>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button type="button" class="navbar-toggle off-canvas-toggle" id="show-menu">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</nav>
				<div id="off-canvas">
<?php do_action('banhang_container-main-menu-mobi');?>
</div>
				<div class="wrapper-menu">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
<?php do_action('banhang_nav-menu');?>
							</div>
						</div>
					</div>
				</div>
			</header><!-- /header -->
		</div>