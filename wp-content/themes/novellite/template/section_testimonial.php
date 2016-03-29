
    <!-- *** Testimonial Slider Starts *** -->
<?php if (get_theme_mod('testimonial_parallax_image','') != '') { ?>
<section class="testimonial-wrapper" id="section2" data-type="background" style="background: url(<?php echo get_theme_mod('testimonial_parallax_image',''); ?>) center repeat fixed;">
<?php } else { ?>
 <section class="testimonial-wrapper" id="section2">
 <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-inner animated bottom-to-top">
                <?php if (get_theme_mod('testimonial_heading','') != '') { ?>
                    <h1 class="testimonial-header"><?php echo get_theme_mod('testimonial_heading',''); ?></h1>
                    <?php } else { ?>
                    <h1 class="testimonial-header">Show Multiple Testimonials.</h1>
                    <?php } ?>
                    <ul class="bxslider">
                    <!-- *Testimonial 1 Starts* -->
                    <?php if (get_theme_mod('first_author_desc','') != '') { ?>
                        <li>
                            <img src="<?php if (get_theme_mod('first_author_image','') != '') { ?><?php echo get_theme_mod('first_author_image',''); } else { echo get_template_directory_uri(); ?>/images/testimonial-image.png<?php } ?>" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>
                            <?php echo get_theme_mod('first_author_desc',''); ?>    
                            <p><a class='testimonial'><?php echo get_theme_mod('first_author_name','') ; ?></a></p>">
                        </li>
                    <?php } else { ?>
                    
                    <?php } ?>
                    <!-- *Testimonial 1 Ends* -->

                    <!-- *Testimonial 2 Starts* -->
                    <?php if (get_theme_mod('second_author_desc','') != '') { ?>
                        <li>
                            <img src="<?php if (get_theme_mod('second_author_image','') != '') { ?><?php echo get_theme_mod('second_author_image',''); } else { echo get_template_directory_uri(); ?>/images/testimonial-image.png <?php } ?>" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>
                            <?php echo get_theme_mod('second_author_desc',''); ?>
                            <p><a class='testimonial'><?php echo get_theme_mod('second_author_name',''); ?></a></p>">
                        </li>
                    <?php } else { ?>
                    <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/testimonial-image.png" onMouseOver="javascript: this.title='';" title="<a class='arrow'></a>NovelLite comes with amazing business features. It is perfect for a business website with required features.<p><a class='testimonial'>NovelLite</a></p>">
                    </li>
                    <?php } ?>
                    <!-- *Testimonial 2 Ends* -->                   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>