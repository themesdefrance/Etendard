<?php /* Template Name: Blog */ ?>
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
			<?php _e('Blog', TEXT_TRANSLATION_DOMAIN); ?>
		</h2>
		<div class="col-2-3">
			<ul class="articles">
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<?php get_template_part('content', get_post_format()); ?>
				</li>
				<?php endwhile; ?>
				<?php /*
				<li>
					<article class="article">
						<header class="header">
							<img src="http://placehold.it/800x200" />
							<h1 class="header-title">
								Titre de l'article
							</h1>
							<span class="header-meta">
								Publiéé le bidule | 12 commentaires
							</span>
						</header>
						<div class="content">
							Lorem ipsudm dolor si maet
						</div>
						<a href="#" class="more-link">
							Lire la suite
						</a>
					</article>
				</li>
				<li>
					<article class="article alternate">
						<header class="header">
							<img src="http://placehold.it/800x800" class="header-image" />
							<h1 class="header-title">
								Un article un peu différent?
							</h1>
							<span class="header-meta">
								Publiéé le bidule | 12 commentaires
							</span>
						</header>
						<div class="content">
							Lorem ipsudm dolor si maet
						</div>
						<a href="#" class="more-link">
							Lire la suite
						</a>
					</article>
				</li>
				<li>
					<article class="article quote">
						<blockquote>
							<p>
								quote content
							</p>
							<footer>
								<cite>
									Par Nap'
								</cite>
							</footer>
						</blockquote>
						<span class="header-meta">
							Publiéé le bidule | 12 commentaires
						</span>
					</article>
				</li>
				<li>
					<article class="article link">
						<h1 class="header-title">
							<a href="">
								Lien vrs un site
							</a>
						</h1>
						<span class="header-meta">
							Publiéé le bidule | 12 commentaires
						</span>
					</article>
				</li>
				*/ ?>
			</ul>
			<div class="pagination">
				<?php etendard_posts_nav(false); ?>
			</div>
		</div>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>