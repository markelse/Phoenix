<?php
include "inc/templates/{$site_theme}/header.php";

include "inc/templates/{$site_theme}/l-sidebar.php";


echo "
<div id='content'>";
    

// Query the database to find out what user level the member is.
include 'inc/reuse/query_user_level.php';

switch ($user_level) {
    case "5":
        $page_sub = mysqli_real_escape_string($con, $_GET['sub']);
            switch ($page_sub) { 
                case "{$page_sub}":
                    include "inc/templates/{$site_theme}/@_members/{$page_sub}.php";
                        break;
                 default:
                    include "inc/templates/{$site_theme}/@_members/dashboard.php";
            }                
        break;
    
    default:
        // Echo a little message
        user_message("error message","Error","$msg_restricted_page");
        // Display the login form
        include "inc/templates/{$site_theme}/login.php";
}
echo "</div>";
    
include "inc/templates/{$site_theme}/r-sidebar.php";

include "inc/templates/{$site_theme}/footer.php";