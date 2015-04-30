<?php
//* Do NOT include the opening PHP tag

/** 
  * Reposition the Primary navigation at the top of the DOM.
  * @author Calvin Makes
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before', 'genesis_do_nav', 1 );

/**
  * Add the menu to the .site-header, but hooking right before the genesis_header_markup_close action.
  * @author Calvin Makes (@calvin_makes)
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
add_action( 'genesis_header', 'cm_menu_button', 14 );
function cm_menu_button() {
	
	//* Only add the Menu button if a primary navigation is set. You can switch this for whatever menu you are dealing with
	if ( has_nav_menu( "primary" ) ) {
		echo '<a alt="Toggle Menu" href="#" class="menu-btn right small">' . __( 'Menu', 'CHILD_THEME_TEXT_DOMAIN' ) . '<span class="dashicons dashicons-menu"></span></a>';
	}
}

/** 
  * Add the "Close Navigation" text to the Primary menu output.
  * @author Calvin Makes (@calvin_makes)
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
add_filter( 'genesis_nav_items', 'cm_close_btn', 10, 2 );
add_filter( 'wp_nav_menu_items', 'cm_close_btn', 10, 2 );
function cm_close_btn($menu, $args) {
	$extras = '<a href="#" class="close-btn"><em>' . __( 'Close Navigation', 'CHILD_THEME_TEXT_DOMAIN' ) . '</em> <span class="dashicons dashicons-no"></span></a>';
	
	if ( $args->theme_location == "primary" ) {
		return $extras . $menu;
	} else {
		return $menu;
	}
}

/** 
  * Add the overlay div that will be used for clicking out of the active menu.
  * @author Calvin Makes (@calvin_makes)
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
add_action( 'genesis_before', 'cm_site_overlay', 2 );
function community_site_overlay() {
	echo '<div class="site-overlay"></div>';
}

/** 
  * Include the JavaScript
  * @author Calvin Makes (@calvin_makes)
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
add_action( 'wp_enqueue_scripts', 'cm_load_menu' );
function cm_load_menu() {
  wp_enqueue_script( 'cm-menu', get_stylesheet_directory_uri() . '/js/offcanvas-nav.js', array( 'jquery' ), 1.0 );
}
