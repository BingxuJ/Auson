<!-- Team Section -->
    <section id="section4" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">                  
                    <?php if (get_theme_mod('team_head_','') != '') { ?>
                            <h2 class="section-heading"><?php echo stripslashes(get_theme_mod('team_head_','')); ?></h2>
                        <?php } else { ?>
                            <h2 class="section-heading">Our Amazing Team</h2>
                        <?php } ?>
                        <?php if (get_theme_mod('team_desc_','') != '') { ?>
                            <h3 class="section-subheading text-muted" ><?php echo stripslashes(get_theme_mod('team_desc_','')); ?></h3>
                        <?php } else { ?>
                           <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                        <?php } ?>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                    <?php if (get_theme_mod('our_team_img_first','') != '') { ?>
                    <a href="<?php echo get_theme_mod('our_team_link_first',''); ?>"><img src="<?php echo get_theme_mod('our_team_img_first',''); ?>" class="img-responsive img-circle" alt="Feature Image 1"/></a>
                    <?php } else { ?>
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/team/Team-Placeholder.jpg" class="img-responsive img-circle" alt=""></a>
                    <?php } ?>
                       <?php if (get_theme_mod('our_team_heading_first','') != '') { ?>
                <a href="<?php echo get_theme_mod('our_team_link_first',''); ?>"><h4><?php echo stripslashes(get_theme_mod('our_team_heading_first','')); ?></h4></a>
            <?php } else { ?>
            <a href="#"><h4>Kay Garland</h4></a>
            <?php } ?>
            <?php if (get_theme_mod('our_team_subhead_first','') != '') { ?>
            <p class="text-muted"><?php echo stripslashes(get_theme_mod('our_team_subhead_first','')); ?></p>
            <?php } else { ?>       
            <p class="text-muted">Lead Designer</p>
            <?php } ?>
            <?php if (get_theme_mod('our_team_desc_first','') != '') { ?>
            <p><?php echo stripslashes(get_theme_mod('our_team_desc_first','')); ?></p>
            <?php } else { ?>
            <p> Phasellus elementum odio faucibus diam sollicitudin, in bibendum quam feugiat.</p>
            <?php } ?>  
                            </div>
                </div>
                <div class="col-sm-4">
                <div class="team-member">   
                    <?php if (get_theme_mod('our_team_img_second','') != '') { ?>
                    <a href="<?php echo get_theme_mod('our_team_link_second',''); ?>"><img src="<?php echo get_theme_mod('our_team_img_second',''); ?>" class="img-responsive img-circle" alt="Feature Image 1"/></a>
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/Team-Placeholder.jpg" class="img-responsive img-circle" alt="">
                    <?php } ?>
                       <?php if (get_theme_mod('our_team_heading_second','') != '') { ?>
                <a href="<?php echo get_theme_mod('our_team_link_second',''); ?>"><h4><?php echo stripslashes(get_theme_mod('our_team_heading_second','')); ?></h4></a>
            <?php } else { ?>
            <a href="#"><h4>Larry Parker</h4></a>
            <?php } ?>
            <?php if (get_theme_mod('our_team_subhead_second','') != '') { ?>
            <p class="text-muted"><?php echo stripslashes(get_theme_mod('our_team_subhead_second','')); ?></p>
            <?php } else { ?>       
            <p class="text-muted">Lead Marketer</p>
            <?php } ?>
            <?php if (get_theme_mod('our_team_desc_second','') != '') { ?>
            <p><?php echo stripslashes(get_theme_mod('our_team_desc_second','')); ?></p>
            <?php } else { ?>
            <p> Phasellus elementum odio faucibus diam sollicitudin, in bibendum quam feugiat.</p>
            <?php } ?>  
                            </div>
                </div>
                <div class="col-sm-4">
                <div class="team-member">   
                    <?php if (get_theme_mod('our_team_img_third','') != '') { ?>
                    <a href="<?php echo get_theme_mod('our_team_link_third',''); ?>"><img src="<?php echo get_theme_mod('our_team_img_third',''); ?>" class="img-responsive img-circle" alt="Feature Image 3"/></a>
                    <?php } else { ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/Team-Placeholder.jpg" class="img-responsive img-circle" alt="">
                    <?php } ?>
                       <?php if (get_theme_mod('our_team_heading_third','') != '') { ?>
                <a href="<?php echo get_theme_mod('our_team_link_third',''); ?>"><h4><?php echo stripslashes(get_theme_mod('our_team_heading_third','')); ?></h4></a>
            <?php } else { ?>
            <a href="#"><h4>Diana Pertersen</h4></a>
            <?php } ?>
            <?php if (get_theme_mod('our_team_subhead_third','') != '') { ?>
            <p class="text-muted"><?php echo stripslashes(get_theme_mod('our_team_subhead_third','')); ?></p>
            <?php } else { ?>     
            <p class="text-muted">Lead Developer</p>
            <?php } ?>
            <?php if (get_theme_mod('our_team_desc_third','') != '') { ?>
            <p><?php echo stripslashes(get_theme_mod('our_team_desc_third','')); ?></p>
            <?php } else { ?>
            <p> Phasellus elementum odio faucibus diam sollicitudin, in bibendum quam feugiat.</p>
            <?php } ?>  
                 </div>                   
                </div>
            </div>           
        </div>
    </section>  