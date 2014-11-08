<?php
	$post_header_date     = apply_filters('etendard_post_header_date', true);
	$post_header_author   = apply_filters('etendard_post_header_author', true);
	$post_header_category = apply_filters('etendard_post_header_category', true);
	$post_header_comments = apply_filters('etendard_post_header_comments', true);
?>

<?php if(!is_page() && !is_tag()): ?> 
		
	<span class="header-meta">
	
		<?php
		
		if($post_header_date || $post_header_author || $post_header_category){
			_e('Published ','etendard');
		}
		if($post_header_date){
			echo sprintf(__('on %s ','etendard'),get_the_date());
		}
		if($post_header_author){
			echo sprintf(__('by <a href="%s">%s</a> ','etendard'), get_author_posts_url(get_the_author_meta('ID')), get_the_author_meta('display_name') );
		}
		if($post_header_category){
			echo sprintf(__('in %s ','etendard'), get_the_category_list('/'));
		}
		if($post_header_date || $post_header_author || $post_header_category){
			echo '| ';
		}
		if($post_header_comments){
			comments_number(__('No Comment', 'etendard'), __('One Comment', 'etendard'), __('% Comments', 'etendard'));
			echo ' | ';
		}
		
		edit_post_link(__('Edit', 'etendard'));
	?>
		
	</span>

<?php endif; ?>