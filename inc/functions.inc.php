<?php
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
function validateUser() {
    global $con;
    $_SESSION['valid'] = 1;
    $_SESSION['username'] = stripslashes($_POST['username']);
        
    echo "You have logged in!";
}

// Include sitewide variable
include 'variables.inc.php';

// Creates a random 3 character sequence, used to add a salt to passwords
function createSalt() {
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
function isLoggedIn() {
    if(isset($_SESSION['valid']) && $_SESSION['valid'])
        return true;
    return false;
}

// Logs out the user and destroys all session data
function logout() {
   global $site_url;
   
   $_SESSION = array();
    unset($_SESSION['valid']);
    unset($_SESSION['username']);
    unset($_SESSION['regenerate_id']);
    unset($_SESSION['p_title']);
    unset($_SESSION['p_excerpt']);
    unset($_SESSION['p_body']);
    unset($_SESSION['p_category']);
    session_destroy();
    header("Location: {$site_url}");
}

function get_page_header() {
    global $site_name,$site_url;
    include 'inc/templates/default/header.php';
}

// Generates a secure random password.
            $random_LC = substr(str_shuffle("abcdefghjkmnpqrstuvwxyz"), 0, 2);
            $random_UC = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 2);
            $random_NC = substr(str_shuffle("2345678923456789"), 0, 4);
            $random_SC = substr(str_shuffle("@#[]{}()&@"), 0, 1);
            $random_SC2 = substr(str_shuffle("@#]})&@"), 0, 1);
            
            $random_PW = substr("$random_SC$random_LC$random_UC$random_NC$random_SC2",0, 10);
            
            $random_LC = substr(str_shuffle("abcdefghjkmnpqrstuvwxyz"), 0, 2);
            $random_UC = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 2);
            $random_NC = substr(str_shuffle("2345678923456789"), 0, 4);
            $random_SC = substr(str_shuffle("@#[]{}()&@"), 0, 1);
            $random_SC2 = substr(str_shuffle("@#]})&@"), 0, 1);
            
            $random_PW2 = substr("$random_SC$random_LC$random_UC$random_NC$random_SC2",0, 10);
            
            $random_LC = substr(str_shuffle("abcdefghjkmnpqrstuvwxyz"), 0, 2);
            $random_UC = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 2);
            $random_NC = substr(str_shuffle("2345678923456789"), 0, 4);
            $random_SC = substr(str_shuffle("@#[]{}()&@"), 0, 1);
            $random_SC2 = substr(str_shuffle("@#]})&@"), 0, 1);
            $random_PW3 = substr("$random_SC$random_LC$random_UC$random_NC$random_SC2",0, 10);
 
 // Creates a notification based on type of message.
 function user_message($msg_type,$msg_title,$msg) {
     echo "
         <div class='{$msg_type}'>
          <h3>{$msg_title}</h3>
          <p>{$msg}</p>
         </div>";
 }
 

// Include sitewide error codes
include 'errors.inc.php';
include 'queries.inc.php';