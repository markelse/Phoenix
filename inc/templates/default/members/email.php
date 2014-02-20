<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
echo "
    <div class='container'>
	<main class='content'>";
if(!isset($_POST['submit'])) {
// Display the change email form.
  echo "              <form name='register' method='POST' action='#'>
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
                           <td colspan='2'><input name='submit' type='submit' value='Change Email' /></td>
                       </tr>
                    </table>
              </form>";

// If submit has been clicked attempt to make the change
} else {
    
    // Prepare the user data for the registration process
    // This functions runs the user input through stripslashes and mysqli_real_escape_string   
    $username = stripslashes($_SESSION['username']);
    $username = mysqli_real_escape_string($con, $username);
    
    $email   = stripslashes($_POST['email']);
    $email   = mysqli_real_escape_string($con, $email);
    // $email2 does not need mysqli_real_escape_string as it is only used to check again $email.
    // We sanitise with stripslashes just incase someone tries to enter extra info into the form field.
    $email2  = stripslashes($_POST['email2']);
    
    // There is no need to sanitise as we allow special characters in our passwords
    // The password is also salted and hashed before being run through mysql.
    $password   = $_POST['password'];
    
    
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
    if($password == "" || $email == "" || $email2 == "") {
        echo 'Please ensure that all the form fields have been filled out!';
    }  elseif($email !== $email2) {
        echo 'The email address\'s entered do not match! Check your input and try again';
    } elseif($hash != $userData['password']) {
            echo 'The password that you have entered is not correct, you need to input the correct password to change your email address';
    } else {
    
    // If there are no error then go ahead and update the email address.
    $add = mysqli_query($con,"UPDATE users SET email =  '$email' WHERE username = '$username'");
    echo "Your email address has been changed, your new email address is {$email}.";
    mysqli_close($con);
    
    }

} 

echo "</main></div>";