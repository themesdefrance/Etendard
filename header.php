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

	<?php do_action('etendard_body_top'); ?>
	
	<header class="main-header">
		<div class="wrapper">
				<div class="logo-wrap">
					<?php if (get_option('etendard_logo')): ?>
						<a href="<?php echo home_url('/'); ?>" title="<?php echo get_bloginfo('name'); ?>">
							<img src="<?php echo get_option('etendard_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" />
						</a>
					<?php else: ?>
						<a href="<?php echo home_url('/'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="logotext">
							<?php echo apply_filters('etendard_entete_titre', get_bloginfo('name')); ?>
						</a>
					<?php endif; ?>
					
				</div><!--END .logo-wrap-->
			
			<nav class="main-menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<a id="toggle-menu-icon">
					<span class="icon-list"></span>
				</a>
			
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class'     => 'top-level-menu',
					'container'      => false,
					'depth'          => 3,
					'fallback_cb'    => 'etendard_nomenu'
				)); 
				?>
			</nav><!--END .main-menu-->
		</div><!--END .wrapper-->
	</header><!--END .main-header-->