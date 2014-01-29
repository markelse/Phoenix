<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Starts a new session
session_start();

// Include sitwide variable
include 'variables.inc.php';

// Creates a random 3 character sequence, used to add a salt to passwords
function createSalt()
{
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}

// Validates a login session
function validateUser()
{
    session_regenerate_id (TRUE);
    $_SESSION['valid'] = 1;
}

// Checks if a user is logged into the site
function isLoggedIn()
{
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

// Logs out the user and destroys all session data
function logout()
{
    $_SESSION = array();
    unset($_SESSION["valid"]);
    session_destroy();
    header("Location: index.php");
}

function get_page_header() {
    include 'inc/templates/default/header.php';
}

function get_page_footer() {
    include 'inc/templates/default/footer.php';
}

function get_page_sidebar() {
    include 'inc/templates/default/sidebar.php'; 
}

function get_site_header() {
    global $site_header;
    echo "<img src='/php/1/inc/templates/default/images/logo-icon.gif' border='0' style='float:left' /> <h1>{$site_header}</h1>";
}

// Include sitewide error codes
include 'errors.inc.php';