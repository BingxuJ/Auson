<?php
 $enable_footer_widget_area = esc_attr(onetone_option('enable_footer_widget_area',''));
?>
<!--Footer-->
		<footer>
        <?php if( $enable_footer_widget_area == '1' ):?>
			<div class="footer-widget-area">
				<div class="container">
					<div class="row">
							<div class="col-md-3 col-md-6">
							<?php
							if(is_active_sidebar("footer_widget_1")){
	                           dynamic_sidebar("footer_widget_1");
                                  	}
							?>
						</div>
						<div class="col-md-3 col-md-6">
				        <?php
							if(is_active_sidebar("footer_widget_2")){
	                           dynamic_sidebar("footer_widget_2");
                                  	}
							?>
						</div>
						<div class="col-md-3 col-md-6">
							<?php
							if(is_active_sidebar("footer_widget_3")){
	                           dynamic_sidebar("footer_widget_3");
                                  	}
							?>
						</div>
                        <div class="col-md-3 col-md-6">
							<?php
							if(is_active_sidebar("footer_widget_4")){
	                           dynamic_sidebar("footer_widget_4");
                                  	}
							?>
						</div>
                        
					</div>
				</div>
			</div>
            <?php endif;?>
			<div class="footer-info-area">
				<div class="container">	
					<div class="site-info">
					  <?php
                      if( is_home() || is_front_page()){
                        printf(__('All right reversed by Auson Holding Pty Ltd','onetone'));
                      }else{
						 printf(__('All right reversed by Auson Holding Pty Ltd','onetone')); 
						  }
                      ?>
                  </br><p class="company-address" style="text-align:left"><i class="fa fa-map-marker"></i> 46 Little Road, Aldinga, SA, Australia, 5173</p> 
                  	   <p class="company-mail" style="text-align:right"><i class="fa fa-envelope-o"></i> <a href="#">ryan@auson.com.au</a></p>
                  	   <p class="company-phone" style="text-align:right"><i class="fa fa-phone"></i> +61 8 8557 8571</p>
              	  </br>
					</div>
				</div>
			</div>			
		</footer>
	</div>

	<!-- Moving background-->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/util.js"></script>
	
	


    <?php wp_footer();?>	
</body>
</html>