<?php
//* Do NOT include opening PHP tag - Add to your functions.php file

/** Add the overlay div that will be used for clicking out of the active menu
  * @author Calvin Makes
  * @link http://www.calvinmakes.com/add-a-mobile-friendly-off-canvas-menu-in-genesis
*/
add_action( 'genesis_before', 'cm_site_overlay', 2 );
function community_site_overlay() {
	echo '<div class="site-overlay"></div>';
}
