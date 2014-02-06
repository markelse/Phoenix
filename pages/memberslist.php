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
// Displays list of members
include 'inc/templates/default/memberslist.php';

// Display the sidebar
get_page_sidebar();
?>	

	</div><!-- .middle-->

<?php
// Display the page footer
get_page_footer();
?>