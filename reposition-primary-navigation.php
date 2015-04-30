<?php
//* Do NOT include the opening PHP tag

/** Reposition the Primary navigation at the top of the DOM.
  * @author Calvin Makes
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before', 'genesis_do_nav', 1 );
