<?php if (is_active_sidebar('footer')):?>
	<section class="footer-widgets">
		<div class="wrapper">
			
			<?php do_action('etendard_footer_widgets_top'); ?>
			
				<?php dynamic_sidebar('footer'); ?>
			
			<?php do_action('etendard_footer_widgets_bottom'); ?>
			
		</div>
	</section>
<?php endif; ?>

<footer class="main-footer">
	<div class="wrapper">
		
		<?php do_action('etendard_footer_top'); ?>
		
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
		
		<?php do_action('etendard_footer_bottom'); ?>
		
	</div>
	
	<a href="#" id="remonter" class="icon-totop" style="display:none;" title="<?php _e('Top', 'etendard'); ?>"></a>
	
</footer>

<?php wp_footer(); ?>
</body>
</html>