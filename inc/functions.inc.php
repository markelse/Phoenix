<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Starts a new session
session_start();

// Include sitewide variable
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
    global $con;
    
    session_regenerate_id (TRUE);
    $_SESSION['valid'] = 1;
    $_SESSION['username'] = stripslashes($_POST['username']);
    
    include 'inc/reuse/query_user_level.php'; 

         if($row['user_level'] == 5) 
         { 
            header('Location: ../admin/');
            
         } else { 
             
            header('Location: ../members/');

            } 
    
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
    session_destroy();
    header("Location: {$site_url}");
}

function get_page_header() {
    global $site_name;
    include 'inc/templates/default/header.php';
}

function get_page_footer() {
    include 'inc/templates/default/footer.php';
}

function get_page_sidebar() {
    global $site_url;
    include 'inc/templates/default/sidebar.php'; 
}

function get_site_header() {
    global $site_name;
    echo "<img src='/php/1/inc/templates/default/images/logo-icon.gif' border='0' style='float:left' /> <h1>{$site_name}</h1>";
}

// Include sitewide error codes
include 'errors.inc.php';

