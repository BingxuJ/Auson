<div id="slides_full" class="NovelLite_slider"> 
<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('NovelLite_slider_speed','') != '') { echo stripslashes(get_theme_mod('NovelLite_slider_speed')); } else { ?>3000<?php } ?>"/>
    <ul class="slides-container">
        <li>
            <?php if (get_theme_mod('first_slider_image','') != '') { ?>
                <a href="<?php
                if (get_theme_mod('first_slider_link','') != '') {
                    echo get_theme_mod('first_slider_link');
                }
                ?>" >
                    <img  src="<?php echo get_theme_mod('first_slider_image'); ?>" alt="Slide Image 1"/></a>
            <?php } else { ?>
                <img  src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" alt="Slide Image 1"/>
            <?php } ?>
            <div class="slider_overlay"></div>
            <div class="container container_caption">
                <?php if (get_theme_mod('first_slider_heading','') != '') { ?>
                    <h1><a href="<?php
                        if (get_theme_mod('first_slider_link','') != '') {
                            echo get_theme_mod('first_slider_link');
                        }
                        ?>"><?php echo get_theme_mod('first_slider_heading'); ?></a></h1>
                    <?php } else { ?>
                    <h1>Business Theme</h1>
                <?php } ?> 
                <div class="clearfix"></div>
                <?php if (get_theme_mod('first_slider_desc') != '') { ?>
                    <p>                    
                        <?php echo get_theme_mod('first_slider_desc'); ?>
                    </p>
                <?php } else { ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br/>Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                <?php } ?>
                
                
                <div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('first_button_text','') != '') { ?>
                <a href="<?php
                                if (get_theme_mod('first_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('first_button_link'));
                                } else {
                                    echo "#";
                                }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('first_button_text')); ?>
                
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>  
            </div>
        </li>
        <?php if (get_theme_mod('second_slider_image','') != '') { ?>
            <li>
                <?php if (get_theme_mod('second_slider_image','') != '') { ?>
                    <a href="<?php
                    if (get_theme_mod('second_slider_link','') != '') {
                        echo get_theme_mod('second_slider_link');
                    }
                    ?>" >
                        <img  src="<?php echo get_theme_mod('second_slider_image'); ?>" alt="Slide Image 2"/></a>
                <?php } else { ?>
                <?php } ?>
                <div class="slider_overlay"></div>
                <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                    <div class="container container_caption">
                        <?php if (get_theme_mod('second_slider_heading','') != '') { ?>
                            <h1><a href="<?php
                                if (get_theme_mod('second_slider_link','') != '') {
                                    echo get_theme_mod('second_slider_link');
                                }
                                ?>"><?php echo stripslashes(get_theme_mod('second_slider_heading')); ?></a></h1>
                                <div class="clearfix"></div>
                                <?php
                            } else {
                                
                            }
                            ?>
                            <?php if (get_theme_mod('second_slider_desc','') != '') { ?>
                            <p>                    
                                <?php echo stripslashes(get_theme_mod('second_slider_desc')); ?>
                            </p>
                            <?php
                        } else {
                            
                        }
                        ?>  
<div class="clearfix"></div>
                <div class="main-slider-button">
            <?php if (get_theme_mod('second_button_text','') != '') { ?>
                <a href="<?php
                                if (get_theme_mod('second_button_link','') != '') {
                                    echo stripslashes(get_theme_mod('second_button_link'));
                                } else {
                                    echo "#";
                                }
                                ?>" class="theme-slider-button">
                <?php echo stripslashes(get_theme_mod('second_button_text')); ?>
                
                </a>
                <?php } else { ?>
                <a href="#" class="theme-slider-button">Buy Now!</a>
                <?php } ?>
                </div>
 </div>
                <?php } ?>
                <div class="slider_overlay"></div>
            </li>
        <?php } ?>
    </ul>
    <nav class="slides-navigation">
        <a href="#" class="next">Next</a>
        <a href="#" class="prev">Previous</a>
    </nav>
</div>