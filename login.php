<?php
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

get_page_header();
?>
<div class='container'>
    <main class='content'>

<?php
if(isset($_POST['submit'])) {
    // Prepare data for login process
    $username   = mysqli_real_escape_string($con, $_POST['username']);
    $password   = $_POST['password'];
    
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    $query_password = mysqli_query($con, "SELECT password, salt FROM users WHERE username = '$username'");
    $userData = mysqli_fetch_array($query_password, MYSQLI_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    
    // Do some validation checks/error reporting
    if($username == "" || $password == "") {
        user_message("error message","Error","$msg_empty_fields");
    }  elseif(mysqli_num_rows($query_password) < 1) {
        user_message("error message","Error","$msg_invalid_user_password");
    } elseif($hash != $userData['password']) {
        user_message("error message","Error","$msg_invalid_user_password");
    } else {
        validateUser(); //sets the session data for this use
    }          
}
    // If they do they will see the login form along with a restricted page message.
    // If no message has been set, nothing will display.
    if(!isset($message)){
        echo "<p></p>";
    } else {
        echo "<p>{$message}</p>";
    }

    if(!isLoggedIn()) {
    // Display the login form           
    echo "
        <form name='login' method='POST' action='{$site_url}login.php'>
            <table>
                <tr>
                    <td width='150'>Username:</td>
                    <td><input name='username' type='text' maxlength='30' /></td>
                </tr>
                <tr>
                    <td width='150'>Password:</td>
                    <td><input name='password' type='password' /></td>
                </tr>
                <tr>
                    <td colspan='2'><input name='submit' type='submit' value='Login' /></td>
                </tr>
            </table>
        </form>";
    }    
    echo "</main></div>";


include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
include 'inc/templates/default/footer.php';