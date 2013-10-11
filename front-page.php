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

<?php if (get_option('etendard_home_cta')): ?>
<section class="cta">
	<div class="wrapper">
		<p class="cta-text">
			Super important midgets run through the hall looking for candy digesting a dandy.<br />
			Super important midgets run through the hall looking for candy digesting a dandy.
			Super important midgets run through the hall looking for candy digesting a dandy.
			Super important midgets run through the hall looking for candy digesting a dandy.
		</p>
		<div class="button-wrapper">
			<a href="#" class="cta-button">
				Cliquez ici
			</a>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (get_option('etendard_portfolio')): ?>
<section class="portfolio">
	<div class="wrapper">
		<h2 class="center">
			Derniers travaux
		</h2>
		<ul class="portfolio">
			<li class="creation">
				<a href="#">
					<figure class="icon-search">
						<img src="http://placehold.it/500x300" />
						<figcaption>
							Portfolio 1
						</figcaption>
					</figure>
				</a>
			</li>
			<li class="creation">
				<a href="#">
					<figure>
						<img src="http://placehold.it/500x300" />
						<figcaption>
							Portfolio 1
						</figcaption>
					</figure>
				</a>
			</li>
			<li class="creation">
				<a href="#">
					<figure>
						<img src="http://placehold.it/500x300" />
						<figcaption>
							Portfolio 1
						</figcaption>
					</figure>
				</a>
			</li>
		</ul>
		<div class="cta-wrapper">
			<a href="#" class="cta-button">
				Consulter le portfolio
			</a>
		</div>
	</div>
</section>
<?php endif; ?>

<?php $posts = new WP_Query(array('posts_per_page'=>4, 'ignore_sticky_posts'=>true)); ?>
<?php if ($posts->have_posts()){ ?>
<section class="blog">
	<div class="wrapper">
		<h2 class="center">
			Derniers articles
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
<?php } ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>