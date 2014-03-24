<?php if (is_active_sidebar('footer')):?>
<section class="footer-widgets">
	<div class="wrapper">
			<?php get_sidebar('footer'); ?>
		</div>
</section>
<?php endif; ?>

<?php if (get_option("etendard_footer_gauche") || wp_nav_menu(array('theme_location'=>'footer'))): ?>
<footer class="main-footer">
	<div class="wrapper">
		<div class="col-1-2">
			<?php echo strip_tags(get_option("etendard_footer_gauche"), '<strong><a><em><img>'); ?>
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
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>