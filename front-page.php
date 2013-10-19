<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<section class="description">
	<div class="wrapper">
		<h1>
			<?php echo get_bloginfo('title'); ?>
		</h1>
		<p>
			<?php echo get_bloginfo('description'); ?>
		</p>
	</div>
</section>

<?php if (get_option('etendard_slider')): ?>
<section class="slider">
	slider
</section>
<?php endif; ?>

<?php if (get_option('etendard_services')): ?>
<section class="services">
	<div class="wrapper">
		<ul class="services">
			<li class="service">
				<h2>
					Service 1
				</h2>
				<p>
					Cum saepe multa, tum memini domi in hemicyclio sedentem, ut solebat, cum et ego essem una et pauci admodum familiares, in eum sermonem una et.
				</p>
				<a href="#" class="more-link">
					Lire la suite
				</a>
			</li>
			<li class="service">
				<h2>
					Service 1
				</h2>
				<p>
					Cum saepe multa, tum memini domi in hemicyclio sedentem, ut solebat, cum et ego essem una et pauci admodum familiares, in eum sermonem una et.
				</p>
				<a href="#" class="more-link">
					Lire la suite
				</a>
			</li>
			<li class="service">
				<h2>
					Service 1
				</h2>
				<p>
					Cum saepe multa, tum memini domi in hemicyclio sedentem, ut solebat, cum et ego essem una et pauci admodum familiares, in eum sermonem una et.
				</p>
				<a href="#" class="more-link">
					Lire la suite
				</a>
			</li>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php get_template_part('call_to_action'); ?> 

<?php $portfolios = new WP_Query(array('posts_per_page'=>3, 'post_type'=>'portfolio')); ?>
<?php if ($portfolios->have_posts()): ?>
<section class="portfolio">
	<div class="wrapper">
		<h2 class="center">
			<?php _e('Derniers travaux', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<ul class="portfolio">
			<?php while ($portfolios->have_posts()) : $portfolios->the_post(); ?>
			<li class="creation">
				<a href="<?php the_permalink(); ?>">
					<figure class="icon-search">
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
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="cta-wrapper">
			<a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="cta-button">
				<?php _e('Consulter le portfolio', TEXT_TRANSLATION_DOMAIN); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php $posts = new WP_Query(array('posts_per_page'=>4, 'ignore_sticky_posts'=>true)); ?>
<?php if ($posts->have_posts()): ?>
<section class="blog">
	<div class="wrapper">
		<h2 class="center">
			<?php _e('Derniers articles', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<ul class="blog">
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
			<li>
				<article class="article teaser">
					<header class="header">
						<?php if (has_post_thumbnail() && !post_password_required()): ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>
						<h3 class="header-title">
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h3>
						<span class="header-meta">
							<?php echo sprintf('%2$s', get_post_format_string(get_post_format()), get_the_date()); ?> |
							<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
						</span>
					</header>
					<div class="content">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="more-link">
						<?php _e('Lire la suite', TEXT_TRANSLATION_DOMAIN); ?>
					</a>
				</article>
			</li>
			<?php endwhile; ?>
		</ul>
		<div class="cta-wrapper">
			<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="cta-button">
				<?php _e('Consulter les articles', TEXT_TRANSLATION_DOMAIN); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>