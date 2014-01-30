<article <?php post_class('article'); ?>>

	<header class="header">
	
		<?php if(!is_category() && !is_tag() && !is_singular('service')){ ?>
			
			<?php if (has_post_thumbnail() && !post_password_required()){ ?>
			
				<div class="entry-thumbnail">
				
					<?php if (is_single() || is_page()){ ?>
					
						<?php the_post_thumbnail('etendard-post-thumbnail'); ?>
						
					<?php }else{ ?>
					
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('etendard-post-thumbnail'); ?></a>
						
					<?php } ?>
				</div>
				
			<?php } ?>
		
		<?php } ?>
		
		<?php if (is_single() || is_page()){ ?>
		
			<h1 class="header-title">
			
				<?php the_title(); ?>
				
			</h1>
			
		<?php } else { ?>
		
			<h2 class="header-title">
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				
			</h2>
			
		<?php } // is_single() ?>
		
		<?php if( !is_singular('service') && !is_page()){ ?> 
		
		<span class="header-meta">
		
			<?php echo sprintf('Publié le %2$s dans ', get_post_format_string(get_post_format()), get_the_date()); ?> 
			
			<?php echo sprintf('%1$s', the_category('/')); ?> |
			
			<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
			
			<?php edit_post_link(__('Éditer', TEXT_TRANSLATION_DOMAIN)); ?>
			
		</span>
		
		<?php } ?>
		
	</header>
	
	<div class="content">
	
		<?php if (is_single() || is_page()){
		
				the_content();
			
			} else {
			
				the_excerpt(__('Lire la suite', TEXT_TRANSLATION_DOMAIN)); ?>
				
				<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
				
		<?php } ?>
		
	</div>
	
	<footer class="footer">
	
		<nav>
		
		<?php wp_link_pages(array(
			'before'=>'<div class="page-links"><span class="page-links-title">'.__('Pages:', TEXT_TRANSLATION_DOMAIN).'</span>', 
			'after'=>'</div>'
		)); ?>
		
		</nav>
		
	</footer>
	
</article>