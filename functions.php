<?php

////////////////////////////////////
// License Stuff
////////////////////////////////////

define('ETENDARD_STORE_URL', 'https://www.themesdefrance.fr');
define('ETENDARD_THEME_NAME', 'Etendard');
define('ETENDARD_THEME_VERSION', '1.016');
define('ETENDARD_LICENSE_KEY', 'etendard_license_edd');

if(!class_exists('EDD_SL_Theme_Updater')){
	include(dirname( __FILE__ ).'/admin/EDD_SL_Theme_Updater.php');
}

////////////////////////////////////
// Cocorico Framework
////////////////////////////////////

define('ETENDARD_COCORICO_PREFIX', 'etendard_');
if(is_admin())
	require_once 'admin/Cocorico/Cocorico.php';

////////////////////////////////////
// Widgets, Shortcodes loading
////////////////////////////////////
	
require 'admin/widgets/social.php';
require 'admin/widgets/appel-action.php';
require 'admin/widgets/video.php';
require 'admin/shortcodes.php';

////////////////////////////////////
// Etendard Setup & Activation
////////////////////////////////////

//Set the content width (in pixels) based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 633; 
}

//Refresh the permalink structure
add_action('after_switch_theme', 'flush_rewrite_rules');

//Remove accents in uploaded files
add_filter( 'sanitize_file_name', 'remove_accents' );

//Remove extra stuff from header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// Function to call if no primary menu
if (!function_exists( 'etendard_nomenu')){
	function etendard_nomenu(){
		echo '<ul class="top-level-menu"><li><a href="'.admin_url('nav-menus.php').'">'.__('Set up the main menu','etendard').'</a></li></ul>';
	}
}

if (!function_exists('etendard_setup')){
	function etendard_setup(){
	
		// Load language
		load_theme_textdomain('etendard', get_template_directory().'/languages');
		
		// Register menus
		register_nav_menu('primary', __('Main menu', 'etendard'));
		register_nav_menu('footer', __('Footer menu', 'etendard'));
		
		//Register sidebars
		register_sidebar(array(
				'name'          => __('Sidebar', 'etendard'),
				'id'            => 'blog',
				'description'   => __('Add widgets in the sidebar.', 'etendard'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
				'name'          => __('Footer', 'etendard'),
				'id'            => 'footer',
				'description'   => __('Add widgets in the footer.', 'etendard'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
		
		// Enable thumbnails
		add_theme_support('post-thumbnails');
		
		// Enable custom title tag for 4.1
		add_theme_support( 'title-tag' );
		
		// Enable Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Enable post formats
		// Post formats are enabled with etendard_custom_format
		
		// Add Meta boxes for post formats
		require_once 'admin/meta-box/post_formats.php';
		
		// Set images sizes
		set_post_thumbnail_size('etendard-post-thumbnail', 633, 400, true);
		add_image_size('etendard-portfolio-thumbnail', 470, 230, true);
		add_image_size('etendard-service-thumbnail', 230, 230, true);
		add_image_size('etendard-blog-thumbnail', 225, 150, true);
		
		add_filter('image_size_names_choose', 'etendard_tailles_images');
		function etendard_tailles_images($sizes) {
			$added = array('etendard-post-thumbnail'=>__('Post', 'etendard'));
			$newsizes = array_merge($sizes, $added);
			return $newsizes;
		}
	}
}
add_action('after_setup_theme', 'etendard_setup');

////////////////////////////////////
// Custom Post Types Declaration
////////////////////////////////////

if (!function_exists('etendard_init_cpt')){
	function etendard_init_cpt(){
		
		// Portfolio
		$labels_portfolio = array(
		'name'               => _x( 'Projects', 'project post type general name', 'etendard' ),
		'singular_name'      => _x( 'Project', 'project post type singular name', 'etendard' ),
		'menu_name'          => _x( 'Projects', 'projects admin menu', 'etendard' ),
		'name_admin_bar'     => _x( 'Project', 'add new project on admin bar', 'etendard' ),
		'add_new'            => _x( 'Add New', 'add new portfolio', 'etendard' ),
		'add_new_item'       => __( 'Add New Project', 'etendard' ),
		'new_item'           => __( 'Add New', 'etendard' ),
		'edit_item'          => __( 'Edit Project', 'etendard' ),
		'view_item'          => __( 'View Project', 'etendard' ),
		'all_items'          => __( 'All Projects', 'etendard' ),
		'search_items'       => __( 'Search Projects', 'etendard' ),
		'parent_item_colon'  => __( 'Parent Project:', 'etendard' ),
		'not_found'          => __( 'No Projects found.', 'etendard' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.', 'etendard' ),
		);
		
		register_post_type('portfolio', array(
			'label'=>__('Project', 'etendard'),
			'labels'=>$labels_portfolio,
			'public'=>true,
			'menu_position'=>20,
			'has_archive'=>'portfolio-archive',
			'rewrite'=>array(
				'slug'=>apply_filters('etendard_portfolio_slug', __('project', 'etendard'))
			),
			'exclude_from_search'=> true
		));
		add_post_type_support('portfolio', array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'revisions',
			'post-formats'
		));
		register_taxonomy('portfolio_categorie', 'portfolio', array(
			'label'=>__('Categories', 'etendard'),
			'hierarchical'=>true,
			'show_in_nav_menus'=> true,
			'rewrite'=>array(
				'slug'=>apply_filters('etendard_portfolio_category_slug', __('portfolio_categorie', 'etendard'))
			)
		));
		register_taxonomy_for_object_type('portfolio_categorie', 'portfolio');
		
		// Services
		$labels_service = array(
		'name'               => _x( 'Services', 'service post type general name', 'etendard' ),
		'singular_name'      => _x( 'Service', 'service post type singular name', 'etendard' ),
		'menu_name'          => _x( 'Services', 'services admin menu', 'etendard' ),
		'name_admin_bar'     => _x( 'Service', 'add new service on admin bar', 'etendard' ),
		'add_new'            => _x( 'Add New', 'add new service', 'etendard' ),
		'add_new_item'       => __( 'Add New Service', 'etendard' ),
		'new_item'           => __( 'Add New', 'etendard' ),
		'edit_item'          => __( 'Edit Service', 'etendard' ),
		'view_item'          => __( 'View Service', 'etendard' ),
		'all_items'          => __( 'Services', 'etendard' ),
		'search_items'       => __( 'Search Services', 'etendard' ),
		'parent_item_colon'  => __( 'Parent Service:', 'etendard' ),
		'not_found'          => __( 'No Services Found.', 'etendard' ),
		'not_found_in_trash' => __( 'No Services Found in Trash.', 'etendard' ),
		);
		
		register_post_type('service', array(
			'label'=>__('Services', 'etendard'),
			'labels'=>$labels_service,
			'public'=>true,
			'menu_position'=>21,
			'has_archive'=>'service-archive',
			'rewrite'=>array(
				'slug'=>apply_filters('etendard_service_slug', __('service', 'etendard'))
			),
			'exclude_from_search'=> true
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

////////////////////////////////////
// Custom Post Format by post type thanks to @Boiteaweb :)
////////////////////////////////////

if(!function_exists('etendard_custom_format')){
	function etendard_custom_format() {
		$cpts = array( 'post' => array( 'video', 'link', 'quote' ), 'portfolio' => array( 'video' ) );
		$current_post_type = $GLOBALS['typenow'];
		if($current_post_type == 'post' || $current_post_type == 'portfolio')
			add_theme_support( 'post-formats', $cpts[ $GLOBALS['typenow'] ] );
	}
}
add_action( 'load-post.php', 'etendard_custom_format' );
add_action( 'load-post-new.php', 'etendard_custom_format' );

////////////////////////////////////
// Scripts & Styles Registering & Loading
////////////////////////////////////

if (!function_exists('etendard_enqueue')){
	function etendard_enqueue(){
		
		if(is_page_template('template_home.php') || is_singular( 'portfolio')){
			// Slider
			wp_register_script('glide', get_template_directory_uri().'/lib/glide/glide.min.js', array('jquery'), false, true);
			wp_register_style('glide', get_template_directory_uri().'/lib/glide/glide.css', false);
		}
		
		wp_register_script('fitvids', get_template_directory_uri().'/lib/fitvids/jquery.fitvids.js', array('jquery'), false, true);
		
		// Fancybox (lightbox like effect)
		wp_register_script('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.pack.js', array('jquery'), false, true);
		wp_register_style('fancybox', get_template_directory_uri().'/lib/fancybox/jquery.fancybox.css', false, false);
		
		// Etendard combined scripts (menu, galery, backtotop...)
		wp_register_script('etendard_combined', get_template_directory_uri().'/js/etendard-combined.js', array('jquery'), false, true);
		
		// Entendard Shortcodes Script
		wp_register_script('etendard_shortcodes', get_template_directory_uri().'/admin/js/shortcodes.js', array('jquery'), false, true);
		
		// Google Fonts
		wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Sanchez:400,400italic|Maven+Pro:400,700', array(), false);
		
		// Etendard Font
		wp_enqueue_style('icons', get_template_directory_uri().'/fonts/style.css', array(), false);
		
		// Style.css
		wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), false);
		
		// Enqueue scripts & style
		wp_enqueue_script('glide');
		wp_enqueue_style('glide');
		
		wp_enqueue_script('fitvids');
		
		wp_enqueue_script('etendard_combined');
		wp_enqueue_script('etendard_shortcodes');
		
		wp_enqueue_script('fancybox');
		wp_enqueue_style('fancybox');
		
		if ( is_singular() ){
			wp_enqueue_script( "comment-reply" );
		}
	
	}
}
add_action('wp_enqueue_scripts', 'etendard_enqueue');

////////////////////////////////////
// Admin Initialization
////////////////////////////////////

// Removing Custom fields metabox
if (!function_exists('etendard_admin_init')){
	function etendard_admin_init(){
		//remove_meta_box('postcustom', 'portfolio', 'normal');
		remove_meta_box('postcustom', 'service', 'normal');
	}
}
add_action('admin_init', 'etendard_admin_init');

// Add Etendard admin menu
if (!function_exists('etendard_admin_menu')){
	function etendard_admin_menu(){
		add_theme_page(__('Etendard Settings','etendard'), __('Etendard Settings','etendard'), 'edit_theme_options', 'etendard_options', 'etendard_options');
	}
}
add_action('admin_menu', 'etendard_admin_menu');

if (!function_exists('etendard_options')){
	function etendard_options(){
		if (!current_user_can('edit_theme_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
       	
       	include 'admin/index.php';
    }
}

////////////////////////////////////
// Widgets Initialization
////////////////////////////////////

// Etendard Social
if (!function_exists('etendard_widgets_init')){
	function etendard_widgets_init(){
		register_widget('EtendardSocial');
	}
}
add_action('widgets_init', 'etendard_widgets_init');

// Etendard Call to action
if (!function_exists('etendard_appel_action_init')){
	function etendard_appel_action_init(){
		register_widget('EtendardAppelAction');
	}
}
add_action('widgets_init', 'etendard_appel_action_init');

////////////////////////////////////
// Custom Metaboxes
////////////////////////////////////

if (!function_exists('etendard_register_custom_fields')){
	function etendard_register_custom_fields(){
		add_meta_box('etendard_portfolio_client',
					 __('Project Metas', 'etendard'),
					 'etendard_portfolio_client',
					 'portfolio',
					 'side',
					 'default'
		);
		
		add_meta_box('etendard_portfolio_temoignage',
					 __('Testimonial', 'etendard'),
					 'etendard_portfolio_temoignage',
					 'portfolio',
					 'normal',
					 'high'
		);
		
		add_meta_box('etendard_portfolio_diaporama',
					 __('Slider', 'etendard'),
					 'etendard_portfolio_diaporama',
					 'portfolio',
					 'normal',
					 'high'
		);
		
		// Home Metaboxes
		if (isset($_GET['post']) || isset($_POST['post_ID'])){
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
			$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
			
			if ($template_file == 'template_home.php'){
				
				$display_blocks = get_option('etendard_home_blocks');
				
				if ($display_blocks['cta']){
					add_meta_box('etendard_home_cta',
								 __('Call to action', 'etendard'),
								 'etendard_home_cta',
								 'page',
								 'normal',
								 'high'
					);
				}
				
				if ($display_blocks['diaporama']){
					add_meta_box('etendard_portfolio_diaporama',
							 __('Slider', 'etendard'),
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

// Metaboxes loading
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

////////////////////////////////////
// Delete custom sizes thumbnails
////////////////////////////////////

if (!function_exists('etendard_strip_img_sizes')){
	//delete images width & height attributes
	function etendard_strip_img_sizes($img){
		$img = preg_replace("/\s(width|height)=('|\")\d+('|\")/", ' ', $img);
		return apply_filters('etendard_strip_img_sizes', $img);
	}
}
add_filter('get_avatar', 'etendard_strip_img_sizes');
add_filter('post_thumbnail_html', 'etendard_strip_img_sizes');

////////////////////////////////////
// Pagination
////////////////////////////////////

if (!function_exists('etendard_posts_nav')){
	//derived from http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
	/*
	 @param $extremes : display or not previous & next links
	 @param $separator : string to insert between each page
	*/
	
	function etendard_posts_nav($extremes = true, $separator = '|'){
		if (is_singular()) return;
	
		global $wp_query;
		$output = '';
	
		// Stop execution if there's only 1 page
		if($wp_query->max_num_pages <= 1) return;
	
		$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
		$max = intval($wp_query->max_num_pages);
	
		// Add current page to the array
		if ($paged >= 1) $links[] = $paged;
	
		// Add the pages around the current page to the array
		if ($paged >= 3){
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
	
		if (($paged + 2 ) <= $max){
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		
		$current = apply_filters('etendard_post_nav_current', '<span class="current">%s</span>');
		$linkTemplate = apply_filters('etendard_post_nav_link', '<a href="%s">%s</a>');
	
		// Previous Post Link
		if ($extremes && get_previous_posts_link()) previous_posts_link();
	
		// Link to first page, plus ellipses if necessary */
		if (!in_array(1, $links)){
			if ($paged == 1)
				$output .= sprintf($current, '1');
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link(1)), '1');
			
			$output .= $separator;
			if (!in_array(2, $links)) $output .= '…'.$separator;
		}
	
		// Link to current page, plus 2 pages in either direction if necessary
		sort($links);
		foreach ((array) $links as $link){
			if ($paged == $link)
				$output .= sprintf($current, $link);
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link($link)), $link);
				
			if ($link < $max) $output .= $separator;
		}
	
		// Link to last page, plus ellipses if necessary
		if (!in_array($max, $links)){
			if (!in_array($max-1, $links)) $output .= '…'.$separator;
	
			if ($paged == $max)
				$output .= sprintf($current, $link);
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link($max)), $max);
		}
		
		echo apply_filters('etendard_post_nav', $output);
	
		// Next Post Link
		if ($extremes && get_next_posts_link()) next_posts_link();
	}
}

/**
 * Display navigation to next/previous post when applicable.
 * Derived from Twenty Fourteen Theme
 *
 * @since 1.0
 * @return void
 */
 
if (!function_exists('etendard_single_post_nav')){
	function etendard_single_post_nav() {
		
		// Filter to handle displaying of the post navigation
		if(!apply_filters('etendard_single_post_nav',true)){
			return;
		}
		
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
	
		if ( ! $next && ! $previous ) {
			return;
		}
	
		?>
		<nav class="entry-navigation" role="navigation">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '<span class="meta-nav-prev">%link</span>', __( 'Published In', 'etendard' ) . '%title' );
			else :
				previous_post_link( '<span class="meta-nav-prev">%link</span>', __( 'Previous Post', 'etendard' ));
				next_post_link( '<span class="meta-nav-next">%link</span>', __( 'Next Post', 'etendard' ));
			endif;
			?>
		</nav><!-- .entry-navigation -->
		<?php
	}
}

////////////////////////////////////
// Comments
////////////////////////////////////

// Borrowed from http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
if (!function_exists('etendard_comment')){
	function etendard_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p>
				<?php echo apply_filters('etendard_pingback', __('Pingback:', 'etendard')); ?>
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
						<em><?php echo apply_filters('etendard_commentaire_modere', __('Your comment is waiting for moderation.', 'etendard')); ?></em>
					<?php endif; ?>
					<?php echo get_avatar($comment, 104); ?>
				</aside>
				
				<div class="col-4-5">
					<header class="comment-header">
						<div class="comment-author vcard">
							<?php echo apply_filters('etendard_commentaire_auteur', sprintf('%s', sprintf('<cite class="fn">%s</cite>', get_comment_author_link()))); ?>
						</div>
						<span class="comment-date">
							<?php echo apply_filters('etendard_commentaire_date', sprintf(__('Published on %s at %s', 'etendard'),get_comment_date(),get_comment_time('H:i'))); ?>
						</span>
					</header>
		 
					<div class="content">
						<?php comment_text(); ?>
					</div>
					
					<div class="reply">
						<?php 
						comment_reply_link(array_merge($args, 
							array(	'depth'=>$depth, 
									'max_depth'=>$args['max_depth'],
									'reply_text'=>apply_filters('etendard_commentaire_repondre', __('Reply', 'etendard'))))); 
						?>
					</div><!-- .reply -->
				</div>
			</article><!-- #comment-## -->
		<?php
			break;
		endswitch;
	}
}

////////////////////////////////////
// Miscellaneous Functions
////////////////////////////////////

// Get the first page using the portfolio template
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

// Get the first page using the service template
if (!function_exists('etendard_service_page_link')){
	function etendard_service_page_link(){
		$services_pages = get_pages(array(
			'meta_key'=>'_wp_page_template',
			'meta_value'=>'template-services.php'
		));
		
		if (count($services_pages) > 0)
			return get_page_link($services_pages[0]->ID);
	}
}

// Custom excerpt size
if (!function_exists('etendard_custom_excerpt_length')){
	function etendard_custom_excerpt_length($length) {
		return 20;
	}
	add_filter('excerpt_length', 'etendard_custom_excerpt_length', 999);
}

// Deleting more from excerpts
if (!function_exists('etendard_new_excerpt_more')){
	function etendard_new_excerpt_more($more) {
		return '…';
	}
	add_filter('excerpt_more', 'etendard_new_excerpt_more');
}

// Custom excerpts
if (!function_exists('etendard_excerpt')){
	function etendard_excerpt($length){
		global $post;
		
		// No excerpt needed
		if($length==0)
			return '';
		
		// Do we have an excerpt ? (excerpt field in the post editor)
		if(has_excerpt())
			return apply_filters('the_excerpt', wpautop(strip_shortcodes(strip_tags(get_the_excerpt()))));
		
		// Do we have a read more tag (<!--more-->) in the post content ?
		if(strpos( $post->post_content, '<!--more-->' )){
			$content_arr = get_extended($post->post_content);
			return apply_filters('the_excerpt', wpautop(strip_shortcodes(strip_tags($content_arr['main']))));
		}
		
		// Get the post content without shortcodes or HTML tags
		$content = strip_shortcodes(strip_tags(get_the_content()));
		
		// Create a custom excerpt based on the post content
		return apply_filters('the_excerpt', wpautop(wp_trim_words( $content , $length )));
	}
}

// Backward title compatibility for WP < 4.1
if ( ! function_exists( '_wp_render_title_tag' ) ){
	function etendard_render_title() {
	    echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
	}
	add_action( 'wp_head', 'etendard_render_title');
}

// Paginated post
// Thanks to https://gist.github.com/tommcfarlin/f2310bfad60b60ae00bf#file-is-paginated-post-php
if (!function_exists('etendard_is_paginated_post')){
	function etendard_is_paginated_post() {
		global $multipage;
		return 0 !== $multipage;
	}
}

// Resizing images when uploading
if (!function_exists('etendard_resize_upload')){
	function etendard_resize_upload($img, $width, $height){
		$uploadDirs = wp_upload_dir();
		$upload_url = $uploadDirs['baseurl'];
		$upload_path = $uploadDirs['basedir'];
		
		// Full path to the image, without root url
		$fullPath = substr($img, strlen($upload_url));

		$exploded = explode('/', $fullPath);
		$imgName = array_pop($exploded);//only the image name
		$imgDir = implode($exploded, '/').'/';//direcotry containing the image, with leading and trailing slash

		// Compute the name of the resized image
		$separator = strrpos($imgName, '.');
		$wanted = substr($imgName, 0, $separator).'-'.$width.'x'.$height.substr($imgName, $separator);

		if (!file_exists($upload_path.$imgDir.$wanted)){
			// Create resized image
			$editor = wp_get_image_editor($upload_path.$imgDir.$imgName);
			if (!is_wp_error($editor)){
				$editor->resize($width, $height, true);
				$editor->save($upload_path.$imgDir.$wanted);
			}
			else{
				// Default fallabck to normal image
				$wanted = $imgName;
			}
		}
		
		return apply_filters('etendard_resize_upload', $upload_url.$imgDir.$wanted);
	}
}

/**
 * Show a popup in order to make people drop IE mouahaha
 *
 * @since 1.016
 * @return void
 */
if(!function_exists('etendard_chromeframe_notice')){
	function etendard_chromeframe_notice(){ ?>
		<!--[if lt IE 8]><p class='chromeframe'><?php _e('Your browser is <em>too old !','toutatis'); ?></em> <a href="http://browsehappy.com/"><?php _e('Update your browser','toutatis'); ?></a> <?php _e('or','toutatis'); ?> <a href="http://www.google.com/chromeframe/?redirect=true"><?php _e('Install Google Chrome Frame','toutatis'); ?></a> <?php _e('to display this website correctly','toutatis'); ?>.</p><![endif]-->
	<?php
	}
}
add_action('etendard_body_top','etendard_chromeframe_notice');

////////////////////////////////////
// Styles Personnalisés
////////////////////////////////////

// Main Etendard color
if(!function_exists('etendard_user_styles')){
	function etendard_user_styles(){
		if (get_option('etendard_color')){
			$color = apply_filters('etendard_color', get_option('etendard_color'));
			
			require_once 'admin/color_functions.php';
			$hsl = etendard_RGBToHSL(etendard_HTMLToRGB($color));
			if ($hsl->lightness > 180){
				$contrast = '#333';
			}
			else{
				$contrast = apply_filters('etendard_color_contrast', '#fff');
			}
			
			$hsl->lightness -= 30;
			$complement = apply_filters('etendard_color_complement', etendard_HSLToHTML($hsl->hue, $hsl->saturation, $hsl->lightness));
		}
		else{ // Default color
			$color = '#02a7c6';
			$complement = '#007f96';
			$contrast = '#fff';
		} ?>
			<style type="text/css">
				section.realisation .realisation-site,
				.article .content a,
				.article .header-meta a,
				.article .footer-meta a,
				.entry-navigation a,
				.main-header .logo-wrap a.logotext:hover,
				#comments a,
				.sidebar .widget_etendardnewsletter .form-email:before,
				form.search-form .search-submit-wrapper:before,
				a.more-link,
				ul.services .service h2:hover,
				ul.portfolio .creation figcaption,
				.single-portfolio .col-1-3.meta a,
				.article .header-title a:hover,
				.article.quote > blockquote cite,
				.comment .comment-author a,
				.comment-navigation a,
				.main-footer a,
				.sidebar .widget a:hover,
				.error404 .content a,
				article.format-link .post-link .header-title a:hover,
				article.format-link .post-link .post-link-url a,
				article.format-quote .post-quote blockquote a:hover,
				.auteur-box a{
					color: <?php echo $color; ?>;
				}
				

				.top-level-menu li > a:hover,
				ul.portfolio .creation figure:hover figcaption,
				.article.teaser .header-title:after,
				#commentform #submit,
				.widget_calendar #today,
				section.portfolio nav.categories a:hover,
				section.portfolio nav.categories a.active,
				section.portfolio nav.categories span:hover,
				section.portfolio nav.categories span.active,
				.sidebar .widget_etendardnewsletter input[type="submit"],
				.widget_etendardappelaction a.cta-button,
				.widget_etendardsocial li a,
				.cta .button-wrapper .cta-button,
				.embedcta .button-wrapper .cta-button,
				.cta-wrapper .cta-button,
				.article .content a.bouton,
				input[type='submit'],
				input[type='button'],
				a.bouton.lirelasuite,
				.headerbar,
				#remonter,
				section.portfolio .pagination a,
				section.services .pagination a{
					background: <?php echo $color; ?> !important;
					color: <?php echo $contrast; ?> !important;
				}
				
				@media only screen and (min-width: 759px){
					.top-level-menu > li:hover > a{
						background: <?php echo $color; ?> !important;
						color: <?php echo $contrast; ?> !important;
					}
				}
				
				<?php foreach(array('-moz-', '-webkit-', '-ms-', '-o-', '') as $prefix){ ?>
				::<?php echo $prefix; ?>selection{ 
					background: <?php echo $color; ?>;
					color: <?php echo $contrast; ?>;
				}
				<?php } ?>
				
				.toplevel > li > a.active{
					border-bottom: 2px solid <?php echo $color; ?> !important;;
				}
				.main-menu .sub-menu:before{
					border-bottom: 3px solid <?php echo $color; ?> !important;;
				}
				
				.article.teaser .header-title:hover:after,
				.widget_etendardsocial li a:hover,
				.widget_etendardappelaction a.cta-button:hover,
				.cta .button-wrapper .cta-button:hover,
				.embedcta .button-wrapper .cta-button:hover,
				.article .content a.bouton:hover,
				.cta-wrapper .cta-button:hover,
				.contact-form .submit input:hover,
				#commentform #submit:hover,
				.comment-navigation a:hover,
				a.bouton.lirelasuite:hover,
				#remonter:hover,
				section.portfolio .pagination a:hover,
				section.services .pagination a:hover,
				input[type='submit']:hover,
				input[type='button']:hover{
					background:<?php echo $complement; ?> !important;
				}
				
				form.search-form .search-submit-wrapper:hover:before,
				div.pagination a:hover,
				.sidebar .widget a{
					color:<?php echo $complement; ?>;
				}
				.sidebar .widget_etendardsocial li a,
				.sidebar .widget_etendardsocial li a:hover,
				.sidebar .widget_etendardappelaction a.cta-button,
				.sidebar .widget_etendardappelaction a.cta-button:hover,
				#breadcrumbs a,
				.headerbar a{
					color:<?php echo $contrast; ?> !important;
				}
			</style>
		<?php }
}
add_action('wp_head','etendard_user_styles', 98);

// Custom CSS loading
if(!function_exists('etendard_custom_styles')){
	function etendard_custom_styles(){
		if (get_option("etendard_custom_css")){
			echo '<style type="text/css">';
			echo strip_tags(stripslashes(get_option("etendard_custom_css")));
			echo '</style>';
		}
	}
}
add_action('wp_head', 'etendard_custom_styles', 99);



////////////////////////////////////
// License activation
////////////////////////////////////

if(!function_exists('etendard_edd')){
	function etendard_edd(){
		$license = trim(get_option(ETENDARD_LICENSE_KEY));
		$status = get_option('etendard_license_status');
		
		if (!$status){
			//valider la license
			$api_params = array(
				'edd_action'=>'activate_license',
				'license'=>$license,
				'item_name'=>urlencode(ETENDARD_THEME_NAME)
			);
	
			$response = wp_remote_get(add_query_arg($api_params, ETENDARD_STORE_URL), array('timeout'=>15, 'sslverify'=>false));
	
			if (!is_wp_error($response)){
				$license_data = json_decode(wp_remote_retrieve_body($response));
				if ($license_data->license === 'valid') update_option('etendard_license_status', true);
			}
		}
		
		$edd_updater = new EDD_SL_Theme_Updater(array( 
				'remote_api_url'=> ETENDARD_STORE_URL,
				'version' 	=> ETENDARD_THEME_VERSION,
				'license' 	=> $license,
				'item_name' => ETENDARD_THEME_NAME,
				'author'	=> __('Themes de France','etendard')
			)
		);
	}
}
add_action('admin_init', 'etendard_edd');

////////////////////////////////////
// Etendard notifications
////////////////////////////////////

if(!function_exists('etendard_admin_notice')){
	function etendard_admin_notice(){
	
		global $current_user;
        $user_id = $current_user->ID;
	
		if(!get_option('etendard_license_status')){
			echo '<div class="error"><p>';
			_e("In order to get Etendard updates, please enter your licence that you received by email.", 'etendard');
			echo '</p></div>';
		}
		
		if(!get_option('page_for_posts')){
			if ( ! get_user_meta($user_id, 'ignore_pageforposts_notice') ) {

				echo '<div class="error"><p>';
				printf(__('You did not set up any page for posts. <a href="%s">Click here to fix it</a> | <a href="%s">Ignore</a>', 'etendard'), admin_url('options-reading.php'), '?ignore_notice=pageforposts');
				echo '</p></div>';
			}
		}
		
		/* Shortcodes are now available in the Cocorico Shortcodes plugin */
		if ( ! get_user_meta($user_id, 'ignore_cocorico_shortcodes_notice') ) {
			
			if(!function_exists('coco_shortcodes_register')){
				echo '<div class="error"><p>';
				printf(__("If you need to use shortcodes, take a look at our <a href='%s'>Cocorico Shortocodes plugin</a>. | <a href='%s'>No thanks</a>", 'etendard'), admin_url('plugin-install.php?tab=search&type=term&s="Cocorico+Shortcodes"'), '?ignore_notice=cocorico_shortcodes');
				echo '</p></div>';
			}else{
				echo '<div class="updated"><p>';
				printf(__("Thanks for using our Cocorico Shortcodes plugin, you're awesome ! If you think we can enhance it, <a href='%s' target='_blank'>tell us what to do here</a>. | <a href='%s'>No thanks</a>", 'etendard'), "https://www.themesdefrance.fr/temoignage/", '?ignore_notice=cocorico_shortcodes');
				echo '</p></div>';
			}
		}
		
	}
}
add_action('admin_notices', 'etendard_admin_notice');

// Thanks to http://wptheming.com/2011/08/admin-notices-in-wordpress/
if (!function_exists('etendard_ignore_admin_notice')){
	function etendard_ignore_admin_notice() {
		global $current_user;
        $user_id = $current_user->ID;
        
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['ignore_notice']) && 'pageforposts' == $_GET['ignore_notice'] ) {
             add_user_meta($user_id, 'ignore_pageforposts_notice', 'true', true);
		}
		
		if ( isset($_GET['ignore_notice']) && 'cocorico_shortcodes' == $_GET['ignore_notice'] ) {
             add_user_meta($user_id, 'ignore_cocorico_shortcodes_notice', 'true', true);
		}
	}
}
add_action('admin_init', 'etendard_ignore_admin_notice');


////////////////////////////////////
// Complement cocorico
////////////////////////////////////
if (!function_exists('etendard_admin_enqueue')){
	function etendard_admin_enqueue($uri){
		define('ETENDARD_COCO_URI', get_template_directory_uri().'/admin/Cocorico');
		wp_register_style( 'etendard_custom_admin_css', ETENDARD_COCO_URI.'/extensions/etendard/admin-style.css', false );
		wp_enqueue_style( 'etendard_custom_admin_css' );
	}
}
add_action('admin_enqueue_scripts', 'etendard_admin_enqueue');

////////////////////////////////////
// TinyMCE 4 Shortcodes Menu Button
////////////////////////////////////

if(!function_exists('etendard_add_tinymce4')){
	function etendard_add_tinymce4() {
		global $typenow;
		if( ! in_array( $typenow, array( 'post', 'page', 'portfolio', 'service' ) ) )
        return ;
		
	    add_filter( 'mce_external_plugins', 'etendard_add_tinymce4_plugin' );
	    // Add button to line 1 form WP TinyMCE
	    add_filter( 'mce_buttons', 'etendard_add_tinymce4_button' );
	}
}
//add_action( 'admin_head', 'etendard_add_tinymce4' );

// Load TinyMCE plugin
if(!function_exists('etendard_add_tinymce4_plugin')){
	function etendard_add_tinymce4_plugin( $plugin_array ) {
	
	    $plugin_array['shortcode_drop'] = get_template_directory_uri() . '/admin/js/tmcedrop4.js';
	    return $plugin_array;
	}
}

// Create shortcode button
if(!function_exists('etendard_add_tinymce4_button')){
	function etendard_add_tinymce4_button( $buttons ) {
	
	    array_push( $buttons, 'etendard_shortcode_button' );
	    return $buttons;
	}
}

////////////////////////////////////
// Addons tab content
////////////////////////////////////

// bbPress addon
if(!function_exists('etendard_addons_bbpress')){
	function etendard_addons_bbpress($form){
		
		$form->startWrapper('tr');
	
			$form->startWrapper('th');
			
				$form->component('raw', __('Etendard bbPress Addon', 'etendard'));
			
			$form->endWrapper('th');
	
			$form->startWrapper('td');
				
				// Check if the Etendard bbPress addon is installed
				if(!function_exists('etendard_bbpress_styles')):
					
					$form->component('raw', __('Etendard bbPress Addon bring custom CSS styling to Etendard to get a perfect bbPress integration.', 'etendard') . '<br><br>');
					
					$form->component('link',
									 'https://www.themesdefrance.fr/module-bbpress-etendard/?utm_source=Etendard&utm_medium=bouton&utm_content=Etendard_bbPress&utm_campaign=EtendardAdmin',
									 __('Get Etendard bbPress Addon', 'etendard'),
									 array(
										 'class'=>array('button', 'button-primary'),
										 'target'=>'_blank'
									 ));
				else:
					$form->component('description', __('Etendard bbPress Addon is installed. Thanks for using it !', 'etendard'));
					
					$form->component('description', __('If you have some time, help us to improve it by giving some feedback.', 'etendard') . '<br><br>');
					
					$form->component('link',
									 'https://www.themesdefrance.fr/temoignage/?produit=Etendard%20bbPress&utm_source=Etendard&utm_medium=bouton&utm_content=Etendard_bbPress&utm_campaign=EtendardAdmin',
									 __('Give feedback on Etendard bbPress Addon', 'etendard'),
									 array(
										 'class'=>array('button'),
										 'target'=>'_blank'
									 ));
					
				endif;
			
			$form->endWrapper('td');
		
		$form->endWrapper('tr');
		
	
	}
}
add_action('etendard_addons_tab', 'etendard_addons_bbpress', 10, 1);

////////////////////////////////////
// Migration from previous versions
////////////////////////////////////

require_once 'admin/migration.php';


