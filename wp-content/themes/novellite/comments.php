<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');
if (post_password_required()) {
    ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox" class="post">
    <?php if (have_comments()) : ?>
        <h3 id="comments">
            <?php comments_number('No Responses',
                    'One Response',
                    '% Responses'); ?>
            so far.</h3>
        <ol class="commentlist">
    <?php wp_list_comments(array(
        'avatar_size' => 70)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
        <?php next_comments_link() ?>
            </div>
        </div>
    <?php else : // this is displayed if there are no comments so far ?>
    <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed  ?>
            <!-- If comments are closed. -->
            <p class="nocomments">Comments are closed.</p>
    <?php endif; ?>
<?php endif; ?>	
            <?php if (comments_open()) : ?>
        <div class="commentform_wrapper">
            <div class="post-info">Leave a Comment</div>
            <div id="comment-form">
        <?php comment_form(); ?>
            </div>
        </div>
<?php endif; // if you delete this the sky will fall on your head   ?>
</div>
