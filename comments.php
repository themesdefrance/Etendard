<?php if (post_password_required()) return; ?>
 
<div id="comments" class="comments-area">
	<?php if (have_comments()) : ?>
		<h2 class="comments-title">
			<?php
                printf(_n('Une personne à écrit un commentaire, et vous ?', '%1$s personnes ont déja écrit un commentaire, et vous ?', get_comments_number(), TEXT_TRANSLATION_DOMAIN), number_format_i18n(get_comments_number()));
            ?>
		</h2>
		
		<?php comment_form(array(
			'comment_notes_before'=>'',
			'comment_notes_after'=>'',
			'title_reply'=>'',
			'title_reply_to'=>__('Répondre à %s', TEXT_TRANSLATION_DOMAIN),
			'label_submit'=>__('Envoyer', TEXT_TRANSLATION_DOMAIN),
		)); ?>
		
		<ol class="comment-list">
			<?php wp_list_comments(array('callback'=>'etendard_comment')); ?>
		</ol><!-- .commentlist -->
 
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav role="navigation" id="comment-nav-below" class="comment-navigation">
			<div class="nav-previous">
            	<?php previous_comments_link(__('Commentaires précédents', TEXT_TRANSLATION_DOMAIN)); ?>
            </div>
            <div class="nav-next">
            	<?php next_comments_link(__('Commentaires suivants', TEXT_TRANSLATION_DOMAIN)); ?>
            </div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
	<?php endif; // have_comments() ?>
 
    <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="nocomments">
			<?php _e('Les commentaires sont clos.', TEXT_TRANSLATION_DOMAIN); ?>
		</p>
	<?php endif; ?>
</div><!-- #comments .comments-area -->