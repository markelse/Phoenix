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
    echo "You already have an account, should you want to register another you will first need to log out.";
}
// Display the sidebar
include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
// Display the page footer
include 'inc/templates/default/footer.php';
?>