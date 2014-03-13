<aside class="left-sidebar"><div id='menu'>
<?php
    // Query the database to find out what user level the member is.
    require 'inc/db.inc.php';
    include 'inc/reuse/query_user_level.php';

switch ($user_level) {
    // Displays the members menu
    // case "5" would mean is user_level is equal to 5
    case "5":
        // Display a message upon successfull update.
        echo "
            <ul>
                <li><strong>Site Navigation</strong></li>
                    <ul>";
                        menu_items("Home");
              echo "</ul>
                <li><strong><a href='{$site_url}members/' title='Members Dashboard'>Members Dashboard</a></strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}members/change_email/' title='Change your email address'>Change your email</a></li>
                        <li class='indent'><a href='{$site_url}members/change_password/' title='Change your password'>Change your password</a></li>
                        <li class='indent'><a href='{$site_url}members/memberslist/' title='Members List'>Members</a></li>
                    </ul>
                <li><strong><a href='{$site_url}admin/' title='Admin Dashboard'>Admin Dashboard</a></strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}admin/page_add/' title='Add a page'>Add Page</a></li>
                        <li class='indent'><a href='{$site_url}admin/page_view/' title='View pages'>View/Edit Pages</a></li>
                        <li class='indent'><a href='{$site_url}admin/config/' title='Edit Website Config'>Website Config</a></li>
                        <li class='indent'><a href='{$site_url}admin/memberslist/' title='Members List'>Members</a></li>
                    </ul>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}logout.php' title='Logout Of Your Account'>Logout</a></li>
                    </ul>
            </ul>";
                break;
        
    // Displays the members menu
    // case "1" would mean is user_level is equal to 1
    case "1":
        echo "
            <ul>
                <li><strong>Site Navigation</strong></li>
                    <ul>";
                        menu_items("Home");
              echo "</ul>
                <li><a href='{$site_url}' title='Home'>Home</a></li>
                <li><a href='{$site_url}members/' title='Members Dashboard'>Members Dashboard</a></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}members/change_email/' title='Change your email address'>Change your email</a></li>
                        <li class='indent'><a href='{$site_url}members/change_password/' title='Change your password'>Change your password</a></li>
                        <li class='indent'><a href='{$site_url}members/memberslist/' title='Members List'>Members</a></li>
                    </ul>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}logout.php' title='Logout Of Your Account'>Logout</a></li>
                    </ul>
            </ul>";  
                break;
        
    // If they are not logged in display the guest menu with login and register links.
    default:
        echo "
            <ul>
                <li><strong>Site Navigation</strong></li>
                    <ul>";
                        menu_items("Home");
              echo "</ul>
                <li><strong>Other Pages</strong></li>
                    <ul>
                        <li class='indent'><a href='{$site_url}login.php' title='Login To Your Account'>Login</a></li>
                        <li class='indent'><a href='{$site_url}register.php' title='Register For An Account'>Register</a></li>
                    </ul>
            </ul>";
} 
?>
    </div>
</aside>