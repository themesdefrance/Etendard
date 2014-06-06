<article class="article">
	<div class="content">
		<p>
			<?php printf(apply_filters('etendard_sans_contenu', __("Désolé, aucun article n'a été trouvé. Revenez à <a href='%s' title='Revenir à l'accueil'>l'accueil</a> ou utilisez le champ de recherche ci-dessous :", 'etendard')) , home_url()); ?>
		</p>
		<?php get_search_form(); ?>
	
	</div>

</article>