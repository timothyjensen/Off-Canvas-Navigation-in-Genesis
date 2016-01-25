<?php
/**
 * Plugin Name:       Genesis Off Canvas Mobile Menu
 * Plugin URI:        http://www.timjensen.us
 * Description:       Add an off-canvas mobile menu for your Genesis child theme.
 * Version:           1.0.0
 * Author:            Tim Jensen
 * Author URI:        http://www.timjensen.us
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       genesis-off-canvas-mobile-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
	* @author Brad Dalton
	* @link http://wpsites.net/web-design/adding-additional-nav-menus-in-genesis/
*/

add_action( 'init', 'register_additional_menu' );
add_action( 'genesis_before', 'add_third_nav_genesis' , 4); 

function register_additional_menu() {
  	register_nav_menu( 'mobile-menu' ,__( 'Mobile Menu' ));
}

function add_third_nav_genesis() {

	wp_nav_menu( array( 
		'theme_location' => 'mobile-menu', 
		'container_class' => 'nav-mobile',
		'container'       => 'nav',
		'menu_class'     => 'genesis-mobile-menu',
		'depth'           => 1
	) ); 
}


/**
	* @author Calvin Koepke (@cjkoepke)
	* @link http://www.calvinkoepke.com/add-a-mobile-friendly-off-canvas-menu-in-genesis/
	* @version 1.1
	* @license Free to use as you wish. Please share if you appreciate, and link to the post above.
*/

//* Add the menu to the .site-header, but hooking right before the genesis_header_markup_close action.
add_action( 'genesis_header', 'ck_menu_button', 14 );
function ck_menu_button() {
	
	//* Make sure mobile-menu is active
	if ( has_nav_menu( "mobile-menu" ) ) {

		echo '<a alt="Toggle Menu" href="#" class="menu-btn right small">' . __( 'Menu', 'CHILD_THEME_TEXT_DOMAIN' ) . '<span class="dashicons dashicons-menu"></span></a>';

	} else {
		echo '<h2 class="menu-btn right small">Set mobile menu location in Menu settings</h2>';
	}
  
}

//* Add the "Close Navigation" text to the Primary menu output.
add_filter( 'genesis_nav_items', 'ck_close_btn', 10, 2 );
add_filter( 'wp_nav_menu_items', 'ck_close_btn', 10, 2 );
function ck_close_btn($menu, $args) {
  
	$extras = '<a href="#" class="close-btn"><em>' . __( 'Close Navigation', 'CHILD_THEME_TEXT_DOMAIN' ) . '</em> <span class="dashicons dashicons-no"></span></a>';

	if ( $args->theme_location == "mobile-menu" ) {

		return $extras . $menu;

	} else {

		return $menu;

	}

}

//* Add the overlay div that will be used for clicking out of the active menu.
add_action( 'genesis_before', 'ck_site_overlay', 2 );
function ck_site_overlay() {
  
	echo '<div class="site-overlay"></div>';

}

//* Include our offcanvas-nav.js file in the theme
add_action( 'wp_enqueue_scripts', 'ck_load_menu' );
function ck_load_menu() {
  
   	wp_enqueue_script( 'ck-menu', plugins_url( '/js/offcanvas-nav.js', __FILE__ ), array( 'jquery' ), 1.0 );
	wp_enqueue_style('ck-menu-style', plugins_url( '/css/offcanvasmenu-style.css', __FILE__ ) );
	wp_enqueue_style( 'dashicons' );
}
