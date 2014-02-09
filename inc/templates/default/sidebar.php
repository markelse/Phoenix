<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>
<aside class="left-sidebar">
<?php

require 'inc/db.inc.php';

include 'inc/reuse/query_user_level.php';

switch(true)
{
    // If the user is logged in and has a user level equal to 1 then they are a normal member.
    // Let's show them the members menu.
    case (isLoggedIn() && $row['user_level'] == 1):
         echo "
            <p>Site Menu</p>
            
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
                    <li><a href='{$site_url}index.php/memberslist/' title='Members List'>Members</a></li>
                    <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
                </ol>
             ";
                    
    break;
    
    // If the user is logged in and has a user level equal to 5 then they are an admin.
    // Let's show them the admin menu.
    case (isLoggedIn() && $row['user_level'] == 5):
         echo "
            <p>Admin Menu</p>
            
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
                    <li><a href='{$site_url}index.php/admin/' title='Admin Dashboard'>Admin Dashboard</a></li>
                    <li><a href='{$site_url}index.php/memberslist/' title='Members List'>Members</a></li>
                    <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
                </ol>
             ";
                    
    break;

    // If they are not logged in display the guest menu with login and register links.
    default:

    echo "
            <p>Site Menu</p>
            
                <ol>
                    <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
                    <li><a href='{$site_url}index.php/login/' title='Login To Your Account'>Login</a></li>
                    <li><a href='{$site_url}index.php/register/' title='Register For An Account'>Register</a></li>
                </ol>
             ";
                    
    break;
}


?>
</aside>