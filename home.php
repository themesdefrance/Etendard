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
			Blog
		</h2>
		<div class="col-2-3">
			<ul class="articles">
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
			</ul>
			<div class="pagination">
				<a href="">1</a> | <span class="current">2</span> | <a href="">3</a>
			</div>
		</div>
		<div class="sidebar col-1-3">
			<div class="module module-newsletter">
				<h3>
					Newsletter
				</h3>
				<p>
					Abonnez-vous à notre newsletter 
	et recevez des astuces tous les jeudi matins.
				</p>
				<form>
					<span class="form-email">
						<input type="email" />
					</span>
					<span class="form-submit">
						<input type="submit" value="Recevoir les news" />
					</span>
				</form>
			</div>
			<div class="module module-populaire">
				<h3>
					Articles populaires
				</h3>
				content and stuff
			</div>
			<div class="module module-populaire">
				<h3>
					Réseaux sociaux
				</h3>
				content and stuff
			</div>
			<div class="module module-recherche">
				recherche
			</div>
			<div class="module module-apropos">
				<h3>
					A propos
				</h3>
				more content
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>