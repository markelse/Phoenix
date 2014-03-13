<?php
if(isset($_POST['change_email'])) {
    // Prepare the user data for the registration process
    $username   = mysqli_real_escape_string($con, $_SESSION['username']);
    $email      = mysqli_real_escape_string($con, $_POST['email']);
    $email2     = mysqli_real_escape_string($con, $_POST['email2']);
    
    // There is no need to sanitise as we allow special characters in our passwords
    // The password is also salted and hashed before being run through mysql.
    $password   = $_POST['password'];
    
    // Create the salt and hash
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    // Checks the hashed $password against what is stored on database
    $query_password = mysqli_query($con, "SELECT password, salt FROM users WHERE username = '$username';");
    $userData = mysqli_fetch_array($query_password, MYSQLI_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    
    // Do some validation checks/error reporting
    if($password == "" || $email == "" || $email2 == "") {
        user_message("error message","Error","$msg_empty_fields");
    }  elseif($email !== $email2) {
        user_message("error message","Error","$msg_mismatched_email");
    } elseif($hash != $userData['password']) {
        user_message("error message","Error","$msg_invalid_password");
    } else {
        // If there are no error then go ahead and update the email address.
        $add = mysqli_query($con,"UPDATE users SET email = '$email' WHERE username = '$username'");
        
        user_message("success message","Success","$msg_updated_email");
    }
}
    // Display the change email form.
    echo "
        <h2>Change Your Email</h2>
        
        <p>Here you can change the email address that you used when you registered with our website.</p>
        
        <p>For added security you must input your password in order to be able to change your email.</p>
            
            <form name='change_email' method='POST' action='{$site_url}members/change_email/'>
                <table>
                    <tr>
                        <td width='150'>Password :</td>
                        <td><input name='password' type='password' /><td>
                    </tr>
                    <tr>
                        <td width='150'>New Email:</td>
                        <td><input name='email' type='text' /><td>
                    </tr>
                    <tr>
                        <td width='150'>Repeat Email:</td>
                        <td><input name='email2' type='text' /></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input name='change_email' type='submit' value='Change Email' /></td>
                    </tr>
                </table>
            </form>";
mysqli_close($con);