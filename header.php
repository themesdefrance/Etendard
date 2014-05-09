<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>
		<?php wp_title('|', true, 'right'); ?>
	</title>
	<link rel="shortcut icon" href="/favicon.ico?v=0">
	
	<meta name="viewport" content="width=device-width">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- Scripts that need to be loaded first -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]><p class=chromeframe>Votre navigateur est <em>trop vieux !</em> <a href="http://browsehappy.com/">Mettez votre navigateur à jour</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">installez Google Chrome Frame</a> pour afficher ce site correctement.</p><![endif]-->
	<header class="main-header">
		<div class="wrapper">
				<div class="logo-wrap">
					<?php if (get_option('etendard_logo')): ?>
						<a href="<?php echo home_url('/'); ?>" title="<?php echo get_bloginfo('name'); ?>">
							<img src="<?php echo get_option('etendard_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" />
						</a>
					<?php else: ?>
						<a href="<?php echo home_url('/'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="logotext">
							<?php echo get_bloginfo('name'); ?>
						</a>
					<?php endif; ?>
					
				</div>
			
			<nav class="main-menu">
				<label class="toggle-menu-icon" for="menu-toggle">
					<span class="icon-list"></span>
				</label>
				<input type="checkbox" id="menu-toggle" />
			
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class'     => 'top-level-menu',
					'container'      => false,
					'depth'          => 3,
					'fallback_cb'    => 'etendard_nomenu'
				)); 
				?>
			</nav>
		</div>
	</header>