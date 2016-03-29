<?php
$nameError = '';
$emailError = '';
$commentError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
   } else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $_POST['email'])) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
           $emailTo = get_theme_mod('cf_email_',get_option('admin_email'));
        }
        $subject = $name.'('.$email.')';
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers= "Reply-To: ".$name." <".$email.">";
        mail($emailTo, $subject, $body,$headers);
        $emailSent = true;
    }
}
?>
<!-- blog title -->
<!-- blog title ends -->
<?php if (get_theme_mod('cf_image','') != '') { ?>
<section id="section5" class="contact_section" style="background: url(<?php echo get_theme_mod('cf_image',''); ?>) center repeat fixed;">
<?php } else { ?>
<section id="section5" class="contact_section">
 <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php if (get_theme_mod('cf_head_','') != '') { ?>
                    <h2 class="section-heading"><?php echo get_theme_mod('cf_head_',''); ?></h2>
                    <?php } else { ?>
                    <h2 class="section-heading">Contact Us</h2>
                    <?php } ?>                  
                    <?php if (get_theme_mod('cf_desc_','') != '') { ?>
                    <h3 class="section-subheading text-muted contact"><?php echo get_theme_mod('cf_desc_',''); ?></h3>
                    <?php } else { ?>
                    <h3 class="section-subheading text-muted contact">Lorem ipsum dolor sit amet consectetur.</h3>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <?php if (isset($emailSent) && $emailSent == true) { ?>
            <div class="thanks">
                <h1 style="color:#fff;">Thanks, your email was sent successfully.</h1>
            </div>
                <?php } else { ?>
            <?php if (isset($hasError) || isset($captchaError)) { ?>
                        <p class="error common">Sorry, an error occured. </p>
                    <?php } ?>
                    <form class="contactform animated" id="contactForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="contactName" class="form-control" placeholder="<?php echo CONTACT_NAME; ?>" value="<?php if (isset($_POST['contactName']))
                                    echo $_POST['contactName'];
                                    ?>" class="text required requiredField" required>
                                    <?php if ($nameError != '') { ?>
                                    <span class="error name"> <?php echo $nameError; ?> </span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="<?php echo CONTACT_EMAIL; ?>" value="<?php if (isset($_POST['email']))
                                   echo $_POST['email'];
                               ?>" class="text required requiredField email" required>
                                   <?php if ($emailError != '') { ?>
                                <span class="error email"> <?php echo $emailError; ?> </span>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="subject" placeholder="<?php echo CONTACT_SUBJECT ; ?>" value="<?php if (isset($_POST['subject']))
                       echo $_POST['subject'];
                   ?>" class="text required requiredField email">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group">
                           <textarea class="form-control required requiredField message" name="comments" id="commentsText" required='' placeholder="<?php echo CONTACT_MESSAGE; ?>" ></textarea>
                        <?php if ($commentError != '') { ?>
                        <span class="error comment"> <?php echo $commentError; ?> </span>
                        <?php } ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <input  class="btnSubmit btn-xl btn" type="submit" name="submit" value="<?php echo CONTACT_SUBMIT; ?>"/>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>