
<div class="outer-footer">
<div class="container">
<div class="footer-widget-area">
        <?php
        /* A sidebar in the footer? Yep. You can can customize
         * your footer with four columns of widgets.
         */
        get_sidebar('footer');
        ?>
		</div>
    </div>
	</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php if (get_theme_mod('footertext','') != '') { ?>
		<span class="copyright"><?php echo get_theme_mod('footertext',''); ?></span> 
			<?php } else { ?>
                    <p><a href="<?php echo esc_url('http://www.themehunk.com'); ?>"><?php _e('NovelLite Theme', 'novellite'); ?></a> <?php _e('Powered By ', 'novellite'); ?><a href="http://www.wordpress.org"><?php _e(' WordPress', 'novellite'); ?></a></p>
					<?php } ?>
			                </div>
                    </div>
        </div>
    </footer>
	<?php wp_footer(); ?>
</body>
</html>