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
		if($post_header_date){ ?>
			
			<?php _e('on','etendard'); ?>
			
			<time class="date updated">
				<?php the_date(); ?>
			</time>
			
		<?php
		}
		if($post_header_author){ ?>
			
			<?php _e('by','etendard'); ?>
			
			<span class="vcard author">
				<span class="fn">
					<a href="<?php get_author_posts_url(get_the_author_meta('ID')) ?>">
						<?php get_the_author_meta('display_name'); ?>
					</a>
				</span>
			</span>
			
		<?php
		}
		if($post_header_category){
			printf(__('in','etendard') . ' ' . get_the_category_list('/') . ' ');
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