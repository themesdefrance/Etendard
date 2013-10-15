<?php 
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>

<section class="portfolio">
	<div class="wrapper">
		<nav class="categories">
			<ul>
				<li>
					<a href="#" class="active">
						Tout
					</a>
				</li>
				<li>
					<a href="">
						Catégorie 1
					</a>
				</li>
				<li>
					<a href="">
						Catégorie 2
					</a>
				</li>
				<li>
					<a href="">
						Catégorie 3
					</a>
				</li>
			</ul>
		</nav>
		<ul class="portfolio">
			<?php while (have_posts()) : the_post(); ?>
			<li class="creation">
				<a href="<?php the_permalink(); ?>">
					<figure class="">
						<div class="entry-thumbnail">
							<?php if (has_post_thumbnail() && !post_password_required()): ?>
							<?php the_post_thumbnail(array(310,230)); ?>
							<?php endif; ?>
						</div>
						<figcaption>
							<?php the_title(); ?>
						</figcaption>
					</figure>
				</a>
				<p class="excerpt">
					<?php the_excerpt(); ?>
				</p>
				<div class="cta-wrapper">
					<a href="<?php the_permalink(); ?>" class="cta-button">
						<?php _e('Découvrir le projet', TEXT_TRANSLATION_DOMAIN); ?>
					</a>
				</div>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>

<?php get_footer(); ?>