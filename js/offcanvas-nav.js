// @author Calvin Koepke (@cjkoepke)
// @link http://www.calvinkoepke.com/add-a-mobile-friendly-off-canvas-menu-in-genesis/
// @version 1.1
// @license Free to use as you wish. Please share if you appreciate, and link to the post above.

jQuery( document ).ready( function( $ ) {

	// Store our jQuery objects as variables
	var body             = $( 'body' ),
		toggleButtons    = $( '.menu-btn, .close-btn, .site-overlay' );

	toggleButtons.click( function( event ) {
		
		// Prevent the default action of clicking a link
		event.preventDefault();

		// Toggle our main body class depending on whether it is present (false by default)
		body.toggleClass( 'off-canvas-active' );

	});

});