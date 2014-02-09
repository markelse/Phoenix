<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Include the main functions
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

// Regenerate a new session id for added security
session_regenerate_id(true);

// Display the page header.
get_page_header();
?>

	<div class="middle">
<?php

// Runs a query to check if user is an admin
include 'inc/reuse/query_user_level.php'; 
if(isLoggedIn() && $row['user_level'] == 5) {
    // Display the admin page
    include 'inc/templates/default/admin/admin.php';
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