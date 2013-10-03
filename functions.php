<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
				
register_sidebar(array(
		'name'          => __('Widgets de pied de page', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'footer',
		'description'   => __('Section apparaissant en bas de toutes les pages.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
register_sidebar(array(
		'name'          => __('Widgets de blog', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'blog',
		'description'   => __('Barre latérale sur les pages du blog.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
add_theme_support('post-thumbnails');


//derived from http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
/**
 @param $extremes : afficher ou non les liens précédent/suivant
 @param $separator : chaine à insérer entre chaque page
*/
function etendard_posts_nav($extremes=true, $separator='|'){
	if (is_singular()) return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if($wp_query->max_num_pages <= 1) return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);

	/**	Add current page to the array */
	if ($paged >= 1) $links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ($paged >= 3){
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2 ) <= $max){
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	
	$current = '<span class="current">%s</span>';
	$linkTemplate = '<a href="%s">%s</a>';

	/**	Previous Post Link */
	if ($extremes && get_previous_posts_link()) previous_posts_link();

	/**	Link to first page, plus ellipses if necessary */
	if (!in_array(1, $links)){
		if ($paged == 1)
			printf($current, '1');
		else
			printf($linkTemplate, esc_url(get_pagenum_link(1)), '1');
		
		echo $separator;
		if (!in_array(2, $links)) echo '…'.$separator;
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array) $links as $link){
		if ($paged == $link)
			printf($current, $link);
		else
			printf($linkTemplate, esc_url(get_pagenum_link($link)), $link);
			
		if ($link < $max) echo $separator;
	}

	/**	Link to last page, plus ellipses if necessary */
	if (!in_array($max, $links)){
		if (!in_array($max-1, $links)) echo '…'.$separator;

		if ($paged == $max)
			printf($current, $link);
		else
			printf($linkTemplate, esc_url(get_pagenum_link($max)), $max);
	}

	/**	Next Post Link */
	if ($extremes && get_next_posts_link()) next_posts_link();
}