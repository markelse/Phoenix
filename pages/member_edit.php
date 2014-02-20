<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Include the main functions
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

regenerate_session_id(1);

// Display the page header.
get_page_header();
?>

	<div class="middle">
<?php
// Query the database to find out what user level the member is.
include 'inc/reuse/query_user_level.php';

/**** Checks to see what user_level the visitor is
 * Normal members have a user_level of 1
 * Admin members have a user_level of 5
 * so case "5" would mean if user_level is equal to 5
******/

switch ($user_level)
    {
        case "5":
            
        // Display the admin members edit page
        include 'inc/templates/default/admin/member_edit.php';
        break;
    
        default:
            
        // Echo a little message
        $message = "This is a restricted page, please login to continue.";
        // Display the login form
        include 'inc/templates/default/login.php';
    }
    
// Display the sidebar
include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
// Display the page footer
include 'inc/templates/default/footer.php';
?>