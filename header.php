<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>
		<?php wp_title('|', true, 'right'); ?>
		<?php bloginfo('name'); ?>
	</title>
	<meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
<!--	<link rel="shortcut icon" href="/favicon.ico?v=0">-->
	
	<meta name="viewport" content="width=device-width">
	
	<!-- Candy -->
	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/style.css">
	<link href='http://fonts.googleapis.com/css?family=Sanchez:400,400italic|Maven+Pro:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=0">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- Scripts that need to be loaded first -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header class="main-header">
		<div class="wrapper">
			<?php if (get_header_image()): ?>
			<div class="logo-wrap">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php header_image(); ?>" alt="<?php echo get_bloginfo('title'); ?>" />
				</a>
			</div>
			<?php endif; ?>
			<?php
			wp_nav_menu(array(
				'theme_location'=>'primary',
				'container'=>'nav',
				'container_class'=>'main-menu',
				'menu_class'=>'toplevel',
				'depth'=>2
			)); 
			?>
		</div>
	</header>