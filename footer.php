<?php 
// On sort si on accède directement au fichier

if ( ! defined( 'ABSPATH' ) ) exit;
	
?>

<section class="footer-widgets">
	<div class="wrapper">
			<?php get_sidebar('footer'); ?>
		</div>
</section>
<?php if (of_get_option("etendard_footer_gauche") || of_get_option("etendard_footer_droite")): ?>
<footer class="main-footer">
	<div class="wrapper">
		<div class="col-1-2">
			<?php echo of_get_option("etendard_footer_gauche"); ?>
		</div>
		<div class="col-1-2">
			<?php echo of_get_option("etendard_footer_droite"); ?>
		</div>
	</div>
</footer>
<?php endif; ?>
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
<?php wp_footer(); ?>
</body>
</html>