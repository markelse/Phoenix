<?php
get_page_header();
?>

<div class="middle">
    
<?php
// Query the database to find out what user level the member is.
include 'inc/reuse/query_user_level.php';

switch ($user_level) {
    case "5":
        echo "
            <div class='container'>
                <main class='content'>";
                
                    $page_sub = mysqli_real_escape_string($con, $_GET['sub']);
                
                    switch ($page_sub) { 
                        case "{$page_sub}":
                            include "inc/templates/default/@_admin/{$page_sub}.php";
                                break;
                        default:
                            include 'inc/templates/default/@_admin/dashboard.php';
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