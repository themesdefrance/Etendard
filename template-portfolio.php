<?php 
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>

<?php get_template_part('header-bar'); ?>

<?php 
$terms = get_terms('portfolio_categorie');

global $wp_query;

if (is_tax('portfolio_categorie') || is_post_type_archive('portfolio')) $query = $wp_query;
else{
	$args = array(
			'post_type'=>'portfolio',
			'orderby'=>'menu_order',
			'order'=>'ASC',
			'posts_per_page'=>-1,
			'nopaging'=>true
	);
	$query = new WP_Query($args);
}
?>
<section class="portfolio">
	<div class="wrapper">
		<?php if (count($terms) > 0): ?> 
		<nav class="categories">
			<ul>
				<li>
					<a href="<?php echo etendard_portfolio_page_link(); ?>" class="<?php echo (!is_tax('portfolio_categorie')) ? 'active' : ''; ?>">
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
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<?php
			$icon = '';
			switch (get_post_format()){
				case 'video':
					$icon = 'icon-play';
					break;
				default:
					$icon = 'icon-ellipsis';
					break;
			}
			?>
			<li class="creation">
				<a href="<?php the_permalink(); ?>">
					<figure class="<?php echo $icon; ?>">
						<div class="entry-thumbnail">
							<?php if (has_post_thumbnail() && !post_password_required()): ?>
							<?php the_post_thumbnail('etendard-portfolio-thumbnail'); ?>
							<?php endif; ?>
						</div>
						<figcaption>
							<?php the_title(); ?>
						</figcaption>
					</figure>
				</a>
				
				<?php if(get_option('etendard_extraits_portfolio') != 'non'){ ?>
					<p class="excerpt">
						<?php the_excerpt(); ?>
					</p>
				<?php } ?>
				
				<?php if(get_option('etendard_boutons_portfolio') != 'non'){ ?>
					<div class="cta-wrapper">
						<a href="<?php the_permalink(); ?>" class="cta-button">
							<?php _e('Découvrir le projet', TEXT_TRANSLATION_DOMAIN); ?>
						</a>
					</div>
				<?php } ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>