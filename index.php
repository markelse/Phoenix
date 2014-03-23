<?php
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

// Checks to see if the page variables have been set by $_GET
if(isset($_GET['page']) && isset($_GET['sub'])) {
    $page = mysqli_real_escape_string($con, $_GET['page']);
    $sub = mysqli_real_escape_string($con, $_GET['sub']);
}

if(!isset($_GET['page']) && !isset($_GET['sub'])) {
    $page = "Home";
    $sub = $page;
    
    include "inc/templates/{$site_theme}/home.php";

} elseif (!file_exists("inc/templates/{$site_theme}/{$page}.php")) {
    $query_page = mysqli_query($con,"SELECT * FROM pages WHERE title = '$sub' AND category = '$page'");
    $page_sel = mysqli_fetch_array($query_page);

    $page = $page_sel["title"];
    $sub = $page_sel["category"];
    
    include "inc/templates/{$site_theme}/template.php";
    
} else {   
    include "inc/templates/{$site_theme}/{$page}.php";
}