<div  id="team"></div>
<?php $wl_theme_options = enigma_parallax_get_options(); ?>
<div class="enigma_team_section" <?php if($wl_theme_options['slider_home'] != "1" && $wl_theme_options['service_home'] != "1" && $wl_theme_options['portfolio_home'] != "1" && $wl_theme_options['show_testimonial'] != "1" && $wl_theme_options['show_blog'] != "1") { ?> style="padding-top:240px !important; border-top:0px solid !important;" <?php } ?>>
<?php if($wl_theme_options['team_title'] !='') { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo $wl_theme_options['team_title']; ?></h3>		
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="container scrollimation scale-in">	
		
		<?php for($i=1; $i<=4; $i++){ ?>
		<?php if($wl_theme_options['team_'.$i.'_img']!=''){ ?>
			<div class="col-md-3 service scrollimation scale-in d2 pull-left in">
				
					<img class="img-circle img-responsive" src="<?php echo esc_url($wl_theme_options['team_'.$i.'_img']); ?>" height="261px" width="276px">
					<?php if($wl_theme_options['team_post_'.$i]!=''){ ?>
					<div class="pos"><?php echo $wl_theme_options['team_post_'.$i]; ?></div>
					<?php } ?>
	
				<div class="caption">
						<div class="long"><h3><?php echo $wl_theme_options['team_name_'.$i]; ?></h3></div>
				
					<div class="team_social">
					<?php if($wl_theme_options['team_fb_'.$i]!=''){ ?>
									<a href="<?php echo esc_url($wl_theme_options['team_fb_'.$i]); ?>"><i class="fa fa-facebook"></i></a>
								<?php } ?>
								<?php if($wl_theme_options['team_twitter_'.$i]!=''){ ?>
									<a href="<?php echo esc_url($wl_theme_options['team_twitter_'.$i]); ?>" ><i class="fa fa-twitter"></i></a>
								<?php } ?>
								<?php if($wl_theme_options['team_linkedin_'.$i]!=''){ ?>
									<a href="<?php echo esc_url($wl_theme_options['team_linkedin_'.$i]); ?>" ><i class="fa fa-linkedin"></i></a>
								<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>			
			<?php } ?>	
			
		</div><!-- row end--->
	</div> <!-- container div end here -->