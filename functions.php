<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
//chargement du gestionnaire de licenses
define('EDD_SL_STORE_URL', 'https://www.themesdefrance.fr/');
define('EDD_SL_THEME_NAME', 'Etendard');
define('EDD_SL_THEME_VERSION', '1.008');
define('EDD_SL_LICENSE_KEY', 'etendard_license_edd');

define('COCORICO_PREFIX', 'etendard_');
require_once 'admin/Cocorico/Cocorico.php';


//chargement des widgets	
require_once 'admin/widgets/social.php';

if(!class_exists('EDD_SL_Theme_Updater')){
	include(dirname( __FILE__ ).'/admin/EDD_SL_Theme_Updater.php');
}

//installation du thème
if (!function_exists( 'etendard_activation')){
	function etendard_activation(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
}
add_action('after_switch_theme', 'etendard_activation');

//chargement d'OF
if (!function_exists( 'optionsframework_init')){
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory').'/admin/options/');
	require_once TEMPLATEPATH.'/admin/options/'.'options-framework.php';
}

//setup du theme
if (!function_exists('etendard_setup')){
	function etendard_setup(){
		register_nav_menu('primary', __('Menu principal', TEXT_TRANSLATION_DOMAIN));
		register_nav_menu('footer', __('Menu pied de page', TEXT_TRANSLATION_DOMAIN));
			
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
		
		add_theme_support('post-formats', array(
			'video'
		));
		
		add_image_size('etendard-portfolio-thumbnail', 301, 230, true);
		add_image_size('etendard-service-thumbnail', 230, 230, true);
		add_image_size('etendard-blog-thumbnail', 225, 150, true);
		add_image_size('etendard-post-thumbnail', 620, 400, true);
	//	load_theme_textdomain(TEXT_TRANSLATION_DOMAIN, get_template_directory().'/local');
	}
}
add_action('after_setup_theme', 'etendard_setup');

//declaration des CPT
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
add_action('init', 'etendard_init_cpt');

//ajout des scripts & styles
if (!function_exists('etendard_enqueue')){
	function etendard_enqueue(){
		$theme = wp_get_theme();
		
		wp_register_script('flexslider', get_template_directory_uri().'/lib/flexslider/jquery.flexslider-min.js', array('jquery'), $theme->get('Version'), true);
		wp_register_style('flexslider', get_template_directory_uri().'/lib/flexslider/flexslider.css', false, $theme->get('Version'));
		
		wp_register_script('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.pack.js', array('jquery'), $theme->get('Version'), true);
		wp_register_style('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.css', false, $theme->get('Version'));
		
		wp_register_script('etendard_gallery', get_template_directory_uri().'/js/gallery.js', array('jquery'), $theme->get('Version'), true);
		wp_register_script('etendard_menu', get_template_directory_uri().'/js/menu.js', array('jquery'), $theme->get('Version'), true);
		
		wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Sanchez:400,400italic|Maven+Pro:400,700', array(), $theme->get('Version'));
		wp_enqueue_style('icons', get_template_directory_uri().'/fonts/style.css', array(), $theme->get('Version'));
		wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css', array(), $theme->get('Version'));
		
		wp_enqueue_script('flexslider');
		wp_enqueue_style('flexslider');
		
		wp_enqueue_script('etendard_menu');
		
		if (get_post_gallery()){
			wp_enqueue_script('fancybox');
			wp_enqueue_style('fancybox');
			wp_enqueue_script('etendard_gallery');
		}
	}
}
add_action('wp_enqueue_scripts', 'etendard_enqueue');

//parametrage de l'administration
if (!function_exists('etendard_admin_init')){
	function etendard_admin_init(){
//		remove_meta_box('postcustom', 'portfolio', 'normal');
		remove_meta_box('postcustom', 'service', 'normal');
	}
}
add_action('admin_init', 'etendard_admin_init');

if (!function_exists('etendard_admin_menu')){
	function etendard_admin_menu(){
		add_theme_page('Options Étendard', 'Options Étendard 2', 'edit_theme_options', 'etendard_options', 'etendard_options');
	}
}
add_action('admin_menu', 'etendard_admin_menu');

//ajout de la page d'admin etendard
if (!function_exists('etendard_optionsframework_menu')){
	function etendard_optionsframework_menu($menu){
		$menu['page_title'] = __('Options Étendard', TEXT_TRANSLATION_DOMAIN);
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
       	
       	include 'admin/index.php';
    }
}

//initialisation des widgets
if (!function_exists('etendard_widgets_init')){
	function etendard_widgets_init(){
		register_widget('EtendardSocial');
	}
}
add_action('widgets_init', 'etendard_widgets_init');

//initialisation des customfields
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
		
		add_meta_box('etandard_portfolio_diaporama',
					 __('Diaporama', TEXT_TRANSLATION_DOMAIN),
					 'etendard_portfolio_diaporama',
					 'portfolio',
					 'normal',
					 'high'
		);
		
		//Metabox spéciales pour le template Accueil
		if (isset($_GET['post']) || isset($_POST['post_ID'])){
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
			$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
			
			if ($template_file == 'template_home.php'){
				add_meta_box('etendard_home_cta',
							 __('Appel à l\'action', TEXT_TRANSLATION_DOMAIN),
							 'etendard_home_cta',
							 'page',
							 'normal',
							 'high'
				);
				
				$display_blocks = get_option('etendard_blocks_presence');
				if (in_array('diaporama', $display_blocks)){
					add_meta_box('etandard_portfolio_diaporama',
							 __('Diaporama', TEXT_TRANSLATION_DOMAIN),
							 'etendard_portfolio_diaporama',
							 'page',
							 'normal',
							 'high'
					);
				}
			}
		}
	}
}
add_action('add_meta_boxes', 'etendard_register_custom_fields');

//Metabox individuelles
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

if (!function_exists('etendard_portfolio_diaporama')){
	function etendard_portfolio_diaporama($post){
		require 'admin/meta-box/portfolio_diaporama.php';
	}
}

if (!function_exists('etendard_home_cta')){
	function etendard_home_cta($post){
		require 'admin/meta-box/home_cta.php';
	}
}

//supprimmes les tailles forcées des thumbnails
if (!function_exists('etendard_strip_img_sizes')){
	//enleve les attributs width et height des images
	function etendard_strip_img_sizes($img){
		$img = preg_replace("/\s(width|height)=('|\")\d+('|\")/", ' ', $img);
		return $img;
	}
}
add_filter('get_avatar', 'etendard_strip_img_sizes');
add_filter('post_thumbnail_html', 'etendard_strip_img_sizes');

// Chargement des shortcodes
require_once 'admin/shortcodes.php';


//fonction de pagination
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

//affichage descommentaires
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
			</p>
		<?php
			break;
		default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="article comment">
				<aside class="col-1-5">
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Votre commentaire est en attente de modération.', TEXT_TRANSLATION_DOMAIN); ?></em>
					<?php endif; ?>
					<?php echo get_avatar($comment, 104); ?>
				</aside>
				
				<div class="col-4-5">
					<header class="comment-header">
						<div class="comment-author vcard">
							<?php printf(__('%s', TEXT_TRANSLATION_DOMAIN), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
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
	function etendard_custom_excerpt_length($length) {
		return 20;
	}
	add_filter('excerpt_length', 'etendard_custom_excerpt_length', 999);
}

// Suppression du [...] des extraits
if (!function_exists('etendard_new_excerpt_more')){
	function etendard_new_excerpt_more($more) {
		return '…';
	}
	add_filter('excerpt_more', 'etendard_new_excerpt_more');
}

// Extrait personnalisable
if (!function_exists('etendard_excerpt')){
	function etendard_excerpt($length){
		$content = get_the_content();
		$excerpt = "<p>" . wp_trim_words( $content , $length ) . "</p>";
		return $excerpt;
	}
}

// Titre 
if (!function_exists('etendard_titre_home')){
	function etendard_titre_home($title) {
		if( empty( $title ) && ( is_home() || is_front_page() ) ) {
			return get_bloginfo('title');
		}
	}
	add_filter('wp_title', 'etendard_titre_home');
}
// Article en plusieurs morceaux ?
// Thanks to https://gist.github.com/tommcfarlin/f2310bfad60b60ae00bf#file-is-paginated-post-php
function etendard_is_paginated_post() {
 
	global $multipage;
	return 0 !== $multipage;
 
}



////////////////////////////////////
// Styles Personnalisés
////////////////////////////////////

//Couleur dominante
if(!function_exists('etendard_user_styles')){
	function etendard_user_styles(){
		if (get_option('etendard_color')){
			$color = get_option('etendard_color');
		}
		else{ // Si aucune couleur par défaut, on utilise celle-ci
			$color = "#02a7c6";
		} ?>
			<style type="text/css">
				section.realisation .realisation-site,
				div.pagination a,
				.article .content a,
				.article .header-meta a,
				#comments a,
				.sidebar .widget_etendardnewsletter .form-email:before,
				form.search-form .search-submit-wrapper:before,
				a.more-link,
				ul.services .service h2:hover,
				ul.portfolio .creation figcaption,
				.article .header-title a:hover,
				.article.quote > blockquote cite,
				.comment .comment-author a,
				.main-footer a,
				.sidebar .widget a:hover{
					color: <?php echo $color; ?>;
				}
				
				.main-menu a:hover,
				.top-level-menu > li:hover > a,
				ul.portfolio .creation figure:hover figcaption,
				.article.teaser .header-title:after,
				#commentform #submit,
				.widget_calendar #today,
				section.portfolio nav.categories a:hover,
				section.portfolio nav.categories a.active,
				.sidebar .widget_etendardnewsletter input[type="submit"],
				.widget_etendardsocial li a,
				.cta .button-wrapper .cta-button,
				.embedcta .button-wrapper .cta-button,
				.cta-wrapper .cta-button,
				.article .content a.bouton,
				.contact-form .submit input,
				a.bouton.lirelasuite,
				.headerbar{
					background: <?php echo $color; ?> !important;
					color: #fff !important;
				}
				
				::selection,
				::-moz-selection,
				::-webkit-selection,
				::-o-selection{ 
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
				.cta .button-wrapper .cta-button:hover,
				.embedcta .button-wrapper .cta-button:hover,
				.article .content a.bouton:hover,
				.cta-wrapper .cta-button:hover,
				.contact-form .submit input:hover,
				#commentform #submit:hover,
				a.bouton.lirelasuite:hover{
					background:#696969 !important;
				}
				form.search-form .search-submit-wrapper:hover:before,
				div.pagination a:hover,
				.sidebar .widget a{
					color:#696969;
				}
				.sidebar .widget_etendardsocial li a,
				.sidebar .widget_etendardsocial li a:hover{
					color:#fff !important;
				}
			</style>
		<?php }
}
add_action('wp_head','etendard_user_styles', 98);


// Chargement du CSS Personnalisé
if(!function_exists('etendard_custom_styles')){
	function etendard_custom_styles(){
		if (get_option("etendard_custom_css")){
			echo '<style type="text/css">';
			echo htmlentities(stripslashes(get_option("etendard_custom_css")), ENT_NOQUOTES);
			echo '</style>';
		}
	}
}
add_action('wp_head', 'etendard_custom_styles', 99);

//Activation de license
//On est sympa, on vous bloque pas le thème s'il n'y a pas de license valide 
//et l'activation n'est pas très dure à contourner. Soyez bon joueurs et achetez-le :)
if(!function_exists('etendard_edd')){
	function etendard_edd(){
		$license = trim(get_option(EDD_SL_LICENSE_KEY));
		$status = get_option('etendard_license_status');
		
		if (!$status){
			//valider la license
			$api_params = array(
				'edd_action'=>'activate_license',
				'license'=>$license,
				'item_name'=>urlencode(EDD_SL_THEME_NAME)
			);
	
			$response = wp_remote_get(add_query_arg($api_params, EDD_SL_STORE_URL), array('timeout'=>15, 'sslverify'=>false));
	
			if (!is_wp_error($response)){
				$license_data = json_decode(wp_remote_retrieve_body($response));
				if ($license_data->license === 'valid') update_option('etendard_license_status', true);
			}
		}
		
		$edd_updater = new EDD_SL_Theme_Updater(array( 
				'remote_api_url'=> EDD_SL_STORE_URL,
				'version' 	=> EDD_SL_THEME_VERSION,
				'license' 	=> $license,
				'item_name' => EDD_SL_THEME_NAME,
				'author'	=> 'Thèmes de France'
			)
		);
	}
}
add_action('admin_init', 'etendard_edd');

//Notification de license
if(!function_exists('etendard_admin_notice')){
	function etendard_admin_notice(){
		if(!get_option('etendard_license_status')){
			echo '<div class="error"><p>';
			_e("Afin de pouvoir bénéficier des mises à jour et du support, veuillez renseigner votre numéro de licence. Vous avez dû le recevoir par email.", TEXT_TRANSLATION_DOMAIN);
			echo '</p></div>';
		}
	}
}
add_action('admin_notices', 'etendard_admin_notice');

//migration depuis etendard < 1.008
if (!get_option('etendard_import_OF')){
	$theme = get_option( 'stylesheet' );
	$theme = preg_replace("/\W/", "_", strtolower($theme) );
	$ofkey = 'optionsframework_' . $theme;
	$ofData = get_option($ofkey);
	
	if ($ofData){
		foreach ($ofData as $key=>$value){
			if ($key === 'etendard_blocks_presence'){
				$converted = array();
				
				foreach ($value as $str=>$bool){
					if ($bool) array_push($converted, $str);
				}
				
				$value = $converted;
			}
			
			update_option($key, $value);
		}
	}
	
	update_option('etendard_import_OF', true);
}


// TinyMCE Shortcodes Integration

add_action('admin_head', 'etendard_add_tinymce');
function etendard_add_tinymce() {
	add_filter('mce_external_plugins', 'etendard_add_tinymce_plugin');
	add_filter('mce_buttons', 'etendard_add_tinymce_button');
}
 
function etendard_add_tinymce_plugin($plugin_array) {
	$plugin_array['drop'] =	get_stylesheet_directory_uri() . '/js/tmcedrop.js';
	return $plugin_array;
}
 
function etendard_add_tinymce_button($buttons) {
	array_push($buttons, 'drop');
	return $buttons;
}