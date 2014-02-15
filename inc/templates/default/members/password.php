<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
        
// Display the change email form.
echo "
    <div class='container'>
	<main class='content'>
        <p>Here you can change your password, once your password has been changed you will be logged out and will need to 
        re-login with your new password.</p>
        
        <p>For your security we require that you type in your current password before your can change to a new password.</p>
        
        <p>{$errPWLength}</p>
                <form name='register' method='POST' action='#'>
                    <table>
                       <tr>
                           <td width='250'>Current Password :</td>
                           <td><input name='password' type='password' /><td>
                       </tr>
                       <tr>
                           <td width='250'>New Password :</td>
                           <td><input name='passwordnew' type='password' /><td>
                       </tr>
                       <tr>
                           <td width='250'>New Password (Again to avoid typos) :</td>
                           <td><input name='passwordnew2' type='password' /><td>
                       </tr>
                       <tr>
                           <td colspan='2'><input name='submit' type='submit' value='Change Password' /></td>
                       </tr>
                    </table>
              </form>";

// If submit has been clicked attempt to make the change
if(isset($_POST['submit'])) {
    
    // Prepare the user data for the registration process
    // This functions runs the user input through stripslashes and mysqli_real_escape_string   
    $username = stripslashes($_SESSION['username']);
    $username = mysqli_real_escape_string($con, $username);
    
    // There is no need to sanitise as we allow special characters in our passwords
    // The password is also salted and hashed before being run through mysql.
    $password = $_POST['password'];
    $passwordnew = $_POST['passwordnew'];
    $passwordnew2 = $_POST['passwordnew2'];
    
    // Create the salt and hash
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    // Checks the hashed $password against what is stored on database
    $query = "SELECT password, salt FROM users WHERE username = '$username';";
    $result = mysqli_query($con, $query);
    $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    
    // Do some validation checks/error reporting
    if($password == "" || $passwordnew == "" || $passwordnew2 == "") {
        echo 'Please ensure that all the form fields have been filled out!';
    }  elseif($passwordnew !== $passwordnew2) {
        echo 'The email passwords entered do not match! Check your input and try again';
    } elseif($hash != $userData['password']) {
            echo 'The password that you have entered is not correct, you need to input the correct password to change your email address';
    } elseif(!preg_match('/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/',$_POST['passwordnew']))  {
        echo $errPWLength;
   } else {
    
    $hash = hash('sha256', $passwordnew);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    // If there are no error then go ahead and update the email address.
    $add = mysqli_query($con,"UPDATE  `phoenix`.`users` SET  `password` = '$hash', `salt` =  '$salt' WHERE `username` = '$username'");
    mysqli_close($con);
    
    $site_url = $site_url."index.php/login/";
    $message = "Your password was successfully changed, please re-login.";
    // Logs out the user and destroys the session.
    logout();
    
    }

} 

echo "</main></div>";