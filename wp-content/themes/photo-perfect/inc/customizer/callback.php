<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Photo_Perfect
 */

if ( ! function_exists( 'photo_perfect_is_logo_active' ) ) :

	/**
	 * Check if logo is active
	 *
	 * @since  Photo Perfect 1.0
	 *
	 * @param  object $control Customizer control object.
	 */
	function photo_perfect_is_logo_active( $control ) {

		if ( $control->manager->get_setting( 'theme_options[site_logo]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;
