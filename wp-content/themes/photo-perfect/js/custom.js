/**
 * custom.js
 *
 * Custom scripts.
 */

( function( $ ) {

	// Create empty var msnry.
	var msnry;
	jQuery( document ).ready(function($){

		var $masonry_boxes = $( '.masonry-entry' );
		$masonry_boxes.hide();

		var $container = $( '#masonry-loop' );
		$container.imagesLoaded( function(){
			$masonry_boxes.fadeIn( 'slow' );
			$container.masonry({
				itemSelector : '.masonry-entry'
			});
		});

	});

	$( document ).ready(function($){

		// Implment popup for image in masonry
		$( '#masonry-loop' ).photobox('a.popup-link',{
			time:0,
			zoomable:false,
			single: true
		});
		// Implment popup for image in gallery shortcode
		$( 'div.gallery' ).photobox( "a[href$=\'jpg\'],a[href$=\'jpeg\'],a[href$=\'png\'],a[href$=\'bmp\'],a[href$=\'gif\'],a[href$=\'JPG\'],a[href$=\'JPEG\'],a[href$=\'PNG\'],a[href$=\'BMP\'],a[href$=\'GIF\']",{
			zoomable:false
		});
		// Implment popup for images in single page
		$( 'div.entry-content' ).photobox("a[href$=\'jpg\'],a[href$=\'jpeg\'],a[href$=\'png\'],a[href$=\'bmp\'],a[href$=\'gif\'],a[href$=\'JPG\'],a[href$=\'JPEG\'],a[href$=\'PNG\'],a[href$=\'BMP\'],a[href$=\'GIF\']",{
			zoomable:false
		});

		// Implement go to top.
		if ( $( '#btn-scrollup' ).length > 0 ) {

			$( window ).scroll(function(){
				if ($( this ).scrollTop() > 100) {
					$( '#btn-scrollup' ).fadeIn();
				} else {
					$( '#btn-scrollup' ).fadeOut();
				}
			});

			$( '#btn-scrollup' ).click(function(){
				$( "html, body" ).animate( { scrollTop: 0 }, 600 );
				return false;
			});
		}

	});

} )( jQuery );
