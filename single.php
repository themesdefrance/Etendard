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
				<ul>
					<li>
						<a href="">some content hail</a>
					</li>
					<li>
						<a href="">some content hail</a>
					</li>
				</ul>
			</div>
			<div class="module module-social">
				<h3>
					Réseaux sociaux
				</h3>
				<ul>
					<li>
						<a href="">
							&#xe003;
						</a>
					</li>
					<li>
						<a href="">
							&#xe004;
						</a>
					</li>
				</ul>
			</div>
			<div class="module module-recherche">
				<form role="search" method="get" class="search-form" action="http://localhost/whyblog/">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input class="search-field" placeholder="Search …" value="" name="s" title="Search for:" type="search">
					</label>
					<span class="search-submit-wrapper">
						<input class="search-submit" value="Search" type="submit">
					</span>
				</form>
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