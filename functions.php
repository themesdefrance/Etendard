<?php
define('TEXT_TRANSLATION_DOMAIN', 'etendard');
				
require_once 'widgets/newsletter.php';
require_once 'widgets/social.php';

if (!function_exists('etendard_setup')){
	function etendard_setup(){
		register_nav_menu('primary', __('Menu principal', TEXT_TRANSLATION_DOMAIN));
					
		register_sidebar(array(
				'name'          => __('Widgets de pied de page', TEXT_TRANSLATION_DOMAIN),
				'id'            => 'footer',
				'description'   => __('Section apparaissant en bas de toutes les pages.', TEXT_TRANSLATION_DOMAIN),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
			
		register_sidebar(array(
				'name'          => __('Widgets de blog', TEXT_TRANSLATION_DOMAIN),
				'id'            => 'blog',
				'description'   => __('Barre latérale sur les pages du blog.', TEXT_TRANSLATION_DOMAIN),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
		));
		
		add_theme_support('post-thumbnails');
		add_theme_support('custom-header', array(
			'header-text'=>false,
			'height'=>200,
			'admin-preview-callback'=>'etendard_admin_header_image',
		));
		
		add_theme_support('post-formats', array(
			'chat', 'image', 'link', 'quote', 'status', 'video'
		));
		
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
			'revisions',
		));
		register_taxonomy('portfolio_categorie', 'portfolio', array(
			'label'=>'Catégories',
			'hierarchical'=>true,
		));
		register_taxonomy_for_object_type('portfolio_categorie', 'portfolio');
	}
}

if (!function_exists('etendard_enqueue')){
	function etendard_enqueue(){
		$theme = get_theme(get_current_theme());
		
		wp_enqueue_style('fonts', 'http://fonts.googleapis.com/css?family=Sanchez:400,400italic|Maven+Pro:400,700&subset=latin,latin-ext', array(), $theme['version']);
		wp_enqueue_style('icons', get_template_directory_uri().'/fonts/style.css', array(), $theme['version']);
		wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css', array(), $theme['version']);
	}
}

if (!function_exists('etendard_admin_menu')){
	function etendard_admin_menu(){
		add_theme_page('Étendard', 'Étendard', 'edit_theme_options', 'etendard-options', 'etendard_options');
	}
}

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
		register_widget('EtendardNewsletter');
		register_widget('EtendardSocial');
	}
}

if (!function_exists('etendard_register_custom_fields')){
	function etendard_register_custom_fields(){
		add_meta_box('etandard_portfolio_meta',
					 __('Informations', TEXT_TRANSLATION_DOMAIN),
					 'etendard_portfolio_custom_fields',
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
	}
}

if (!function_exists('etendard_portfolio_custom_fields')){
	function etendard_portfolio_custom_fields($post){
		wp_nonce_field('etendard_portfolio_nonce', 'etendard_portfolio_nonce');
		
		$client = get_post_meta($post->ID, 'etendard_portfolio_client', true);
		$date = get_post_meta($post->ID, 'etendard_portfolio_date', true);
		$role = get_post_meta($post->ID, 'etendard_portfolio_role', true);
		$url = get_post_meta($post->ID, 'etendard_portfolio_url', true);
		?>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_client">
						<span><?php _e('Client', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_client" name="etendard_portfolio_client" value="<?php echo esc_attr($client); ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_date">
						<span><?php _e('Date', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_date" name="etendard_portfolio_date" value="<?php echo esc_attr($date); ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_role">
						<span><?php _e('Rôle', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_role" name="etendard_portfolio_role" value="<?php echo esc_attr($role); ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_url">
						<span><?php _e('URL', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_url" name="etendard_portfolio_url" value="<?php echo esc_attr($url); ?>" />
				</td>
			</tr>
		</table>
		<?php
	}
}

if (!function_exists('etendard_portfolio_temoignage')){
	function etendard_portfolio_temoignage($post){
		$nom = get_post_meta($post->ID, 'etendard_portfolio_temoin_nom', true);
		$texte = get_post_meta($post->ID, 'etendard_portfolio_temoin_texte', true);
		$portrait = get_post_meta($post->ID, 'etendard_portfolio_temoin_portrait', true);
		?>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_temoin_nom">
						<span><?php _e('Nom', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_temoin_nom" name="etendard_portfolio_temoin_nom" value="<?php echo esc_attr($nom); ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_temoin_texte">
						<span><?php _e('Témoignage', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<textarea class="large-text" id="etendard_portfolio_temoin_texte" name="etendard_portfolio_temoin_texte"><?php echo esc_attr($texte); ?></textarea>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="etendard_portfolio_temoin_portrait">
						<span><?php _e('Portrait', TEXT_TRANSLATION_DOMAIN); ?></span>:
					</label>
				</th>
				<td>
					<input type="text" id="etendard_portfolio_temoin_portrait" name="etendard_portfolio_temoin_portrait" value="<?php echo esc_attr($portrait); ?>" />
					<input class="button button-primary button-medium" name="etendard_portfolio_temoin_portrait_button" id="etendard_portfolio_temoin_portrait_button" value="Upload" />
				</td>
			</tr>
		</table>
		<script>
		jQuery(document).ready(function($){
		  var _custom_media = true,
			  _orig_send_attachment = wp.media.editor.send.attachment;
		
		  $('#etendard_portfolio_temoin_portrait_button').click(function(e) {
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $(this);
			var id = button.attr('id').replace('_button', '');
			_custom_media = true;
			wp.media.editor.send.attachment = function(props, attachment){
			  if ( _custom_media ) {
				$('#'+id).val(attachment.url);
			  } else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			  };
			}
		
			wp.media.editor.open(button);
			return false;
		  });
		
		  $('.add_media').on('click', function(){
			_custom_media = false;
		  });
		});
		</script>
		<?php
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
		$date = sanitize_text_field($_POST['etendard_portfolio_date']);
		$role = sanitize_text_field($_POST['etendard_portfolio_role']);
		$url = sanitize_text_field($_POST['etendard_portfolio_url']);
		$temoin = sanitize_text_field($_POST['etendard_portfolio_temoin_nom']);
		$texte = sanitize_text_field($_POST['etendard_portfolio_temoin_texte']);
		$portrait = sanitize_text_field($_POST['etendard_portfolio_temoin_portrait']);
	
		update_post_meta($post_id, 'etendard_portfolio_client', $client);
		update_post_meta($post_id, 'etendard_portfolio_date', $date);
		update_post_meta($post_id, 'etendard_portfolio_role', $role);
		update_post_meta($post_id, 'etendard_portfolio_url', $url);
		update_post_meta($post_id, 'etendard_portfolio_temoin_nom', $temoin);
		update_post_meta($post_id, 'etendard_portfolio_temoin_texte', $texte);
		update_post_meta($post_id, 'etendard_portfolio_temoin_portrait', $portrait);
	}
}

add_action('init', 'etendard_init_cpt');
add_action('after_setup_theme', 'etendard_setup');
add_action('wp_enqueue_scripts', 'etendard_enqueue');
add_action('admin_menu', 'etendard_admin_menu');
add_action('widgets_init', 'etendard_widgets_init');
add_action('add_meta_boxes', 'etendard_register_custom_fields');
add_action('save_post', 'etendard_portfolio_save_custom');

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

if (!function_exists('etendard_admin_header_image')){
	function etendard_admin_header_image(){
		?>
		<img src="<?php header_image(); ?>" alt="<?php echo get_bloginfo('title'); ?>" />
		<?php
	}
}

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