<?php 
// code for comment
if ( ! function_exists( 'chronicle_comment' ) ) :
function chronicle_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comment'] = $comment;
	//get theme data
	global $comment_data;

	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','chronicle'); ?>        
        <div class="comment_wrap">
			<div class="gravatar">
            <?php echo get_avatar($comment,$size = '60'); ?>
            </div>
           <div class="comment_content">
			<div class="comment_meta">		   
				<div class="comment_author"><?php comment_author();?></div>				
			</div>
			<div class="comment_text">
			<?php comment_text() ; ?>
			<a href=""><?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</a>
			</div>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>			
			<div id="div2" class="info">
			<div class="message-box-wrap">
			<button class="close-but" id="colosebut2"><?php _e( 'close', 'chronicle' ); ?></button>
			<?php _e( 'Your comment is awaiting moderation.', 'chronicle' ); ?>
			</div>
			</div>
			<br/>
			<?php endif; ?>	
		</div>		
<?php
}
endif;

?>