<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Sets header to error code 404 so search engines and browsers do not cache/index the page
header("HTTP/1.0 404 Not Found");

// Include the main functions
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

// Display the page header.
get_page_header();
?>

	<div class="middle">
<?php
// Display the login form
include 'inc/templates/default/404.php';

// Display the sidebar
get_page_sidebar();
?>	

	</div><!-- .middle-->

<?php
// Display the page footer
get_page_footer();
?>