<?php if ( post_password_required() ) : ?>
	<?php _e( 'This post is password protected. Enter the password to view any comments.', 'chronicle' ); ?></p>
	<?php return; endif; ?>
    <?php if ( have_comments() ) : ?>
	<h4 class="coment"><?php _e('Comments','chronicle'); ?></h4>
	<div class="mar_top_bottom_lines_small3"></div>	
	<?php wp_list_comments( array( 'callback' => 'chronicle_comment' ) ); ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h5 class="assistive-text"><?php _e( 'Comment navigation', 'chronicle'); ?></h5>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'chronicle' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'chronicle' ) ); ?></div>
		</nav>
	<?php endif;  ?>		
	<?php endif; ?>
	<?php if ( comments_open() ) : ?>
	<div class="comment_form">							
	<?php $fields=array(
		'author' => '<input type="text" name="author" id="name" class="comment_input_bg" /><label for="name">'. __('Name','chronicle').'*</label>',
		'email' => '<input type="text" name="email" id="mail" class="comment_input_bg" /><label for="mail">'. __('E-Mail','chronicle').'*</label>',
		'website' => '<input type="text" name="website" id="website" class="comment_input_bg" /><label for="website">'. __('Website','chronicle').'</label>',
	);
	function my_fields($fields) { return $fields;	}
	add_filter('comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'=> '<textarea id="comment" name="comment" class="comment_textarea_bg" rows="20" cols="7"></textarea>',		
		'logged_in_as' => '',
		'title_reply_to' => __( 'Leave a Reply to %s','chronicle'),
		'id_submit' => 'comment_submit',
		'label_submit'=>__( 'Post Comment','chronicle'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h4>'.__('Leave a Comment','chronicle').'</h4>',		
		'role_form'=> 'form',		
		);
		comment_form($defaults); ?>		
		
</div>
<?php endif; // If registration required and not logged in ?>