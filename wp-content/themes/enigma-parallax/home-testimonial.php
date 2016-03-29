<!-- Testimonial  section -->
<?php $wl_theme_options = enigma_parallax_get_options(); ?>
<div  id="testimonial"></div>	
<div class="enigma_testimonial_area" <?php if($wl_theme_options['slider_home'] != "1" && $wl_theme_options['service_home'] != "1" && $wl_theme_options['portfolio_home'] != "1") { ?> style="padding-top:240px !important; border-top:0px solid !important;" <?php } ?>>
<?php 
if($wl_theme_options['testimonial_title'] !='') { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php echo $wl_theme_options['testimonial_title']; ?></h3>		
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	<div class="container">
		<div class="row " id="enigma_testimonial_section">
		<?php for($i=1 ; $i<=4; $i++) { ?>
		<?php if($wl_theme_options['testimonial_'.$i.'_img'] !='') { ?>
		<div class="col-md-3 enigma_testimonial  pull-left scrollimation scale-in d2">
			<i class="fa fa-quote-left"></i>
			<p><?php echo $wl_theme_options['testimonial_desc_'.$i.'']; ?></p>
			<img src="<?php echo $wl_theme_options['testimonial_'.$i.'_img']; ?>" >
			<h3><?php echo $wl_theme_options['testimonial_name_'.$i.'']; ?></h3>
			<span>( <?php echo $wl_theme_options['testimonial_desti_'.$i.'']; ?> )</span>
		</div>
		<?php } ?>
		<?php } ?>
		</div>
		<div class="row">
			<div id="pager2" class="pager testi-pager"></div>
		</div>
	</div>

</div>
<!-- /Testimonial  section -->