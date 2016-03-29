<?php 
$wl_theme_options = enigma_parallax_get_options(); ?>
<style>
.logo a, .logo p {
		font-family: <?php echo $wl_theme_options['font_title']; ?> ;
}
.navbar-default .navbar-nav > li > a, .dropdown-menu > li > a{
	font-family: <?php echo $wl_theme_options['header_menu_link']; ?> !important ;
}
.carousel-text h1, .enigma_heading_title h3, .enigma_blog_thumb_wrapper h2 a, .sub-title, .enigma_footer_widget_title, .enigma_sidebar_widget_title h2 {
	font-family: <?php echo $wl_theme_options['theme_title']; ?> ;
}

.head-contact-info li a,
.enigma_blog_thumb_wrapper p, 
.enigma_blog_thumb_date li, 
.enigma_header_breadcrum_title h1, 
.breadcrumb li a, .breadcrumb li, 
.enigma_fuul_blog_detail_padding h2, 
.enigma_fuul_blog_detail_padding p, 
.enigma_comment_form_section h2, 
.enigma_comment_form_section label, 
.enigma_comment_form_section p,
.enigma_comment_form_section a,
.logged_in_as p, .enigma_blog_comment a,
.enigma_blog_post_content p, 
.enigma_comment_title h3, 
.enigma_comment_detail_title, 
.enigma_comment_date, 
.enigma_comment_detail p, 
.reply a, .enigma_blog_read_btn,
.enigma_cotact_form_div p,
 label, .enigma_con_input_control, 
 .enigma_contact_info li .text, 
 .enigma_contact_info li .desc, 
 .enigma_send_button, #enigma_send_button, .enigma_home_portfolio_caption h3 a,
 .enigma_service_detail h3 a, .enigma_service_detail p, 
 .carousel-list li,
.carousel-text .enigma_blog_read_btn,
.pos, .error_404 p,
.long h3, .enigma_testimonial_area p, h3, span,
.enigma_footer_area p,
.enigma_callout_area p, .enigma_callout_area a,
.enigma_footer_widget_column ul li a, .enigma_footer_widget_column .textwidget
.enigma_sidebar_widget_title h2,
.enigma_sidebar_link p a, .enigma_sidebar_widget ul li a
{
	font-family: <?php echo $wl_theme_options['font_description']; ?> ;
}

</style>