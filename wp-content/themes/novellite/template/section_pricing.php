<section class="prize-package" <?php if(get_theme_mod('pricing_img_first')!='') { ?>style="background-image: url(<?php echo get_theme_mod('pricing_img_first',''); ?>);" <?php } ?>>
  <div class="container">
    <div class="prize-page">
      <div class="post-title">
                  <?php if (get_theme_mod('pricing_head_') != '') { ?>
                          <h1><?php echo get_theme_mod('pricing_head_'); ?></h1>

                  <?php }else { ?>
                       <h1>Prize and Packages</h1>
                  <?php } ?>
                  <?php if (get_theme_mod('pricing_desc_') != '') { ?>
                          <p><?php echo get_theme_mod('pricing_desc_'); ?></p>

                  <?php }else { ?>
        <p>In posuere consequat purus ut venenatis. Maecenas mattis mattis </p>
                  <?php } ?>
      </div>
      <div class="prize-block">
        <div class="prize-class">
        <ul class="prize-grid">
        <?php 
        $first_li = get_theme_mod('pricing_title_first');
        $second_li = get_theme_mod('pricing_title_second');
        $third_li = get_theme_mod('pricing_title_third');
        if($first_li !='' || $second_li != '' || $third_li != ''):
          ?>
            <!-- First Pricing Table -->
            <?php if ($first_li != '') { ?>
              <li class="prize-post">
                <div class="plan">
                  <div class="header-package">
                    <span class="plan-title"><h3><?php echo $first_li; ?></h3></span>
                    <span class="prize">
                      <?php if (get_theme_mod('pricing_amount_first') != '') { ?>
                    <sup class="sup-up"><?php echo get_theme_mod('pricing_currency_first'); ?></sup> 
                      <?php echo get_theme_mod('pricing_amount_first'); ?> 
                    <?php } ?>
                    <span class="sup-down"> <?php echo get_theme_mod('pricing_wmy_first'); ?> </span></span>
                  </div>
                  <?php 
                    $first_price = array(get_theme_mod('pricing_item1_first'),get_theme_mod('pricing_item2_first'),get_theme_mod('pricing_item3_first'),get_theme_mod('pricing_item4_first'));

                  ?>
                  <ul class="plan-features">
                  <?php foreach($first_price as $value):
                          if($value!=''){
                            echo "<li>".$value."</li>";
                          }
                            endforeach;
                          ?>
                  </ul><!-- plan-features -->
                    <div class="plan-select">
                    <a href="<?php echo get_theme_mod('pricing_signup_link_first'); ?>">
                      <?php echo get_theme_mod('pricing_signup_first'); ?>
                    </a>
                    </div>
                </div><!-- plan -->
              </li><!-- prize-post -->
              <?php } ?>

              <!-- second Pricing Table -->
          <?php if ($second_li != '') { ?>
              <li class="prize-post">
                <div class="plan featured">
                  <div class="header-package">
                    <span class="plan-title"><h3><?php echo $second_li; ?></h3></span>
                    <span class="prize">
                      <?php if (get_theme_mod('pricing_amount_second') != '') { ?>
                    <sup class="sup-up"><?php echo get_theme_mod('pricing_currency_second'); ?></sup> 
                      <?php echo get_theme_mod('pricing_amount_second'); ?> 
                    <?php } ?>
                    <span class="sup-down"> <?php echo get_theme_mod('pricing_wmy_second'); ?> </span></span>
                  </div>
                  <?php 
                    $second_price = array(get_theme_mod('pricing_item1_second'),get_theme_mod('pricing_item2_second'),get_theme_mod('pricing_item3_second'),get_theme_mod('pricing_item4_second'));

                  ?>
                  <ul class="plan-features">
                  <?php foreach($second_price as $value):
                          if($value!=''){
                            echo "<li>".$value."</li>";
                          }
                            endforeach;
                          ?>
                  </ul><!-- plan-features -->
                    <div class="plan-select">
                    <a href="<?php echo get_theme_mod('pricing_signup_link_second'); ?>">
                      <?php echo get_theme_mod('pricing_signup_second'); ?>
                    </a>
                    </div>
                </div><!-- plan -->
              </li><!-- prize-post -->
              <?php } ?>

              <!-- Third Pricing Table -->
          <?php if ($third_li != '') { ?>
              <li class="prize-post">
                <div class="plan">
                  <div class="header-package">
                    <span class="plan-title"><h3><?php echo $third_li; ?></h3></span>
                    <span class="prize">
                      <?php if (get_theme_mod('pricing_amount_third') != '') { ?>
                    <sup class="sup-up"><?php echo get_theme_mod('pricing_currency_third'); ?></sup> 
                      <?php echo get_theme_mod('pricing_amount_third'); ?> 
                    <?php } ?>
                    <span class="sup-down"> <?php echo get_theme_mod('pricing_wmy_third'); ?> </span></span>
                  </div>
                  <?php 
                    $third_price = array(get_theme_mod('pricing_item1_third'),get_theme_mod('pricing_item2_third'),get_theme_mod('pricing_item3_third'),get_theme_mod('pricing_item4_third'));

                  ?>
                  <ul class="plan-features">
                  <?php foreach($third_price as $value):
                          if($value!=''){
                            echo "<li>".$value."</li>";
                          }
                            endforeach;
                          ?>
                  </ul><!-- plan-features -->
                    <div class="plan-select">
                    <a href="<?php echo get_theme_mod('pricing_signup_link_third'); ?>">
                      <?php echo get_theme_mod('pricing_signup_third'); ?>
                    </a>
                    </div>
                </div><!-- plan -->
              </li><!-- prize-post -->
              <?php } ?>

            <?php else: ?>
               <li class="prize-post">
                <div class="plan">
                  <div class="header-package">
                    <span class="plan-title"><h3>Professional</h3></span>
                    <span class="prize"><sup class="sup-up">$</sup> 125 <span class="sup-down">/ mo</span></span>
                  </div>
                  <ul class="plan-features">
                    <li>5GB Linux Web Space</li>
                    <li>5 MySQL Databases</li>
                    <li>Unlimited Email </li>
                    <li>250Gb mo Transfer</li>
                  </ul><!-- plan-features -->
                    <div class="plan-select"><a href="">SignUp</a></div>
                </div><!-- plan -->
              </li><!-- prize-post -->

              <li class="prize-post">
              <div class="plan featured">
              <div class="header-package">
              <span class="plan-title"><h3>Professional</h3></span>
              <span class="prize"><sup class="sup-up">$</sup> 125 <span class="sup-down">/ mo</span></span>
              </div>
              <ul class="plan-features">
              <li>5GB Linux Web Space</li>
              <li>5 MySQL Databases</li>
              <li>Unlimited Email</li>
              <li>Daily Backups</li>
              </ul><!-- plan-features -->
              <div class="plan-select"><a href="">SignUp</a></div>
              </div><!-- plan -->
              </li><!-- prize-post -->
              <li class="prize-post">
              <div class="plan">
              <div class="header-package">
              <span class="plan-title"><h3>Professional</h3></span>
              <span class="prize"><sup class="sup-up">$</sup> 125 <span class="sup-down">/ mo</span></span>
              </div>
              <ul class="plan-features">
              <li>5GB Linux Web Space</li>
              <li>5 MySQL Databases</li>
              <li>Unlimited Email </li>
              <li>24/7 Tech Support</li>
              </ul><!-- plan-features -->
              <div class="plan-select"><a href="">SignUp</a></div>
              </div><!-- plan -->
              </li><!-- prize-post -->
            <?php endif; ?>
          </ul><!-- prize-grid -->
        </div><!--prize-class-->
      </div><!-- prize-block -->
    </div><!-- prize-page -->
  </div><!-- container -->
</section>