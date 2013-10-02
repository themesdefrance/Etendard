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
					<p>
						Lorem ipsum and shit lol
					</p>
					<p>
						Un second paragraphe cool.
					</p>
					<h1>
						Inner h1
					</h1>
					<h2>
						Inner h2
					</h2>
					<h3>
						Inner h3
					</h3>
					<h4>
						Inner h4
					</h4>
					<h5>
						Inner h5
					</h5>
					<h6>
						Inner h6
					</h6>
					<blockquote>
						<p>
							Citation
						</p>
						<footer>
							<cite>
								Par lol
							</cite>
						</footer>
					</blockquote>
					<ul>
						<li>
							ul avec vraiment beaucoup beaucoup de texte parce qu'il faut que ca prenne plusieurs lignes et que putain elles sont longues ces lignes
						</li>
						<li>
							ul
						</li>
						<li>
							ul
						</li>
					</ul>
					<ol>
						<li>
							ol avec vraiment beaucoup beaucoup de texte parce qu'il faut que ca prenne plusieurs lignes et que putain elles sont longues ces lignes
						</li>
						<li>
							ul
						</li>
						<li>
							ul
						</li>
					</ol>
					
					<form>
						formulaire de commentaire
					</form>
					<ol>
						<li>
							commentaire
						</li>
					</ol>
				</div>
			</article>
		</div>
		<div class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>