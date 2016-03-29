<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php if(!is_home()) the_title(); ?></h1>
				<!-- BreadCrumb -->
                <?php if (function_exists('enigma_parallax_breadcrumbs')) enigma_parallax_breadcrumbs(); ?>
                <!-- BreadCrumb -->
			</div>
		</div>
	</div>	
</div>