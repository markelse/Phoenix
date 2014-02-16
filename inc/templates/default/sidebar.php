<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<aside class="left-sidebar">
    <h3>Site Menu</h3>
<?php
// Since this is a stand-alone template file we need to call the db connection info
require 'inc/db.inc.php';

// Query the database to find out what user level the member is.
include 'inc/reuse/query_user_level.php';

/**** Checks to see what user_level the visitor is
 *  Remember
 * Logged out, non-registered members do not have a user_level
 * Normal members have a user_level of 1
 * Admin members have a user_level of 5
 * so case "5" would mean if user_level is equal to 5
******/
switch ($user_level)
    {
        // Displays the members menu
        // case "5" would mean is user_level is equal to 5
        case "5":
            echo "
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
                        <ul>
                        <li><a href='{$site_url}index.php/members_email/' title='Change your email address'>Change your email</a></li>
                        <li><a href='{$site_url}index.php/members_password/' title='Change your password'>Change your password</a></li>
                        </ul>
                    <li><a href='{$site_url}index.php/admin/' title='Admin Dashboard'>Admin Dashboard</a></li>
                        <ul>
                        <li><a href='{$site_url}index.php/admin_config/' title='Edit Website Config'>Website Config</li>
                        </ul>
                    <li><a href='{$site_url}index.php/memberslist/' title='Members List'>Members</a></li>
                    <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
                </ol>
             ";
            break;
        
        // Displays the members menu
        // case "1" would mean is user_level is equal to 1
        case "1":
            echo "
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
                        <ul>
                        <li><a href='{$site_url}index.php/members_email/' title='Change your email address'>Change your email</a></li>
                        <li><a href='{$site_url}index.php/members_password/' title='Change your password'>Change your password</a></li>
                        </ul>
                    <li><a href='{$site_url}index.php/memberslist/' title='Members List'>Members</a></li>
                    <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
                </ol>
             ";  
            break;
        
        // If they are not logged in display the guest menu with login and register links.
        default:
        echo "
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/login/' title='Login To Your Account'>Login</a></li>
                    <li><a href='{$site_url}index.php/register/' title='Register For An Account'>Register</a></li>
                </ol>
             ";
    } 


?>
</aside>