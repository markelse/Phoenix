<?php
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

// Uses $_GET to set which page should be displayed.
if(isset($_GET['page']) && isset($_GET['sub'])) {
    $page = mysqli_real_escape_string($con, $_GET['page']);
    $sub = mysqli_real_escape_string($con, $_GET['sub']);
} else {
    // If $_GET is not set then it must be the homepage.
    $page = "home";
    $sub = $page;
}

// Run the query and create an array named $page2[]
$query_page = mysqli_query($con,"SELECT * FROM pages WHERE title = '$sub' AND category = '$page'");
$page_sel = mysqli_fetch_array($query_page);

// Give the array rows easy to remember variable names.
$page_title         = $page_sel["title"];
$page_excerpt       = $page_sel["excerpt"];
$page_body          = $page_sel["body"];
$page_category      = $page_sel["category"];

//$query_config = mysqli_query($con,"SELECT * FROM config");
//$config = mysqli_fetch_array($query_config, MYSQLI_ASSOC);

// Checks to see if the file being refferenced by $_GET actually exists
// If it does not we want to show the homepage (or error page) instead.
if (!file_exists("inc/templates/{$site_theme}/{$page}.php")) {
    $page = "error";
    $sub = $page;
}
    
// If all is good this will return the template file.
include "inc/templates/{$site_theme}/{$page}.php";