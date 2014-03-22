<?php
// If submit has been clicked attempt to make the change
if(isset($_POST['change_password'])) {
    // Prepare the user data
    $username = mysqli_real_escape_string($con, $_SESSION['username']);
    
    // There is no need to sanitise as we allow special characters in our passwords
    // The password is also salted and hashed before being run through mysql.
    $password       = $_POST['password'];
    $passwordnew    = $_POST['passwordnew'];
    $passwordnew2   = $_POST['passwordnew2'];
    
    // Create the salt and hash
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    // Checks the hashed $password against what is stored on database
    $query_password = mysqli_query($con, "SELECT password, salt FROM users WHERE username = '$username';");
    $userData = mysqli_fetch_array($query_password, MYSQLI_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    
    // Do some validation checks/error reporting
    if($password == "" || $passwordnew == "" || $passwordnew2 == "") {
        user_message("error message","Error","$msg_empty_fields");
    }  elseif($passwordnew !== $passwordnew2) {
        user_message("error message","Error","$msg_mismatched_password");
    } elseif($hash != $userData['password']) {
        user_message("error message","Error","$msg_invalid_password");
    } elseif(!preg_match('/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/',$_POST['passwordnew']))  {
        user_message("error message","Error","$msg_password_length");
    } else {
        $hash = hash('sha256', $passwordnew);
        $salt = createSalt();
        $hash = hash('sha256', $salt . $hash);
    
        // If there are no error then go ahead and update the email address.
        $add = mysqli_query($con,"UPDATE users SET password = '$hash', salt = '$salt' WHERE username = '$username'");
    
        $site_url = $site_url."login/";
    
        // Logs out the user and destroys the session.
        logout();
    }
} 

echo "<h2>Change Your Password</h2>
            
<p>Here you can change your password, after you have changed your password you will need to re-login, this ensures that any session data is destroyed and a new session is created when you re-login.</p>
        
<p>For your security we require that you type in your current password before your can change to a new password, this helps to prevent any unauthorised changes being made to your account.</p>
        
<p>Your password should contain 1 lower-case, 1 upper-case, 1 numeric and 1 special character. It should ideally be over 8 characters in length. If you want you could use these randomly generated secure passwords:</p>

    <ul>
        <li><strong>{$random_PW}</strong></li>
        <li><strong>{$random_PW2}</strong></li>
        <li><strong>{$random_PW3}</strong></li>
    </ul>
    
<p>For ultimate password security you should use a random password that makes no sense (like the above) and have it saved to a password manager (most browsers have one build it). You should then set a master password on the password manager that is still secure but is easier to remember.</p>

<form name='change_password' method='POST' action='{$site_url}members/change_password/'>
    <table class='plain'>
        <tr>
            <td width='150'>Current Password :</td>
            <td><input class='edit' name='password' type='password' /><td>
        </tr>
        <tr>
            <td width='150'>New Password :</td>
            <td><input class='edit' name='passwordnew' type='password' /><td>
        </tr>
        <tr>
            <td width='150'>Repeat Password :</td>
            <td><input class='edit' name='passwordnew2' type='password' /><td>
        </tr>
        <tr>
            <td colspan='2'><input name='change_password' type='submit' value='Change Password' /></td>
        </tr>
    </table>
</form>";
mysqli_close($con);