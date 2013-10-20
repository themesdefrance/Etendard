<?php 
/*
Template Name: Portfolio
*/
$terms = get_terms('portfolio_categorie');
?>
<?php get_header(); ?>

<section class="portfolio">
	<div class="wrapper">
		<?php if (count($terms) > 0): ?> 
		<nav class="categories">
			<ul>
				<li>
					<a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="<?php echo (is_post_type_archive('portfolio')) ? 'active' : ''; ?>">
						<?php _e('Tous', TEXT_TRANSLATION_DOMAIN); ?>
					</a>
				</li>
				<?php foreach ($terms as $term){ ?>
				<li>
					<a href="<?php echo get_term_link($term); ?>" class="<?php echo (is_tax('portfolio_categorie', $term)) ? 'active' : ''; ?>">
						<?php echo $term->name; ?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
		<?php endif; ?>
		
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