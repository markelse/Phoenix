<?php
get_page_header();
?>

<div class="middle">
<?php
    // Query the database to find out what user level the member is.
    include 'inc/reuse/query_user_level.php';

    switch ($user_level)
        {
            case "1":
            case "5":
                echo "
                <div class='container'>
                    <main class='content'>";
                
                        $page_sub = filter_input(INPUT_GET, 'sub', FILTER_SANITIZE_STRING);
                        switch ($page_sub) {
                            case "change_email":
                                include 'inc/templates/default/@_members/change_email.php';
                                   break;
                    
                            case "change_password":
                                include 'inc/templates/default/@_members/change_password.php';
                                    break;
                    
                            case "memberslist":
                                include 'inc/templates/default/@_members/memberslist.php';
                                    break;
                    
                            default :
                                include 'inc/templates/default/@_members/dashboard.php';
                        } 
                
                echo "</main>
          </div>";
                break;
    
            default:
                // Echo a little message
                user_message("error message","Error","$msg_restricted_page");
                // Display the login form
                include 'inc/templates/default/login.php';
        }

include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
include 'inc/templates/default/footer.php';