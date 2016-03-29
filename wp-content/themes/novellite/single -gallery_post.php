<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage NovelLite
 * @since NovelLite 1.0
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
    <div class="container">
        <div class="row">
		<div class="col-md-12">
<div class="page_heading_content">
<h1><?php the_title(); ?></h1>
</div>
</div>
</div>
</div>
</div>
<div class="page-container">
     <div class="container">
        <div class="row">
		<div class="col-md-12">
            <div class="page-content">
                 <div class="col-md-9">
                    <div class="content-bar">  
                        <!-- Start the Loop. -->
                        <?php
                        global $post;
                        if (have_posts()) : while (have_posts()) : the_post();
                                ?>
						<!--Start post-->
						 <?php $format = get_post_format($post->ID); ?>	
						 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post single">			
						<h1 class="post_title"><?php the_title(); ?></h1>  
					   <ul class="post_meta">				
						<li class="posted_by"><span></span><?php the_author_posts_link(); ?></li>
						<li class="posted_on"><i class="fa fa-calendar-o"></i><span></span><?php echo get_the_time('M, d, Y') ?></li>   
						<?php if ( is_singular( 'post' ) ) { ?>
						<li class="posted_in"><i class="fa fa-folder-o"></i><span></span><?php the_category(', '); ?></li>
						<?php } ?>
						<li class="post_comment"><i class="fa fa-comments-o"></i><?php comments_popup_link(NO_CMNT, ONE_CMNT, '% ' . CMNT); ?></li>
						<li class="format_sign"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" ><span class="post_format">
					 <?php if ($format == 'video')  { ?>
					 <i class="fa fa-video-camera"></i>
					 <?php } elseif ($format == 'gallery')  { ?>
					 <i class="fa fa-camera"></i>
					 <?php } elseif ($format == 'image')  { ?>
					 <i class="fa fa-picture-o"></i>
					 <?php } elseif ($format == 'quote')  { ?>
					 <i class="fa fa-quote-left"></i>
					 <?php } elseif ($format == 'link')  { ?>
					 <i class="fa fa-link"></i>
					 <?php } else { ?>
					 <i class="fa fa-file-text"></i>
					 
					 <?php } ?>
					 </span></a></li>
						</ul>
					<div class="post_content">
						<?php
						the_content();
						$Video_embed = get_post_meta($post->ID, 'video_url', true);
						echo $Video_embed;
						?>
					</div>
					<div class="clear"></div>
                                </div>
                                </div>
                                <?php
                            endwhile;
                        else:
                            ?>
                            <div class="post">
                                <p>
                                    <?php echo SORRY_NO_POST_MATCHED; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <div class="clear"></div>
                        <nav id="nav-single"> <span class="nav-previous">
                                <?php previous_post_link('&laquo; %link'); ?>
                            </span> <span class="nav-next">
                                <?php next_post_link('%link &raquo;'); ?>
                            </span> </nav>
                        <div class="clear"></div>
                        <?php wp_link_pages(array('before' => '<div class="clear"></div><div class="page-link"><span>' . PAGES_COLON . '</span>', 'after' => '</div>')); ?>
                        <!--Start Comment box-->
                        <?php comments_template(); ?>
                        <!--End Comment box-->
                        <!--End post-->
                    </div>
                </div>
				 <div class="col-md-3">
				<!--Start Sidebar-->
				<?php get_sidebar(); ?>
				<!--End Sidebar-->
				</div> 
            </div>
			</div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>