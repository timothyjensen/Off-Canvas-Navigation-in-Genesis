<?php
//* Do NOT include the opening PHP tag

//* Reposition the Primary navigation at the top of the DOM.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before', 'genesis_do_nav', 1 );
