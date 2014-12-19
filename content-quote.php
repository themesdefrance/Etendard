<?php $quote = get_post_meta($post->ID, '_etendard_quote_meta', true); ?>
<?php $author_quote = get_post_meta($post->ID, '_etendard_quote_author_meta', true); ?>

<?php do_action('etendard_before_post'); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article"> 
	
	<?php do_action('etendard_top_post'); ?>
	
	<header class="header">
		
		<?php do_action('etendard_top_header_post'); ?>
	
		<div class="post-quote">
		
			<?php if (is_single()): ?>
				
				<h1>
					<blockquote>“<?php echo sanitize_text_field($quote); ?>”</blockquote>
				</h1>
				
			<?php else: ?>
				
				<h2>
					<blockquote><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">“<?php echo sanitize_text_field($quote); ?>”</a></blockquote>
				</h2>
				
			<?php endif; ?>
			<span class="post-quote-author"><?php echo sanitize_text_field($author_quote); ?></span>
		</div>
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
		<?php do_action('etendard_bottom_header_post'); ?>
		
	</header>
		
	<?php get_template_part( 'content', 'body' ); ?>
	
	<?php get_template_part( 'content', 'footer-meta' ); ?>
	
	<?php do_action('etendard_bottom_post'); ?>
	
</article>

<?php do_action('etendard_after_post'); ?>