<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
				
require_once 'admin/widgets/newsletter.php';
require_once 'admin/widgets/social.php';

//Software licensing
//define('EDD_SL_STORE_URL', 'https://www.themesdefrance.fr/');
//define('EDD_SL_THEME_NAME', 'Etendard');

if (!function_exists( 'optionsframework_init')){
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory').'/admin/options/');
	require_once TEMPLATEPATH.'/admin/options/'.'options-framework.php';
}

add_action('init', 'etendard_init_cpt');
add_action('after_setup_theme', 'etendard_setup');
add_action('admin_init', 'etendard_admin_init');
add_action('widgets_init', 'etendard_widgets_init');
add_action('add_meta_boxes', 'etendard_register_custom_fields');
add_action('save_post', 'etendard_portfolio_save_custom');
add_action('save_post', 'etendard_home_save_custom');

if (!function_exists('etendard_setup')){
	function etendard_setup(){
		register_nav_menu('primary', __('Menu principal', TEXT_TRANSLATION_DOMAIN));
			
		register_sidebar(array(
				'name'          => __('Barre latérale', TEXT_TRANSLATION_DOMAIN),
				'id'            => 'blog',
				'description'   => __('Ajoutez les widgets à faire figurer dans la barre latérale (sidebar).', TEXT_TRANSLATION_DOMAIN),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
				'name'          => __('Pied de page', TEXT_TRANSLATION_DOMAIN),
				'id'            => 'footer',
				'description'   => __('Ajoutez les widgets à faire figurer dans le pied de page.', TEXT_TRANSLATION_DOMAIN),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
		
		add_theme_support('post-thumbnails');
		
		/*add_theme_support('post-formats', array(
//			'chat', 
			'image', 
			'link', 
			'quote', 
//			'status', 
			'video',
		));*/
		
		add_image_size('etendard-portfolio-thumbnail', 301, 230, true);
		add_image_size('etendard-blog-thumbnail', 203, 225, true);
		add_image_size('etendard-post-thumbnail', 620, 400, true);
	//	load_theme_textdomain(TEXT_TRANSLATION_DOMAIN, get_template_directory().'/local');
	}
}

if (!function_exists('etendard_init_cpt')){
	function etendard_init_cpt(){
		//portfolio
		register_post_type('portfolio', array(
			'label'=>__('Portfolio', TEXT_TRANSLATION_DOMAIN),
			'labels'=>array(),
			'public'=>true,
			'menu_position'=>20,
			'has_archive'=>true,
		));
		add_post_type_support('portfolio', array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'revisions'/*,
			'post-formats'*/
		));
		register_taxonomy('portfolio_categorie', 'portfolio', array(
			'label'=>'Catégories',
			'hierarchical'=>true,
		));
		register_taxonomy_for_object_type('portfolio_categorie', 'portfolio');
		
		//services
		register_post_type('service', array(
			'label'=>__('Services', TEXT_TRANSLATION_DOMAIN),
			'labels'=>array(),
			'public'=>true,
			'menu_position'=>21,
			'has_archive'=>true,
		));
		add_post_type_support('service', array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'revisions',
		));
	}
}

if (!function_exists('etendard_enqueue')){
	function etendard_enqueue(){
		$theme = wp_get_theme();
		
		wp_register_script('flexslider', get_template_directory_uri().'/lib/flexslider/jquery.flexslider-min.js', array('jquery'), $theme['version'], true);
		wp_register_style('flexslider', get_template_directory_uri().'/lib/flexslider/flexslider.css', false, $theme['version']);
		
		wp_register_script('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.pack.js', array('jquery'), $theme['version'], true);
		wp_register_style('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.css', false, $theme['version']);
		
		wp_register_script('etendard_gallery', get_template_directory_uri().'/js/gallery.js', array('jquery'), $theme['version'], true);
		
		wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Sanchez:400,400italic|Maven+Pro:400,700', array(), $theme['version']);
		wp_enqueue_style('icons', get_template_directory_uri().'/fonts/style.css', array(), $theme['version']);
		wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css', array(), $theme['version']);
		
		wp_enqueue_script('flexslider');
		wp_enqueue_style('flexslider');
		
		if (get_post_gallery()){
			wp_enqueue_script('fancybox');
			wp_enqueue_style('fancybox');
			wp_enqueue_script('etendard_gallery');
		}
	}
}
add_action('wp_enqueue_scripts', 'etendard_enqueue');

if (!function_exists('etendard_admin_init')){
	function etendard_admin_init(){
//		remove_meta_box('postcustom', 'portfolio', 'normal');
		remove_meta_box('postcustom', 'service', 'normal');
	}
}

if (!function_exists('etendard_admin_menu')){
	function etendard_admin_menu(){
		add_theme_page('Options Étendard', 'Options Étendard', 'edit_theme_options', 'etendard-options', 'etendard_options');
	}
}

if (!function_exists('etendard_optionsframework_menu')){
	function etendard_optionsframework_menu($menu){
		$menu['page_title'] = __('Options Étendard');
		$menu['menu_title'] = __('Options Étendard', TEXT_TRANSLATION_DOMAIN);
		return $menu;
	}
}
add_filter('optionsframework_menu', 'etendard_optionsframework_menu');

if (!function_exists('etendard_options')){
	function etendard_options(){
		if (!current_user_can('edit_theme_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		
		require 'admin/index.php';
	}
}

if (!function_exists('etendard_widgets_init')){
	function etendard_widgets_init(){
//		register_widget('EtendardNewsletter');
		register_widget('EtendardSocial');
	}
}

if (!function_exists('etendard_register_custom_fields')){
	function etendard_register_custom_fields(){
		add_meta_box('etendard_portfolio_client',
					 __('Informations', TEXT_TRANSLATION_DOMAIN),
					 'etendard_portfolio_client',
					 'portfolio',
					 'side',
					 'default'
		);
		
		add_meta_box('etandard_portfolio_temoignage',
					 __('Témoignage', TEXT_TRANSLATION_DOMAIN),
					 'etendard_portfolio_temoignage',
					 'portfolio',
					 'normal',
					 'high'
		);
		
		add_meta_box('etandard_portfolio_carousel',
					 __('Carousel', TEXT_TRANSLATION_DOMAIN),
					 'etendard_portfolio_carousel',
					 'portfolio',
					 'normal',
					 'high'
		);
		
		//cta box pour template homepage
		if (isset($_GET['post']) || isset($_POST['post_ID'])){
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
			$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
			if ($template_file == 'template_home.php'){
				add_meta_box('etendard_home_cta',
							 __('Call To Action', TEXT_TRANSLATION_DOMAIN),
							 'etendard_home_cta',
							 'page',
							 'normal',
							 'high'
				);
				
				$display_blocks = of_get_option('etendard_blocks_presence');
				if (array_key_exists('slider', $display_blocks) && $display_blocks['slider']){
					add_meta_box('etandard_portfolio_carousel',
							 __('Carousel', TEXT_TRANSLATION_DOMAIN),
							 'etendard_portfolio_carousel',
							 'page',
							 'normal',
							 'high'
					);
				}
			}
		}
	}
}

if (!function_exists('etendard_portfolio_client')){
	function etendard_portfolio_client($post){
		require 'admin/meta-box/portfolio_client.php';
	}
}

if (!function_exists('etendard_portfolio_temoignage')){
	function etendard_portfolio_temoignage($post){
		require 'admin/meta-box/portfolio_temoignage.php';
	}
}

if (!function_exists('etendard_portfolio_carousel')){
	function etendard_portfolio_carousel($post){
		require 'admin/meta-box/portfolio_carousel.php';
	}
}

if (!function_exists('etendard_home_cta')){
	function etendard_home_cta($post){
		require 'admin/meta-box/home_cta.php';
	}
}

if (!function_exists('etendard_portfolio_save_custom')){
	function etendard_portfolio_save_custom($post_id){
		if (!isset($_POST['etendard_portfolio_nonce'])) return $post_id;
	  
		$nonce = $_POST['etendard_portfolio_nonce'];
	  
		if (!wp_verify_nonce($nonce, 'etendard_portfolio_nonce')) return $post_id;
	
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	
		if ($_POST['post_type'] == 'page'){
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id))
			return $post_id;
		}
		
		$client = sanitize_text_field($_POST['etendard_portfolio_client']);
//		$date = sanitize_text_field($_POST['etendard_portfolio_date']);
//		$role = sanitize_text_field($_POST['etendard_portfolio_role']);
		$url = sanitize_text_field($_POST['etendard_portfolio_url']);
		$temoin = sanitize_text_field($_POST['etendard_portfolio_temoin_nom']);
		$texte = sanitize_text_field($_POST['etendard_portfolio_temoin_texte']);
		$portrait = sanitize_text_field($_POST['etendard_portfolio_temoin_portrait']);
		$carousel = $_POST['etendard_portfolio_carousel'];
		$carousel_liens = $_POST['etendard_portfolio_carousel_lien'];
		foreach ($carousel as &$img){
			$img = sanitize_text_field($img);
		}
	
		update_post_meta($post_id, 'etendard_portfolio_client', $client);
//		update_post_meta($post_id, 'etendard_portfolio_date', $date);
//		update_post_meta($post_id, 'etendard_portfolio_role', $role);
		update_post_meta($post_id, 'etendard_portfolio_url', $url);
		update_post_meta($post_id, 'etendard_portfolio_temoin_nom', $temoin);
		update_post_meta($post_id, 'etendard_portfolio_temoin_texte', $texte);
		update_post_meta($post_id, 'etendard_portfolio_temoin_portrait', $portrait);
		update_post_meta($post_id, 'etendard_portfolio_carousel', $carousel);
		update_post_meta($post_id, 'etendard_portfolio_carousel_lien', $carousel_liens);
	}
}

if (!function_exists('etendard_home_save_custom')){
	function etendard_home_save_custom($post_id){
		if (!isset($_POST['etendard_home_nonce'])) return $post_id;
	  
		$nonce = $_POST['etendard_home_nonce'];
	  
		if (!wp_verify_nonce($nonce, 'etendard_home_nonce')) return $post_id;
	
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
	
		if ($_POST['post_type'] == 'page'){
			if (!current_user_can('edit_page', $post_id)) return $post_id;
		} else {
			if (!current_user_can('edit_post', $post_id))
			return $post_id;
		}
		
		$cta_url = sanitize_text_field($_POST['etendard_home_cta_url']);
		$cta_text = sanitize_text_field($_POST['etendard_home_cta_text']);
		$cta_bouton = sanitize_text_field($_POST['etendard_home_cta_bouton']);
		$carousel = $_POST['etendard_portfolio_carousel'];
		$carousel_liens = $_POST['etendard_portfolio_carousel_lien'];
		foreach ($carousel as &$img){
			$img = sanitize_text_field($img);
		}
		
		update_post_meta($post_id, 'etendard_home_cta_url', $cta_url);
		update_post_meta($post_id, 'etendard_home_cta_text', $cta_text);
		update_post_meta($post_id, 'etendard_home_cta_bouton', $cta_bouton);
		update_post_meta($post_id, 'etendard_portfolio_carousel', $carousel);
		update_post_meta($post_id, 'etendard_portfolio_carousel_lien', $carousel_liens);
	}
}

//fonctions persos
if (!function_exists('etendard_strip_img_sizes')){
	//enleve les attributs width et height des images
	function etendard_strip_img_sizes($img){
		$img = preg_replace("/\s(width|height)=('|\")\d+('|\")/", ' ', $img);
		return $img;
	}
}
add_filter('get_avatar', 'etendard_strip_img_sizes');
add_filter('post_thumbnail_html', 'etendard_strip_img_sizes');

if (!function_exists('etendard_posts_nav')){
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
}

//borrowed from http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
if (!function_exists('etendard_comment')){
	function etendard_comment($comment, $args, $depth){
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
}

//recupere une page utilisant le template portfolio
if (!function_exists('etendard_portfolio_page_link')){
	function etendard_portfolio_page_link(){
		$portfolio_pages = get_pages(array(
			'meta_key'=>'_wp_page_template',
			'meta_value'=>'template-portfolio.php'
		));
		if (count($portfolio_pages) > 0) return get_page_link($portfolio_pages[0]->ID);
		else return get_post_type_archive_link('portfolio');
	}
}

// Taille d'extrait personnalisé
if (!function_exists('etendard_custom_excerpt_length')){
	function etendard_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'etendard_custom_excerpt_length', 999 );
}

// Suppression du [...] des extraits
if (!function_exists('etendard_new_excerpt_more')){
	function etendard_new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'etendard_new_excerpt_more');
}

////////////////////////////////////
// Shortcodes
////////////////////////////////////

// Bouton
if (!function_exists('etendard_button')){
	function etendard_button($atts, $content=null){
		$autrefenetre='';
		if($atts['autrefenetre']==1){
			$autrefenetre='target="_blank"';
		}
		return '<a href="'.$atts['lien'].'" class="bouton" '.$autrefenetre.'>' . $content . '</a>';
	}
	add_shortcode( 'bouton', 'etendard_button' );
}

// Colonnes

// 1/2
if (!function_exists('etendard_un_demi')){
	function etendard_un_demi($atts, $content=null){
		$premier='';
		if (isset($atts[0]) && trim($atts[0]) == 'premier') {$premier = ' premier';}
		$res = '<div class="un_demi'.$premier.'">';
		$res.= do_shortcode(wpautop($content));
		$res.='</div>';
		return $res;
	}
	add_shortcode( 'un_demi', 'etendard_un_demi' );
}

// 1/3
if (!function_exists('etendard_un_tiers')){
	function etendard_un_tiers($atts, $content=null){
		$premier='';
		if (isset($atts[0]) && trim($atts[0]) == 'premier') {$premier = ' premier';}
		$res = '<div class="un_tiers'.$premier.'">';
		$res.= do_shortcode(wpautop($content));
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'un_tiers', 'etendard_un_tiers' );
}

// 1/4
if (!function_exists('etendard_un_quart')){
	function etendard_un_quart($atts, $content=null){
		$premier='';
		if (isset($atts[0]) && trim($atts[0]) == 'premier') {$premier = ' premier';}
		$res = '<div class="un_quart'.$premier.'">';
		$res.= do_shortcode(wpautop($content));
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'un_quart', 'etendard_un_quart' );
}

// 2/3
if (!function_exists('etendard_deux_tiers')){
	function etendard_deux_tiers($atts, $content=null){
		$premier='';
		if (isset($atts[0]) && trim($atts[0]) == 'premier') {$premier = ' premier';}
		$res = '<div class="deux_tiers'.$premier.'">';
		$res.= do_shortcode(wpautop($content));
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'deux_tiers', 'etendard_deux_tiers' );
}

// 3/4
if (!function_exists('etendard_trois_quarts')){
	function etendard_trois_quarts($atts, $content=null){
		$premier='';
		if (isset($atts[0]) && trim($atts[0]) == 'premier') {$premier = ' premier';}
		$res = '<div class="trois_quarts'.$premier.'">';
		$res.= do_shortcode(wpautop($content));
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'trois_quarts', 'etendard_trois_quarts' );
}

// Messages

// Info
if (!function_exists('etendard_message_info')){
	function etendard_message_info($atts, $content=null){
		$res = '<div class="message info">';
		$res.= wpautop($content);
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'info', 'etendard_message_info' );
}

// Alerte
if (!function_exists('etendard_message_alerte')){
	function etendard_message_alerte($atts, $content=null){
		$res = '<div class="message alerte">';
		$res.= wpautop($content);
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'alerte', 'etendard_message_alerte' );
}

// Erreur
if (!function_exists('etendard_message_erreur')){
	function etendard_message_erreur($atts, $content=null){
		$res = '<div class="message erreur">';
		$res.= wpautop($content);
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'erreur', 'etendard_message_erreur' );
}

// Succès
if (!function_exists('etendard_message_succes')){
	function etendard_message_succes($atts, $content=null){
		$res = '<div class="message succes">';
		$res.= wpautop($content);
		$res.= '</div>';
		return $res;
	}
	add_shortcode( 'succes', 'etendard_message_succes' );
}

// Appel à l'action
// En largeur
if (!function_exists('etendard_appel_action')){
	function etendard_appel_action($atts, $content=null){
		return '<div class="embedcta">
						<p class="cta-text">
							'.$content.'
						</p>
						<div class="button-wrapper">
							<a href="'.$atts['lien'].'" class="cta-button">'.$atts['bouton'].'</a>
						</div>
				</div>';
	}
	add_shortcode( 'appel_action', 'etendard_appel_action' );
}


////////////////////////////////////
// Styles Personnalisés
////////////////////////////////////

// Chargements des styles utilisateurs
if(!function_exists('etendard_user_styles')){
	function etendard_user_styles(){
		if (of_get_option("etendard_color")){
			$color = of_get_option("etendard_color"); ?>
			<style type="text/css">
				section.realisation .realisation-site,
				div.pagination a,
				.widget_etendardnewsletter .form-email:before,
				form.search-form .search-submit-wrapper:before,
				a.more-link,
				ul.services .service h2:hover,
				ul.portfolio .creation figcaption,
				.article .header-title a:hover,
				.article.quote > blockquote cite,
				.comment .comment-author{
					color: <?php echo $color; ?> !important;
				}
				
				.main-menu a:hover,
				ul.portfolio .creation figure:hover figcaption,
				.article.teaser .header-title:after,
				#commentform #submit,
				.widget_calendar #today,
				section.portfolio nav.categories a:hover,
				section.portfolio nav.categories a.active,
				.widget_etendardnewsletter input[type="submit"],
				.widget_etendardsocial li a,
				.cta-button,
				.contact-form .submit input{
					background: <?php echo $color; ?> !important;
					color: #fff !important;
				}
				
				.toplevel > li > a.active{
					border-bottom: 2px solid <?php echo $color; ?> !important;;
				}
				.main-menu .sub-menu:before{
					border-bottom: 3px solid <?php echo $color; ?> !important;;
				}
				
				.article.teaser .header-title:hover:after,
				.widget_etendardsocial li a:hover,
				.cta-button:hover,
				.contact-form .submit input:hover{
					background:#696969 !important;
				}
				form.search-form .search-submit-wrapper:hover:before,
				div.pagination a:hover{
					color:#696969 !important;
				}
			</style>
		<?php }
	}
}
add_action('wp_head','etendard_user_styles', 98);


// Chargement du CSS Personnalisé
if(!function_exists('etendard_custom_styles')){
	function etendard_custom_styles(){
		if (of_get_option("etendard_custom_css")){
			echo '<style type="text/css">';
			echo htmlentities(stripslashes(of_get_option("etendard_custom_css")), ENT_NOQUOTES);
			echo '</style>';
		}
	}
}
add_action('wp_head', 'etendard_custom_styles', 99);




