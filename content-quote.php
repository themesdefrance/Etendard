<?php $quote = get_post_meta($post->ID, 'etendard_quote_meta', true); ?>
<?php $author_quote = get_post_meta($post->ID, 'etendard_quote_author_meta', true); ?>

<article <?php post_class('article'); ?>>

	<header class="header">
		
		<div class="post-quote">
		
			<?php if (is_single()): ?>
				
				<h1>
					<blockquote>“<?php echo $quote; ?>”</blockquote>
				</h1>
				
			<?php else: ?>
				
				<h2>
					<blockquote><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">“<?php echo $quote; ?>”</a></blockquote>
				</h2>
				
			<?php endif; ?>
			<span class="post-quote-author"><?php echo $author_quote; ?></span>
		</div>
		
		<?php if(!is_page() && !is_tag()): ?> 
		
		<span class="header-meta">
		
			<?php echo sprintf(__('Publié le %2$s par %3$s dans %4$s | '), get_post_format_string(get_post_format()), get_the_date(), get_the_author_link(), get_the_category_list('/')); ?> 
			
			<?php comments_number(__('Aucun commentaire', TEXT_TRANSLATION_DOMAIN), __('Un commentaire', TEXT_TRANSLATION_DOMAIN), __('% commentaires', TEXT_TRANSLATION_DOMAIN)); ?> 
			
			<?php edit_post_link(__('Éditer', TEXT_TRANSLATION_DOMAIN)); ?>
			
		</span>
		
		<?php endif; ?>
		
	</header>
	
	<div class="content">
		<?php 
		if (is_single() || is_page()){
		
			the_content();
		}
		else if(is_category() || is_tax()){
		
			echo etendard_excerpt(25); ?>
			
			<a href="<?php the_permalink(); ?>" class="bouton lirelasuite" title="<?php the_title(); ?>">Lire la suite</a>
			
		<?php 
		}else if(is_tag()|| is_search()){
		
			echo "";
			
		}else{
		
			echo etendard_excerpt(50);
		?>
			
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