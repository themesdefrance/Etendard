<?php if(!is_page() && !is_tag()): ?> 
		
	<span class="header-meta">
	
		<?php echo sprintf(__('Publié le %2$s par <a href="%3$s">%4$s</a> dans %5$s | ','etendard'), get_post_format_string(get_post_format()), get_the_date(), get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta('display_name') ,get_the_category_list('/')); ?> 
		
		<?php comments_number(__('Aucun commentaire', 'etendard'), __('Un commentaire', 'etendard'), __('% commentaires', 'etendard')); ?> 
		
		<?php edit_post_link(__('Éditer', 'etendard')); ?>
		
	</span>

<?php endif; ?>