<?php $quote = get_post_meta($post->ID, '_etendard_quote_meta', true); ?>
<?php $author_quote = get_post_meta($post->ID, '_etendard_quote_author_meta', true); ?>

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