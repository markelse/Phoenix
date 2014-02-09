<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Include the main functions
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

// Display the page header.
get_page_header();
?>

	<div class="middle">
<?php

// Runs a query to check if user is a member
include 'inc/reuse/query_user_level.php'; 
if(isLoggedIn() && $row['user_level'] >= 1) {
    // Display the members page
include 'inc/templates/default/members/memberslist.php';
} else {
    // Echo a little message
    $message = "This is a restricted page, please login to continue.";
    // Display the login form
    include 'inc/templates/default/login.php';
}

// Display the sidebar
get_page_sidebar();
?>	

	</div><!-- .middle-->

<?php
// Display the page footer
get_page_footer();
?>