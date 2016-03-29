jQuery(document).ready(function() {

	/*Documentation link and Upgrade to PRO link */
	if( !jQuery( ".novel-docs" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section novel-docs">');
	}

	if( jQuery( ".novel-docs" ).length ) {

		jQuery('.novel-docs').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://www.themehunk.com/docs/novellite-theme-documentation/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}', NovelLiteCustomizerObject.documentation));

	}
	jQuery('.preview-notice').append('<a class="novel-docs-to-pro-button" href="http://www.themehunk.com/product/novelpro-single-page-theme/" class="button" target="_blank">{pro}</a>'.replace('{pro}',NovelLiteCustomizerObject.pro));

	if ( !jQuery( ".novel-docs" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}


// section sorting
    jQuery( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
    });

    jQuery( "#sortable" ).sortable({
        cursor: 'move',
        opacity: 0.65,
        stop: function ( event, ui){
        var data = jQuery(this).sortable('toArray');
            //  console.log(data); // This should print array of IDs, but returns empty string/array      
            jQuery( this ).parents( '.customize-control').find( 'input[type="hidden"]' ).val( data ).trigger( 'change' );
        }
    });


});