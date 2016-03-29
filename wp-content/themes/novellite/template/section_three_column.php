<!-- Services Section -->
  <section id="section1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <?php if (get_theme_mod('col_heading','') != '') { ?>
                        <h2 class="section-heading"><?php echo stripslashes(get_theme_mod('col_heading')); ?></h2>
                        <?php } else { ?>
                            <h2 class="section-heading">Services</h2>
                        <?php } ?>
                        <?php if (get_theme_mod('col_sub','') != '') { ?>
                            <h3 class="section-subheading text-muted"><?php echo stripslashes(get_theme_mod('col_sub','')); ?></h3>
                        <?php } else { ?>
                            <h3 class="section-subheading text-muted">Phasellus elementum odio faucibus diam sollicitudin</h3>
                        <?php } ?>
                </div>
            </div>
            <div class="row text-center servies">
                <div class="col-md-4">
                <a href="<?php if (get_theme_mod('first_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('first_feature_link',''));
                                } ?>">
                   <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa <?php
                        if (get_theme_mod('first_feature_font_icon','') != '') {
                            echo stripslashes(get_theme_mod('first_feature_font_icon',''));
                        } else {
                            ?> fa-microphone <?php } ?> fa-stack-1x fa-inverse"></i>
                    </span></a>
                    <?php if (get_theme_mod('first_feature_heading','') != '') { ?>
                                <a href="<?php
                                if (get_theme_mod('first_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('first_feature_link',''));
                                } ?>"><h4 class="service-heading"><?php echo stripslashes(get_theme_mod('first_feature_heading','')); ?></h4></a>
                               <?php } else { ?>
                                <a href="#"><h4 class="service-heading">E-Commerce</h4></a>
                                 <?php } if (get_theme_mod('first_feature_desc','') != '') { ?>
                                <p class="text-muted"><?php echo stripslashes(get_theme_mod('first_feature_desc','')); ?></p>
                            <?php } else { ?>
                               <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            <?php } ?>
                </div>
                <div class="col-md-4">
                 <a href="<?php  if (get_theme_mod('second_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('second_feature_link',''));
                                } ?>">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa <?php
                                if (get_theme_mod('second_feature_font_icon','') != '') {
                                    echo stripslashes(get_theme_mod('second_feature_font_icon',''));
                                } else {
                                    ?> fa-rocket <?php } ?> fa-stack-1x fa-inverse"></i>
                    </span></a>
                    <?php if (get_theme_mod('second_feature_heading','') != '') { ?>
                                <a href="<?php  if (get_theme_mod('second_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('second_feature_link',''));
                                } ?>"><h4 class="service-heading"><?php echo stripslashes(get_theme_mod('second_feature_heading','')); ?></h4></a>
                               <?php } else { ?>
                                <a href="#"><h4 class="service-heading">Responsive Design</h4></a>
                                 <?php } if (get_theme_mod('second_feature_desc','') != '') { ?>
                                <p class="text-muted"><?php echo stripslashes(get_theme_mod('second_feature_desc','')); ?></p>
                            <?php } else { ?>
                               <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            <?php } ?>
                </div>
                <div class="col-md-4">
                <a href="<?php if (get_theme_mod('third_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('third_feature_link',''));
                } ?>">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa <?php
                                if (get_theme_mod('third_feature_font_icon','') != '') {
                                    echo get_theme_mod('third_feature_font_icon','');
                                } else {
                                    ?>fa-signal <?php } ?> fa-stack-1x fa-inverse"></i>
                    </span></a>
                    <?php if (get_theme_mod('third_feature_heading','') != '') { ?>
                                <a href="<?php if (get_theme_mod('third_feature_link','') != '') {
                                    echo stripslashes(get_theme_mod('third_feature_link',''));
                                } ?>"><h4 class="service-heading"><?php echo stripslashes(get_theme_mod('third_feature_heading','')); ?></h4></a>
                               <?php } else { ?>
                                <a href="#"><h4 class="service-heading">Web Security</h4></a>
                                 <?php } if (get_theme_mod('third_feature_desc','') != '') { ?>
                                <p class="text-muted"><?php echo stripslashes(get_theme_mod('third_feature_desc','')); ?></p>
                            <?php } else { ?>
                               <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                            <?php } ?>
                </div>
            </div>
        </div>
    </section>