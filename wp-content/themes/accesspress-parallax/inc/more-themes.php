<?php
/**
 * AccessPress More Themes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add upsell page to the menu.
function accesspress_parallax_add_upsell() {
	add_theme_page(
		__( 'More Themes', 'accesspress-parallax' ),
		__( 'More Themes', 'accesspress-parallax' ),
		'administrator',
		'accesspress_parallax-themes',
		'accesspress_parallax_display_upsell'
	);
}
add_action( 'admin_menu', 'accesspress_parallax_add_upsell', 11 );

// Define markup for the upsell page.
function accesspress_parallax_display_upsell() {
	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>
	<div class="wrap">
	<h1 style="margin-bottom:20px;">
	<img src="<?php echo get_template_directory_uri(); ?>/inc/options-framework/images/accesspressthemes.png"/>
	<?php echo sprintf(__( 'More Themes from <a href="%s" target="_blank">AccessPress Themes</a>', 'accesspress-parallax' ) , esc_url('https://accesspressthemes.com/'))?>
	</h1>

	<div class="theme-browser rendered">
		<div class="themes">
		<?php
		// Set the argument array with author name.
		$args = array(
			'author' => 'access-keys',
		);
		// Set the $request array.
		$request = array(
			'body' => array(
				'action'  => 'query_themes',
				'request' => serialize( (object)$args )
			)
		);
		$themes = accesspress_parallax_get_themes( $request );
		$active_theme = wp_get_theme()->get( 'Name' );
		$counter = 1;
		// For currently active theme.
		foreach ( $themes->themes as $theme ) {
			if( $active_theme == $theme->name ) {?>

				<div id="<?php echo $theme->slug; ?>" class="theme active">
					<div class="theme-screenshot">
						<img src="<?php echo $theme->screenshot_url ?>"/>
					</div>
					<h3 class="theme-name" id="accesspress-parallax-name"><strong><?php _e('Active','accesspress-parallax'); ?></strong>: <?php echo $theme->name; ?></h3>
					<div class="theme-actions">
						<a class="button button-secondary activate" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php _e('Customize','accesspress-parallax'); ?></a>
					</div>
				</div>
			<?php
			$counter++;
			break;
			}
		}

		// For all other themes.
		foreach ( $themes->themes as $theme ) {
			if( $active_theme != $theme->name ) {
				// Set the argument array with author name.
				$args = array(
					'slug' => $theme->slug,
				);
				// Set the $request array.
				$request = array(
					'body' => array(
						'action'  => 'theme_information',
						'request' => serialize( (object)$args )
					)
				);
				$theme_details = accesspress_parallax_get_themes( $request );
			?>
				<div id="<?php echo $theme->slug; ?>" class="theme">
					<div class="theme-screenshot">
						<img src="<?php echo $theme->screenshot_url ?>"/>
					</div>

					<h3 class="theme-name"><?php echo $theme->name; ?></h3>

					<div class="theme-actions">
						<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
							<!-- Show the tick image notifying the theme is already installed. -->
							<img data-toggle="tooltip" title="<?php _e( 'Already installed', 'accesspress-parallax' ); ?>" data-placement="bottom" class="theme-exists" src="<?php echo $directory_uri ?>/inc/options-framework/images/tick.png"/>
							<!-- Activate Button -->
							<a  class="button button-secondary activate"
								href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" ><?php _e('Activate','accesspress-parallax') ?></a>
						<?php }else {
							// Set the install url for the theme.
							$install_url = add_query_arg( array(
									'action' => 'install-theme',
									'theme'  => $theme->slug,
								), self_admin_url( 'update.php' ) );
						?>
							<!-- Install Button -->
							<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-secondary activate" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'accesspress-parallax' ); ?></a>
						<?php } ?>

						<a class="button button-primary load-customize hide-if-no-customize" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'accesspress-parallax' ); ?></a>
					</div>
				</div>
				<?php
			}
		}?>
		</div>
	</div>
	</div>
<?php
}

// Get all themeisle themes by using API.
function accesspress_parallax_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'accesspress_parallax_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}
	return $themes;
}
