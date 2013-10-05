<?php if (post_password_required()) return; ?>
 
<div id="comments" class="comments-area">
	<?php if (have_comments()) : ?>
		<h2 class="comments-title">
			<?php
                printf(_n('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'shape'),
                    	number_format_i18n( get_comments_number() ), '<span>'.get_the_title().'</span>');
            ?>
		</h2>
		
		<ol class="commentlist">
			<?php wp_list_comments(array('callback'=>'shape_comment')); ?>
		</ol><!-- .commentlist -->
 
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h1 class="assistive-text">
				<?php _e('Comment navigation', 'shape'); ?>
			</h1>
			<div class="nav-previous">
            	<?php previous_comments_link(__('&larr; Older Comments', 'shape')); ?>
            </div>
            <div class="nav-next">
            	<?php next_comments_link(__('Newer Comments &rarr;', 'shape')); ?>
            </div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
	<?php endif; // have_comments() ?>
 
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="nocomments">
			<?php _e( 'Comments are closed.', 'shape' ); ?>
		</p>
	<?php endif; ?>
	
	<?php comment_form(); ?>
</div><!-- #comments .comments-area -->