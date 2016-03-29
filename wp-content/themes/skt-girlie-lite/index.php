<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Girlie
 */

get_header(); 
?>
<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>   
<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        skt_girlie_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php else: ?>
       <section id="wrapsecond" class="pagewrap2">
            	<div class="container services-wrap">                    
                      <?php for($p=1; $p<5; $p++) { ?>       
        	<?php if( get_theme_mod('page-column'.$p,false)) { ?>          
        		<?php $queryxxx = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); ?>				
						<?php while( $queryxxx->have_posts() ) : $queryxxx->the_post(); ?> 
                        <div class="listpages <?php if($p % 4 == 0) { echo "last_column"; } ?>">                      
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?>                       
						<h4><?php the_title(); ?></h4></a>
						<p><?php the_excerpt(); ?></p>
                         <a class="morelink" href="<?php the_permalink(); ?>"><?php _e('Read More','skt-girlie'); ?></a>
                        </div>
						<?php endwhile;
						wp_reset_query(); ?>
            <?php } else { ?>
					<div class="listpages <?php if($p % 4 == 0) { echo "last_column"; } ?>">                       
                        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/images/about<?php echo $p; ?>.jpg" alt="" />                      
						<h4><?php _e('Page Title','skt-girlie'); ?> <?php echo $p; ?></h4></a>
						<p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque augue eros, posuere a condimentum sit amet, rhoncus eu libero. Maecenas in tincidunt turpis, ut rhoncus neque.','skt-girlie'); ?></p>
                        <a class="morelink" href="#"><?php _e('Read More','skt-girlie'); ?></a>
                        </div>
			<?php }} ?>                     
             
              <div class="clear"></div>
            </div><!-- container -->
       </section><div class="clear"></div>
  
 <section id="FrontBlogPost" class="postwrap3">
  <div class="container">
  <h2 class="section_title"><?php _e('Latest Posts','skt-girlie'); ?></h2>       
     <div class="site-main">         
      <?php
	  $p = 0;
	  $args = array('post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc', 'paged' => get_query_var('paged') );
	  $postquery = new WP_Query( $args );
	  ?>			
        <?php while( $postquery->have_posts() ) : $postquery->the_post(); ?><?php $p++; ?>      
            <div class="blog_lists BlogPosts <?php if( $p%3==0 ){?>last_column<?php } ?>">        
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail(); ?>
                <?php } else {  ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/img_404.png" alt="" />
                <?php } ?>
                </a>
               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="blog-meta"><?php echo get_the_date(); ?> | <?php comments_number(); ?></div>
              <?php echo skt_girlie_content(27); ?>
              <a class="MoreLink" href="<?php the_permalink(); ?>"><?php _e('Read more &raquo;','skt-girlie'); ?></a> 
              <div class="clear"></div>
          </div>       
        <?php endwhile; ?> 
        <?php skt_girlie_pagination(); ?>   
      <div class="clear"></div>
  </div> 
  <?php get_sidebar(); ?>
  <div class="clear"></div>
  </div><!-- .container -->   
 </section><!-- #FrontBlogPost -->  
<?php endif; ?>
<?php get_footer(); ?>