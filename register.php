<?php
require 'inc/functions.inc.php';
require 'inc/db.inc.php';

get_page_header();

if(!isLoggedIn()) {
    // Display the registration form
    echo "
    <div class='container'>
	    <main class='content'>
            <form name='register' method='POST' action='{$site_url}register.php'>
                <table>
                    <tr>
                        <td width='150'>Username [<acronym title='{$msg_username_length}'>?</acronym>]:</td>
                        <td><input name='username' type='text' maxlength='30' /></td>
                    </tr>
                    <tr>
                        <td width='150'>Email:</td>
                        <td><input name='email' type='text' /><td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <p>Your password should contain 1 lower-case, 1 upper-case, 1 numeric and 1 special character. It should ideally be over 6 characters in length. If you want you could use these randomly generated secure passwords:</p>
                                <ul>
                                    <li><strong>{$random_PW}</strong></li>
                                    <li><strong>{$random_PW2}</strong></li>
                                    <li><strong>{$random_PW3}</strong></li>
                                </ul>
                             
                            <p>For ultimate password security you should use a random password that makes no sense (like the above) and have it saved to a password manager (most browsers have one build it). You should then set a master password on the password manager that is still secure but is easier to remember.</p>
                    </tr>
                    <tr>
                        <td width='150'>Password [<acronym title='{$msg_password_length}'>?</acronym>]:</td>
                        <td><input name='password' type='password' /></td>
                    </tr>
                     <tr>
                        <td width='150'>Password Again:</td>
                        <td><input name='password2' type='password' /></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input name='submit' type='submit' value='Register' /></td>
                    </tr>
                </table>
            </form>";

// If submit has been clicked attempt to register the user
if(isset($_POST['submit'])) {
    
    // Prepare the user data for the registration process
    $username   = mysqli_real_escape_string($con, $_POST['username']);
    $email      = mysqli_real_escape_string($con, $_POST['email']);
    
    // Checks that the passwords entered match, contain at least 7 charcters; including upper, lower and special characters.
    // The password is then salted and hashed.
    $password   = $_POST['password'];
    $password2  = $_POST['password2'];
    
    if($password !== $password2) {
        user_message("error message","Error","$msg_mismatched_password");
    } elseif(!preg_match('/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/',$_POST['password']))  {
        user_message("error message","Error","$msg_password_length");
    }
    
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);

    
    // Start some error checking
    if($username == "" || $email == "" || $password == "" || $password2 == "") {
        user_message("error message","Error","$msg_empty_fields");
    } elseif(!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/',$_POST['email']))  {
        user_message("error message","Error","$msg_invalid_email");
    } elseif (strlen($username) > 30) {
        user_message("error message","Error","$msg_username_length");
    } else {
         $query = mysqli_query($con,"SELECT id FROM users WHERE username = '$username'");
         $row = mysqli_num_rows($query); 
         
         if($row == 1) { 
             user_message("error message","Error","$msg_exists_account");
         } else { 
             $add = mysqli_query($con,"INSERT INTO users ( username, email, password, salt ) VALUES ( '$username' , '$email' , '$hash' , '$salt' )");
             
             user_message("success message","Success","$msg_created_account");
        } 
    }
}

echo "</main></div>";

// If logged in
} else {
        user_message("info message","Error","You already have an account, should you want to register another you will first need to log out.");
}

include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
include 'inc/templates/default/footer.php';

mysqli_close($con);