<article <?php post_class('article'); ?>>

	<header class="header">
	
		<?php if(!is_category() && !is_tag()){ ?>
			
			<?php if (has_post_thumbnail() && !post_password_required()){ ?>
			
				<div class="entry-thumbnail">
				
					<?php if (is_single()){ ?>
					
						<?php the_post_thumbnail('etendard-post-thumbnail'); ?>
						
					<?php }else{ ?>
					
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_post_thumbnail('etendard-post-thumbnail'); ?></a>
						
					<?php } ?>
					
				</div>
				
			<?php } ?>
			
		<?php } ?>
		
		<?php if (is_single()){ ?>
			
			<h1 class="header-title"><?php the_title(); ?></h1>
		
		<?php }else if(is_page_template('template_home.php')){ ?>
		
			<!-- No title for homepage -->
			
		<?php }else{ ?>
		
			<h2 class="header-title">
			
				<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title());?>"><?php the_title(); ?></a>
				
			</h2>
		
		<?php } ?>
		
		<?php if(!is_tag() && !is_page()){ ?> 
		
			<span class="header-meta">
			
				<?php echo sprintf(__('Publié le %2$s par %3$s dans %4$s | '), get_post_format_string(get_post_format()), get_the_date(), get_the_author_link(), get_the_category_list('/')); ?> 
				
				<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
				
				<?php edit_post_link(__('Éditer', TEXT_TRANSLATION_DOMAIN)); ?>
				
			</span>
		
		<?php } ?>
		
	</header>
	
	<div class="content">
		
		<?php if (is_single() || is_page()){ ?>
		
			<?php the_content(); ?>
			
		<?php } else if(is_category() || is_tax()){ ?>
		
			<?php echo etendard_excerpt(25); ?>
			
			<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
			
		<?php }else if(is_tag()|| is_search()){ ?>
		
			<!-- No excerpt for tags and search results -->
			
		<?php }else{ ?>
		
			<?php echo etendard_excerpt(50); ?>
			
			<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
		
		<?php } ?>	

	</div>
	
	<footer class="footer">
	
		<?php if(has_tag() && is_single()){ ?>
	
			<span class="footer-meta icon-tags">
			
				<?php echo get_the_tag_list('',' | ',''); ?>
			
			</span>
		
		<?php } ?>
		
		<?php if(etendard_is_paginated_post()){ ?>
			<nav>
			
			<?php wp_link_pages(array(
				'before'=>'<div class="page-links"><span class="page-links-title">'.__('Pages:', TEXT_TRANSLATION_DOMAIN).'</span>', 
				'after'=>'</div>'
			)); ?>
			
			</nav>
		<?php } ?>
		
	</footer>
	
</article>