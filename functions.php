<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
				
register_nav_menu('primary', __('Menu principal', TEXT_TRANSLATION_DOMAIN));
				
register_sidebar(array(
		'name'          => __('Widgets de pied de page', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'footer',
		'description'   => __('Section apparaissant en bas de toutes les pages.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	
register_sidebar(array(
		'name'          => __('Widgets de blog', TEXT_TRANSLATION_DOMAIN),
		'id'            => 'blog',
		'description'   => __('Barre latérale sur les pages du blog.', TEXT_TRANSLATION_DOMAIN),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	
add_theme_support('post-thumbnails');

function etendard_get_avatar($avatar){
	$avatar = preg_replace("/\s(width|height)='\d+'/", ' ', $avatar);
	return $avatar;
}
add_filter('get_avatar', 'etendard_get_avatar');


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

//borrowed from http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
if (!function_exists( 'shape_comment')) :
function shape_comment($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p>
			<?php _e('Pingback:', TEXT_TRANSLATION_DOMAIN); ?>
			<?php comment_author_link(); ?>
			<?php edit_comment_link(__('(Éditer)', TEXT_TRANSLATION_DOMAIN), ' '); ?>
		</p>
	<?php
		break;
	default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="article comment">
			<aside class="col-1-5">
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', TEXT_TRANSLATION_DOMAIN); ?></em>
				<?php endif; ?>
				<?php echo get_avatar($comment, 104); ?>
			</aside>
			
			<div class="col-4-5">
				<header class="comment-header">
					<div class="comment-author vcard">
						<?php printf(__('%s', TEXT_TRANSLATION_DOMAIN), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
						<?php edit_comment_link(__('(Éditer)', TEXT_TRANSLATION_DOMAIN), ' '); ?>
					</div>
				</header>
	 
				<div class="content">
					<?php comment_text(); ?>
				</div>
				
				<div class="reply">
					<?php 
					comment_reply_link(array_merge($args, 
						array(	'depth'=>$depth, 
								'max_depth'=>$args['max_depth'],
								'reply_text'=>__('Répondre', TEXT_TRANSLATION_DOMAIN)))); 
					?>
				</div><!-- .reply -->
			</div>
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif; // ends check for shape_comment()