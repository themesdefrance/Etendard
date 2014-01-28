<section class="footer-widgets">
	<div class="wrapper">
			<?php get_sidebar('footer'); ?>
		</div>
</section>
<?php if (of_get_option("etendard_footer_gauche") || of_get_option("etendard_footer_droite")): ?>
<footer class="main-footer">
	<div class="wrapper">
		<div class="col-1-2">
			<?php echo strip_tags(of_get_option("etendard_footer_gauche"), '<strong><a><em><img>'); ?>
		</div>
		<div class="col-1-2">
			<?php echo strip_tags(of_get_option("etendard_footer_droite"), '<strong><a><em><img>'); ?>
		</div>
	</div>
</footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>