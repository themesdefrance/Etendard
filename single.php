<?php get_header(); ?>
<header class="main-header">
	<div class="wrapper">
		<div class="logo-wrap">
			<img src="" class="logo" />
		</div>
		<nav class="main-menu">
			<ul>
				<li>
					<a href="#">
						Accueil
					</a>
				</li>
				<li>
					<a href="#">
						A Propos
					</a>
				</li>
			</ul>
		</nav>
	</div>
</header>

<section class="blog grid">
	<div class="wrapper">
		<h2 class="section-title">
			Blog
		</h2>
		<div class="col-2-3">
			<?php /* The loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('content', get_post_format()); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>