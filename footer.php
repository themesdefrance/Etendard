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
				else{  
					_e('<strong>2014</strong> - Étendard by <a href="https://www.themesdefrance.fr" target="_blank">Themes de France</a>', 'etendard');
				} ?>
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
	
	<a href="#" id="remonter" class="icon-totop" style="display:none;" title="<?php _e('Top', 'etendard'); ?>"></a>
	
</footer>

<?php wp_footer(); ?>
</body>
</html>