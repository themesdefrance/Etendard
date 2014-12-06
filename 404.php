<?php get_header(); ?>

<section class="blog">
	<div class="wrapper" role="main" itemprop="mainContentOfPage">
		<h1 class="header-title" itemprop="headline">
			<?php _e('Oops, there is nothing here...', 'etendard'); ?>
		</h1>
		<div class="content" itemprop="articleBody">
			<img src="<?php echo get_template_directory_uri()."/img/triste.png" ?>" alt="<?php _e('Error 404', 'etendard'); ?>" class="smiley-404">
			<p>
				<?php printf(__("The page you requested does not seem to exist. <a href=\"%s\">Click here</a> to get back to the home page.", 'etendard'), home_url()); ?>
			</p>
		</div>
	</div>
</section>
<?php get_footer(); ?>