<div id="leftcolumn">
<?php
    // Query the database to find out what user level the member is.
    require 'inc/db.inc.php';
    include 'inc/reuse/query_user_level.php';

switch ($user_level) {
    // Displays the members menu
    // case "5" would mean is user_level is equal to 5
    case "5":
        // Display a message upon successfull update.
                        menu_items("Home");
       echo "<ol>
                <li><strong><a href='{$site_url}members/dashboard/' title='Members Dashboard'>Members Dashboard</a></strong></li>
                    <ul>
                        <li class='list'><a href='{$site_url}members/change_email/' title='Change your email address'>Change your email</a></li>
                        <li class='indent'><a href='{$site_url}members/change_password/' title='Change your password'>Change your password</a></li>
                        <li class='indent'><a href='{$site_url}members/memberslist/' title='Members List'>Members</a></li>
                    </ul>
            </ol>
            <ol>
                <li><strong><a href='{$site_url}admin/dashboard/' title='Admin Dashboard'>Admin Dashboard</a></strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}admin/page_add/' title='Add a page'>Add Page</a></li>
                        <li class='indent'><a href='{$site_url}admin/page_view/' title='View pages'>View/Edit Pages</a></li>
                        <li class='indent'><a href='{$site_url}admin/config/' title='Edit Website Config'>Website Config</a></li>
                        <li class='indent'><a href='{$site_url}admin/memberslist/' title='Members List'>Members</a></li>
                    </ul>
            </ol>
            <ol>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}logout.php' title='Logout Of Your Account'>Logout</a></li>
                    </ul>
            </ol>";
                break;
        
    // Displays the members menu
    // case "1" would mean is user_level is equal to 1
    case "1":
                         menu_items("Home");
       echo "<ol>
                <li><strong><a href='{$site_url}members/dashboard/' title='Members Dashboard'>Members Dashboard</a></strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}members/change_email/' title='Change your email address'>Change your email</a></li>
                        <li class='indent'><a href='{$site_url}members/change_password/' title='Change your password'>Change your password</a></li>
                        <li class='indent'><a href='{$site_url}members/memberslist/' title='Members List'>Members</a></li>
                    </ul>
            </ol>
            <ol>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}logout.php' title='Logout Of Your Account'>Logout</a></li>
                    </ul>
            </ol>";
                break;
        
    // If they are not logged in display the guest menu with login and register links.
    default:
                        menu_items("Home");
       echo "<ol>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}login.php' title='Login To Your Account'>Login</a></li>
                        <li class='indent'><a href='{$site_url}register.php' title='Register For An Account'>Register</a></li>
                    </ul>
            </ol>";
} 
?>
    </div>