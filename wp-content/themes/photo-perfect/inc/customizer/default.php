<?php
/**
 * Default theme options.
 *
 * @package Photo_Perfect
 */

if ( ! function_exists( 'photo_perfect_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since  Photo Perfect 1.0
	 */
	function photo_perfect_get_default_theme_options() {
		$defaults = array();

		// Header.
		$defaults['site_logo']              = '';
		$defaults['show_title']             = true;
		$defaults['show_tagline']           = true;
		$defaults['show_category_dropdown'] = true;

		// Search.
		$defaults['search_placeholder'] = __( 'Search...', 'photo-perfect' );

		// Layout.
		$defaults['site_layout']            = 'fluid';
		$defaults['global_layout']          = 'no-sidebar';
		$defaults['archive_layout']         = 'masonry';
		$defaults['single_image']           = 'large';
		$defaults['single_image_alignment'] = 'center';

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Footer.
		$defaults['copyright_text'] = __( 'Copyright. All rights reserved.', 'photo-perfect' );
		$defaults['go_to_top']      = true;

		// Blog.
		$defaults['excerpt_length'] = 40;
		$defaults['read_more_text'] = __( 'Read More', 'photo-perfect' );

		// Advanced.
		$defaults['custom_css'] = '';

		// Pass through filter.
		$defaults = apply_filters( 'photo_perfect_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
