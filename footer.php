<section class="home-sidebar">
	<div class="wrapper">
			<?php get_sidebar('footer'); ?>
		</div>
</section>
<?php if (get_option("etendard_footer_gauche") || get_option("etendard_footer_droite")): ?>
<footer class="main-footer">
	<div class="wrapper">
		<div class="col-1-2">
			<?php echo esc_html(get_option("etendard_footer_gauche")); ?>
		</div>
		<div class="col-1-2">
			<?php echo esc_html(get_option("etendard_footer_droite")); ?>
		</div>
	</div>
</footer>
<?php endif; ?>
<?php 
if (get_option("etendard_custom_css")){
	echo '<style type="text/css">';
	echo htmlentities(stripslashes(get_option("etendard_custom_css")), ENT_NOQUOTES);
	echo '</style>';
}
?>
<?php wp_footer(); ?>
</body>
</html>