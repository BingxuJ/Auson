<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('|', true, 'right'); ?></title>	
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		        <?php wp_head(); ?>
		</head>
	<body id="page-top"  <?php body_class('index'); ?>>		
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top <?php if (!is_front_page()) { echo "not_home"; } ?>">
	<div class="header_container">
        <div class="container">		
		<div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
			 <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
            <div class="navbar-header page-scroll">               
				 <?php
              if(get_theme_mod( 'logo_upload')!=''){?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_theme_mod( 'logo_upload')); ?>" alt="logo"></a>
              <?php }else{ ?>
              <h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
              <p><?php bloginfo('description'); ?></p>
              <?php } ?>
				</div>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				</div>
				 
				
				 <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
				<?php if (is_front_page()) { ?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php NovelLitemenu_frontpage_nav() ?>
				</div>
				<?php } else { ?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php NovelLitemenu_nav(); ?>
				</div>
				<?php } ?>
				</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
			</div>
        </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
		</div>
    </nav>
	 <?php if (current_user_can('manage_options')) { ?>
	<style>
	.navbar-default {
	margin-top: 32px;
	}
	</style>
	<?php } ?>