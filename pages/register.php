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
if(!isLoggedIn()) {
    // Display the registration form
    include 'inc/templates/default/register.php';
} else {
    include 'inc/templates/default/members/members.php';
}
// Display the sidebar
get_page_sidebar();
?>	
</div>

<?php
// Display the page footer
get_page_footer();
?>