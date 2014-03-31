<?php if (is_active_sidebar('footer')):?>
<section class="footer-widgets">
	<div class="wrapper">
			<?php get_sidebar('footer'); ?>
		</div>
</section>
<?php endif; ?>

<footer class="main-footer">
	<div class="wrapper">
		<div class="col-1-2">
			<?php
				if(get_option("etendard_footer_gauche")) {
					echo strip_tags(get_option("etendard_footer_gauche"), '<strong><a><em><img>');
				}
				else{ ?>
					<strong>2014</strong> - Étendard par <a href="https://www.themesdefrance.fr" target="_blank">Thèmes de France</a>
				<?php } ?>
		</div>
		<div class="col-1-2">
			<nav class="footer-menu">
				<?php
				if(has_nav_menu('footer')){
					wp_nav_menu(array(
						'theme_location'=>'footer',
						'container'=>false,
						'depth'=>-1
					));
				}
				?>
			</nav>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>