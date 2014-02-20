<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Starts a new session
session_start();
if(!isset($_SESSION['regenerate_id'])) {
   $_SESSION['regenerate_id'] = 0;
}

// This function regenerates session id's based on the security level of the page, 
// Members email and password change pages $regenerate_id = 1
// Any admin pages $regenerate_id = 5
function regenerate_session_id($regenerate_id) {
    if($_SESSION['regenerate_id'] !== $regenerate_id) {
        session_regenerate_id (TRUE);
        $_SESSION['regenerate_id'] = $regenerate_id;    
    }
}

// Validates a login session
function validateUser()
{
    global $con;
    $_SESSION['valid'] = 1;
    $_SESSION['username'] = stripslashes($_POST['username']);
        
    echo "You have logged in!";
}

// Include sitewide variable
include 'variables.inc.php';

// Creates a random 3 character sequence, used to add a salt to passwords
function createSalt()
{
    $string = md5(uniqid(rand(), true));
    return substr($string, 0, 3);
}

function get_username() {
    if(isset($_SESSION['username'])) { 
        echo $_SESSION['username']; 
    } else {
        echo 'Guest';
    }
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
   global $site_url;
   
   $_SESSION = array();
    unset($_SESSION['valid']);
    unset($_SESSION['username']);
    unset($_SESSION['regenerate_id']);
    session_destroy();
    header("Location: {$site_url}");
}

function get_page_header() {
    global $site_name,$site_url;
    include 'inc/templates/default/header.php';
}

// Include sitewide error codes
include 'errors.inc.php';

