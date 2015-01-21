<?php $quote = sanitize_text_field(get_post_meta($post->ID, '_etendard_quote_meta', true)); ?>
<?php $author_quote = sanitize_text_field(get_post_meta($post->ID, '_etendard_quote_author_meta', true)); ?>

<?php do_action('etendard_before_post'); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article"> 
	
	<?php do_action('etendard_top_post'); ?>
	
	<header class="entry-header header">
		
		<?php do_action('etendard_top_header_post'); ?>
	
		<div class="entry-quote post-quote">
		
			<?php if (is_single()): ?>
				
				<h1>
					<blockquote>“<?php echo $quote; ?>”</blockquote>
				</h1>
				
			<?php else: ?>
				
				<h2>
					<blockquote><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url">“<?php echo $quote; ?>”</a></blockquote>
				</h2>
				
			<?php endif; ?>
			
			<span class="post-quote-author"><?php echo $author_quote; ?></span>
			
		</div><!--END .entry-quote-->
		
		<?php get_template_part( 'content', 'header-meta' ); ?>
		
		<?php do_action('etendard_bottom_header_post'); ?>
		
	</header><!--END .entry-header-->
		
	<?php get_template_part( 'content', 'body' ); ?>
	
	<?php get_template_part( 'content', 'footer-meta' ); ?>
	
	<?php do_action('etendard_bottom_post'); ?>
	
</article><!--END .article-->

<?php do_action('etendard_after_post'); ?>