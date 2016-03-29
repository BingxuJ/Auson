<?php  $chronicle_theme_options = chronicle_get_options(); ?>
<style>

#trueHeader #logo, .navbar-default .navbar-nav li a, 
.slider-pro a h3.sp-layer, .feature_section12 h1, 
.feature_section15 h1, .footer1 h4.lmb, h2.text{
	font-family : <?php echo $chronicle_theme_options['title_font']; ?>;
}
.feature_section15 p, .feature_section15 h1 b, .slider-pro h3.sp-layer, 
.cont p, .cont a, .right_links li.link, .siteinfo p, .qlinks li a, 
.content_left p, h4.coment, .textwidget, .one_half, .post_meta_links li, 
#wblizar_nav span, .comment_author, .comment-reply-link, .comment-respond h4, 
.blog_post h3 a, h3.comment-reply-title{
	font-family : <?php echo $chronicle_theme_options['desc_font']; ?>;
}
.readmore_but9, input#comment_submit{
	font-family : <?php echo $chronicle_theme_options['btn_font']; ?>;
}
.feature_section15 strong, .chronicle_home_portfolio_caption h3 a, #blog_title a, .title h1, ul.breadcrumb li{
	font-family : <?php echo $chronicle_theme_options['heading_title_font']; ?>;
}
.sidebar_title h4{
	font-family : <?php echo $chronicle_theme_options['sidebar_title_font']; ?>;	
}
.sidebar_widget{
	font-family : <?php echo $chronicle_theme_options['sidebar_desc_font']; ?>;	
}

</style>