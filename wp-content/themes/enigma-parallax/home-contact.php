<div  id="contact"></div>
<?php $wl_theme_options = enigma_parallax_get_options(); ?>
<div class="enigma_contact_area" <?php if($wl_theme_options['slider_home'] != "1" && $wl_theme_options['service_home'] != "1" && $wl_theme_options['portfolio_home'] != "1" && $wl_theme_options['show_testimonial'] != "1" && $wl_theme_options['show_blog'] != "1" && $wl_theme_options['show_team'] != "1") { ?> style="padding-top:204px !important; border-top:0px solid !important;" <?php } ?>>
	<div class="container">
		<div class="row enigma_cotact_form_div">
			<div class="col-md-12">
				<div class="enigma_heading_title">
					<h3><?php echo esc_attr($wl_theme_options['contact_title']); ?></h3>
					<p class="sub-title"><?php echo esc_attr($wl_theme_options['contact_desc']); ?></p>
				</div>
			</div>			
			<div class="enigma_contact_form_fields">
				<div id="weblizar_form"> 
					<form role="form" method="POST"  action="#">	
						<div class="enigma_contact_group col-md-6 scrollimation scale-in">
							<label for="exampleInputEmail1">Name<small>*</small></label>
							<input type="name" name="user_name" id="user_name" placeholder="Name" class="enigma_con_input_control">
							<span id="contact_name_error" style="display:none;color:red;">Fill your name</span>
						</div>
						<div class="enigma_contact_group col-md-6 scrollimation scale-in">
							<label for="exampleInputPassword1">Email<small>*</small></label>
							<input type="email" id="user_email" name="user_email" class="enigma_con_input_control" placeholder="Email">
							<span id="contact_email_error" style="display:none;color:red;"> Fill your email</span>
						</div>
						
						<div class="enigma_form_textarea col-md-12 scrollimation scale-in">
							<label for="exampleInputPassword1">Message<small>*</small></label>
							<textarea class="enigma_con_textarea_control" name="user_message"  rows="10"></textarea>
							<span id="contact_user_massage_error" style="display:none;color:red;">Fill your Text massage</span>
						</div>
						<div class="col-md-12"><button class="enigma_send_button scrollimation scale-in" type="submit" name="query_submit" id="query_submit">Send Message</button></div>
					</form>
				</div>
				<div id="enquiry_send_massage" style="display:none;">
					<div class="callout-box callout-box2 clearfix">
						<div class="callout-content">
							<h2>Query successfully submit</h2>							
						</div>    
					</div>
				</div>
			</div>
			<?php 
				if(isset($_POST['query_submit']))
				{ 	if($_POST['user_name']==''){	
						echo "<script>jQuery('#contact_name_error').show();</script>";
					} else
					if($_POST['user_email']=='') {
						echo "<script>jQuery('#contact_email_error').show();</script>";
					} else
					if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['user_email'])) {								
						echo "<script>jQuery('#contact_email_error').show();</script>";
					} else	
					if($_POST['user_message'] ==''){							
						echo "<script>jQuery('#contact_user_massage_error').show();</script>";
					}
					else
					{	$email = get_option('admin_email');
						$subject = "You have new enquiry  form".get_option("blogname");
						$massage =  stripslashes(trim($_POST['user_message']))."Message sent from  Name:" . trim($_POST['user_name']). "<br>Email :". trim($_POST['user_email']);
						$headers = "From: ".trim($_POST['user_name'])." <".trim($_POST['user_email']).">\r\nReply-To:".trim($_POST['user_email']);							
						$enquerysend =wp_mail( $email, $subject, $massage, $headers);
						
						echo "<script>jQuery('#weblizar_form').hide();</script>";
						echo "<script>jQuery('#enquiry_send_massage').show();</script>";	
					}
				}
			?>
			<div class="enigma_contact_info col-md-12 scrollimation scale-in">
				<ul>
				<?php if($wl_theme_options['contact_number'] !=''){ ?>
					<li class="col-md-3">
						<i class="fa fa-phone"></i><span class="text">
						<span class="desc">Phone Number</span>
						<?php echo $wl_theme_options['contact_number']; ?>
						</span>
					</li>
				<?php } ?>
					<?php if($wl_theme_options['contact_mail'] !=''){ ?>
					<li class="col-md-3">
						<i class="fa fa-envelope"></i><span class="text">
						<span class="desc">Email</span>
						<?php echo $wl_theme_options['contact_mail']; ?>
						</span>
					</li>
					<?php } ?>
					<?php if($wl_theme_options['contact_time'] !=''){ ?>
					<li class="col-md-3">
						<i class="fa fa-clock-o"></i><span class="text">
						<span class="desc">Work Time</span>
						<?php echo $wl_theme_options['contact_time']; ?> 
						</span>
					</li>
					<?php } ?>
					<?php if($wl_theme_options['contact_location'] !=''){ ?>
					<li class="col-md-3">
						<i class="fa fa-map-marker"></i><span class="text">
						<span class="desc">Where We Are</span> 
						<?php echo $wl_theme_options['contact_location']; ?>
						</span>
					</li>
					<?php } ?>
				</ul>
			</div>			
		</div>
	</div> <!-- container div end here -->
	
</div> <!-- contact area div end here -->