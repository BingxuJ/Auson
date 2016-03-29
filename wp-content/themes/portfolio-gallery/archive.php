<?php 
/*The template for displaying Archive pages*/
global $wdwt_front;  
get_header(); 

$grab_image= $wdwt_front->get_param('grab_image');
$blog_style= $wdwt_front->blog_style();
?>
<div class="right_container">
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
  <aside id="sidebar1">
    <div class="sidebar-container">
      <?php
      dynamic_sidebar( 'sidebar-1' );
      ?>	
  	  <div class="clear"></div>
    </div>
  </aside>
<?php }?>

<div id="content" class="blog archive-page">

<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; ?>
		
	<?php  if (is_category()) { ?>
	<h2 class="styledHeading"><?php _e('Archive For The ', "portfolio-gallery"); ?>&ldquo;<?php single_cat_title(); ?>&rdquo; <?php _e('Category', "portfolio-gallery"); ?></h2>
		<?php  } elseif( is_tag() ) { ?>
	<h2 class="styledHeading"><?php _e('Posts Tagged ', "portfolio-gallery"); ?>&ldquo;<?php single_tag_title(); ?>&rdquo;</h2>
	<?php  } elseif (is_day()) { ?>
	<h2 class="styledHeading"><?php _e('Archive For ', "portfolio-gallery"); ?><?php the_time(get_option( 'date_format' )); ?></h2>
	<?php  } elseif (is_month()) { ?>
	<h2 class="styledHeading"><?php _e('Archive For ', "portfolio-gallery"); ?><?php the_time(get_option( 'date_format' )); ?></h2>
	<?php  } elseif (is_year()) { ?>
	<h2 class="styledHeading"><?php _e('Archive For ', "portfolio-gallery"); ?><?php the_time(get_option( 'date_format' )); ?></h2>
	<?php  } elseif (is_author()) { ?>
	<h2 class="styledHeading"><?php _e('Author Archive', "portfolio-gallery"); ?></h2>
	<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h2 class="styledHeading"><?php _e('Blog Archives', "portfolio-gallery"); ?></h2>
	<?php } ?>
			
	<?php while (have_posts()) : the_post(); ?>
			
	  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		  <div class="post">
				<h3 class="archive-header"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			</div>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark">
			<?php
					if(has_post_thumbnail() || (Portfolio_gallery_frontend_functions::post_image_url() && $blog_style && $grab_image)){
					?>
						<div class="img_container fixed size180x150">
							<?php echo Portfolio_gallery_frontend_functions::fixed_thumbnail(180,150, $grab_image); ?>
						</div>
					<?php
					} ?>
			</a>
			<div class="clear"></div>
			<?php
			if($wdwt_front->blog_style()){
				the_excerpt();
			}
			else{
				the_content();
			}
			if($wdwt_front->get_param('date_enable')){ ?>
			  <div class="entry-meta">
					  <?php Portfolio_gallery_frontend_functions::posted_on_single(); ?>
				</div>
			 <?php Portfolio_gallery_frontend_functions::entry_meta(); 
			} ?>   
		</div>
        
		<?php endwhile;		?>
	  <div class="page-navigation">
	    <?php posts_nav_link(); ?>
    </div>
	<?php else : ?>

		<h3 class="archive-header"><?php _e('Not Found', "portfolio-gallery"); ?></h3>
		<p><?php _e('There are not posts belonging to this category or tag. Try searching below:', "portfolio-gallery"); ?></p>
		<div id="search-block-category"><?php get_search_form(); ?></div>
	
	<?php endif; ?>
	
	 <?php
	$wdwt_front->bottom_advertisment(); 
	
	wp_reset_query();
	  ?>
	</div>
		 <?php
  if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
    <aside id="sidebar2">
        <div class="sidebar-container">
          <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
		  <div class="clear"></div>
        </div>
    </aside>
    <?php
    } ?>
  <div class="clear"></div>
  <?php $wdwt_front->footer_text(); ?>
</div>
<?php get_footer(); ?>
