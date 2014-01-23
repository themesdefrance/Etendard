<?php 
// On sort si on accède directement au fichier

if ( ! defined( 'ABSPATH' ) ) exit;
	
?>

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
		<?php bloginfo('name'); ?>
	</title>
<!--	<link rel="shortcut icon" href="/favicon.ico?v=0">-->
	
	<meta name="viewport" content="width=device-width">
	
	<!-- Candy -->
	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- Scripts that need to be loaded first -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php 
if (of_get_option("etendard_custom_css")){
	echo '<style type="text/css">';
	echo htmlentities(stripslashes(of_get_option("etendard_custom_css")), ENT_NOQUOTES);
	echo '</style>';
}
?>
<?php if (of_get_option("etendard_color")): $color = of_get_option("etendard_color"); ?>
<style>
section.realisation .realisation-client,
section.realisation .realisation-site,
div.pagination a,
.widget_etendardnewsletter .form-email:before,
form.search-form .search-submit-wrapper:before,
a.more-link,
ul.services .service h2:hover,
ul.portfolio .creation figcaption,
.temoignages .temoignage-headline,
.article .header-title a:hover,
.article.quote > blockquote cite,
.comment .comment-author{
	color: <?php echo $color; ?> !important;
}

.main-menu a:hover,
ul.portfolio .creation figure:hover figcaption,
.article.teaser .header-title:after,
#commentform #submit,
.widget_calendar #today,
section.portfolio nav.categories a:hover,
section.portfolio nav.categories a.active,
.widget_etendardnewsletter input[type="submit"],
.widget_etendardsocial li a,
.cta-button,
.contact-form .submit input{
	background: <?php echo $color; ?> !important;
	color: #fff !important;
}

.toplevel > li > a.active{
	border-bottom: 2px solid <?php echo $color; ?> !important;;
}
.main-menu .sub-menu:before{
	border-bottom: 3px solid <?php echo $color; ?> !important;;
}

.article.teaser .header-title:hover:after,
.widget_etendardsocial li a:hover,
.cta-button:hover,
.contact-form .submit input:hover{
	background:#696969 !important;
}
form.search-form .search-submit-wrapper:hover:before,
div.pagination a:hover{
	color:#696969 !important;
}
</style>
<?php endif; ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header class="main-header">
		<div class="wrapper">
			<?php if (of_get_option('etendard_logo')): ?>
			<div class="logo-wrap">
				<a href="<?php echo home_url('/'); ?>">
					<img src="<?php echo of_get_option('etendard_logo'); ?>" alt="<?php echo get_bloginfo('title'); ?>" />
				</a>
			</div>
			<?php endif; ?>
			
			<nav class="main-menu">
			<?php
			wp_nav_menu(array(
				'theme_location'=>'primary',
				'menu_class'=>'toplevel',
				'container'=>false,
				'depth'=>2
			)); 
			?>
			</nav>
		</div>
	</header>