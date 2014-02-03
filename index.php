<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// This file controls which page has been clicked on and dynamically displays the selected page.

// This is the default page that is shown, it should ideally display your homepage.
// $page = "home"; would display /pages/home.php
$page = "home";
$page_dir = "pages";

// Checks to see if $_GET['page'] has been set.
if(isset($_GET['page'])) {
    
    // Defines $page to $_GET
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    
    // basename() prevents visitors from changing directorys
    // this means that only pages in $page_dir can be viewed
    $page = basename($page);
    
    // Checks to see if the file being refferenced by $_GET actually exists
    // If it does not we want to show the homepage (or error page) instead.
    if (!file_exists("{$page_dir}/{$page}.php")) {
        
        // Set which page should be displayed if the chosen page does not exists
        // If user tries to access anything outside of $page_dir or tries to access a
        // file that does not exists an error page will be shown.
        // $page = "error"; refers to pages/error.php
        $page = "error";
    }
} 
    
    // Include the file that will be viewed in the visitors browser.
    include("{$page_dir}/{$page}.php");