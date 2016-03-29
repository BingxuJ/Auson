<!-- Slider ======================================= -->
<?php $chronicle_theme_options = chronicle_get_options();?>
<div class="clearfix"></div> 
<!-- Slider -->
<div id="example3" class="slider-pro">
	<div class="sp-slides">
		<?php if($chronicle_theme_options['slide_image_1']!='') { ?>
		
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_1']); ?>" />
			<?php if($chronicle_theme_options['slide_title_1']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_1']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_title_1']); ?>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_1']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_desc_1']); ?> 
			</h3>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($chronicle_theme_options['slide_image_2']!='') { ?>
		
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_2']); ?>" />
			<?php if($chronicle_theme_options['slide_title_2']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_2']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_title_2']); ?>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_2']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_desc_2']); ?> 
			</h3>
			<?php } ?>
		</div>
		<?php } ?><?php if($chronicle_theme_options['slide_image_3']!='') { ?>
		
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_3']); ?>" />
			<?php if($chronicle_theme_options['slide_title_3']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_3']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_title_3']); ?>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_3']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<?php echo esc_attr($chronicle_theme_options['slide_desc_3']); ?> 
			</h3>
			<?php } ?>
		</div>
		</a>
		<?php } ?>
	</div>
</div><!-- Slider --> 
<div class="clearfix"></div>
<div class="feature_section12">
	<div class="container animate" data-anim-type="fadeIn">	
		<?php  
			if($chronicle_theme_options['callout_text']!='') { ?>	
		<h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="200"><?php echo esc_attr($chronicle_theme_options['callout_text']); ?></h1>
		<?php } ?>
		<br /><br />
		<?php if($chronicle_theme_options['button_1_text']!='') { ?>	
		<a href="<?php if($chronicle_theme_options['button_1_link']) { echo esc_url($chronicle_theme_options['button_1_link']); } ?>" class="readmore_but9 animate" data-anim-type="zoomIn" data-anim-delay="750"><?php echo esc_attr($chronicle_theme_options['button_1_text']); ?></a>
		<?php } if($chronicle_theme_options['button_2_text']!='') { ?>	
		<a href="<?php if($chronicle_theme_options['button_2_link']) { echo esc_url($chronicle_theme_options['button_2_link']); } ?>" class="readmore_but9 animate call_btn" data-anim-type="zoomIn" data-anim-delay="800"><?php echo esc_attr($chronicle_theme_options['button_2_text']); ?></a>
		<?php } ?>
	</div>
</div><!-- end features section12 -->

<div class="clearfix"></div>
<div class="feature_section15">
<div class="container">	
	<h1><?php if($chronicle_theme_options['home_service_title']!='') { 
		echo esc_attr($chronicle_theme_options['home_service_title']);
		} if($chronicle_theme_options['home_service_description']!='') {
		echo "<b>".esc_attr($chronicle_theme_options['home_service_description'])."</b>";
	} ?>
    </h1>	
    <div class="clearfix margin_top4"></div>    
    <div class="one_third">    
		<i class="<?php if($chronicle_theme_options['service_1_icons']) { echo esc_attr($chronicle_theme_options['service_1_icons']); } ?> animate" data-anim-type="zoomIn"></i> <strong class="animate" data-anim-type="fadeInRight" data-anim-delay="400"><?php if($chronicle_theme_options['service_1_title']) { echo esc_attr($chronicle_theme_options['service_1_title']); } ?></strong>
        <?php if($chronicle_theme_options['service_1_text']!='') { ?>
		<p><?php echo esc_attr($chronicle_theme_options['service_1_text']); ?></p>
    <?php } ?>
	</div>
	
	<div class="one_third">    
		<i class="<?php if($chronicle_theme_options['service_2_icons']) { echo esc_attr($chronicle_theme_options['service_2_icons']); } ?> animate" data-anim-type="zoomIn"></i>
		<?php if($chronicle_theme_options['service_2_title']) { ?><strong class="animate" data-anim-type="fadeInRight" data-anim-delay="400"><?php  echo esc_attr($chronicle_theme_options['service_2_title']);  ?></strong> <?php } ?>
        <?php if($chronicle_theme_options['service_2_text']!='') { ?>
		<p><?php echo esc_attr($chronicle_theme_options['service_2_text']); ?></p>
    <?php } ?>
	</div>
    
    <div class="one_third last">    
		<i class="<?php if($chronicle_theme_options['service_3_icons']) { echo esc_attr($chronicle_theme_options['service_3_icons']); } ?> animate" data-anim-type="zoomIn"></i> <strong class="animate" data-anim-type="fadeInRight" data-anim-delay="400"><?php if($chronicle_theme_options['service_3_title']) { echo esc_attr($chronicle_theme_options['service_3_title']); } ?></strong>
        <?php if($chronicle_theme_options['service_3_text']!='') { ?>
		<p><?php echo esc_attr($chronicle_theme_options['service_3_text']); ?></p>
    <?php } ?>
	</div>
    
	
</div>
</div><!-- end features section15 -->
<?php 
	if($chronicle_theme_options['portfolio_home']=='on') { ?>
<div class="fresh_works1">
	<div class="container_full">
		<?php 
		if($chronicle_theme_options['port_heading']!='') { ?>
		<h2 class="text"><?php echo esc_attr($chronicle_theme_options['port_heading']); ?></h2>
		<?php } ?>
		<div id="chronicle_portfolio_section">
			<?php for($i=1;$i<=3;$i++){ ?>
			<div class="col-lg-4 col-md-4 pull-left"> 
				<div class="chronicle-img-wrapper">
					<div class="chronicle_home_portfolio_showcase">
						<img class="chronicle_img_responsive" alt="Chronicle" src="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_img']); ?>">
						<div class="chronicle_home_portfolio_showcase_overlay">
							<div class="chronicle_home_portfolio_showcase_overlay_inner ">
								<div class="chronicle_home_portfolio_showcase_icons">
									<a title="Link" href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_link']); ?>"><i class="fa fa-link"></i></a>
									<a href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_img']); ?>"  data-lightbox="image" title="<?php echo esc_attr($chronicle_theme_options['port_'.$i.'_title']); ?>" class="hover_thumb"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="chronicle_home_portfolio_caption">
						<h3><a href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_link']); ?>"><?php echo esc_attr($chronicle_theme_options['port_'.$i.'_title']); ?></a></h3>
					</div>
				</div>
				<div class="chronicle_portfolio_shadow"></div>
			</div>
			<?php } ?>
		</div>	
	</div>
</div><!-- end features section 20 -->
<?php } ?>
<div class="section5" id="blog">
<div class="container animate"  data-anim-type="fadeInUp" data-anim-delay="400">
	<?php
		if($chronicle_theme_options['blog_heading'] !='') { echo "<h2 class='text'>".esc_attr($chronicle_theme_options['blog_heading']). "</h2>"; } ?>
	<?php if ( have_posts()) {
		$i=1;
		$args = array( 'post_type' => 'post','posts_per_page'=>3, 'post__not_in' => get_option( 'sticky_posts' ));		
		$post_type_data = new WP_Query( $args );
		while($post_type_data->have_posts()):
		$post_type_data->the_post(); ?>		
	<div class="one_third <?php if($i==3) { echo "last"; } ?>"> 
		<?php if(has_post_thumbnail()): 						
				$class=array('class'=>'wres chronicle_img_responsive '); 
				the_post_thumbnail('chronicle_home_post_thumb', $class); 
			endif; ?>
        <div class="cont">
			<h4 id="blog_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>		
			<p><?php echo substr(get_the_content(), 0, 150); ?>.</p><br />
			<a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><i class="fa fa-file-text"></i> <?php echo get_the_date('m, D Y'); ?></a> &nbsp; 
			<a href="<?php comments_link(); ?> "><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'one comments', '% comments' ); ?></a>
        </div>	
    </div><!-- end section -->
	<?php  $i++; endwhile; } ?>
</div>
</div><!-- end bolg section -->