<?php 
	if ( get_theme_mod('bose_main_features_enable' ) && is_home() ) :  
?>	
	    <div id="features-area">
	    <div class="container">
	    	<?php
			  		for ( $i = 1; $i <= 3; $i++ ) :
			  				
			  				$url = esc_url ( get_theme_mod('bose_features_url'.$i) );
				  			$img = esc_url ( get_theme_mod('bose_features_img'.$i) );
				  			$title = get_theme_mod('bose_features_title'.$i);
				  			$desc = get_theme_mod('bose_features_desc'.$i);
			  				
							echo "<div class='col-md-4 col-sm-4 feature'><figure><div><a href='".$url."'><img src='".$img."'><div class='features-caption'><div class='features-caption-title'>".$title."</div><div class='features-caption-desc'>".$desc."</div></div></a></div></figure></div>";  
					endfor;
	           ?>
	     </div>   
		</div><!--.features-->
	    
	<?php 
endif; ?>