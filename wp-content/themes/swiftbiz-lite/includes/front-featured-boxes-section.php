<div id="featured-box">
	<!-- container -->
	<div class="container">
		<?php if( is_active_sidebar('Home Featured Sidebar') ) { ?>
		<!-- row-fluid -->
		<ul class="mid-box-wrap row-fluid">
				<?php dynamic_sidebar( 'Home Featured Sidebar' ); ?>
			<div class="clearfix"></div>
		</ul>
		<?php } else { ?>
		<!-- row-fluid -->
		<ul class="mid-box-wrap row-fluid">
            <!-- Featured Box  -->  
			<li class="swiftbiz-container mid-box span4">
				<div class="swiftbiz-iconbox iconbox-top">
					<div class="iconbox-icon ">
						<i class="fa fa-bar-chart"></i>
						<h4><a href="#"><?php _e('Business Strategy', 'swiftbiz-lite'); ?></a></h4>
					</div>
					<ul class="horizontal-style"><li></li><li></li><li></li><li></li></ul>
					<div class="iconbox-content"><?php _e('Lorem ipsum dolor sit amet, consecteture adipiscing elit. Aenean commodo ligua eget dolor. Aenean massa. Cum sociis natoque penati-bus et magnis dis.','swiftbiz-lite') ?></div>
					<div class="clearfix"></div>
				</div>
			</li>

            <!-- Featured Box  -->  
			<li class="swiftbiz-container mid-box span4">
				<div class="swiftbiz-iconbox iconbox-top">
					<div class="iconbox-icon ">
						<i class="fa fa-pencil"></i>
						<h4><a href="#"><?php _e('Quality Products', 'swiftbiz-lite'); ?></a></h4>
					</div>
					<ul class="horizontal-style"><li></li><li></li><li></li><li></li></ul>
					<div class="iconbox-content"><?php _e('Lorem ipsum dolor sit amet, consecteture adipiscing elit. Aenean commodo ligua eget dolor. Aenean massa. Cum sociis natoque penati-bus et magnis dis.','swiftbiz-lite') ?>
					<div class="clearfix"></div>
				</div>
			</li>


            <!-- Featured Box  -->  
			<li class="swiftbiz-container mid-box span4">
				<div class="swiftbiz-iconbox iconbox-top">
					<div class="iconbox-icon ">
						<i class="fa fa-briefcase"></i>
						<h4><a href="#"><?php _e('Best Business Plans', 'swiftbiz-lite'); ?></a></h4>
					</div>
					<ul class="horizontal-style"><li></li><li></li><li></li><li></li></ul>
					<div class="iconbox-content"><?php _e('Lorem ipsum dolor sit amet, consecteture adipiscing elit. Aenean commodo ligua eget dolor. Aenean massa. Cum sociis natoque penati-bus et magnis dis.','swiftbiz-lite') ?>
					<div class="clearfix"></div>
				</div>
			</li>

			<div class="clearfix"></div>
		</ul>
		<?php } ?>
	</div>
	<!-- container -->
</div>