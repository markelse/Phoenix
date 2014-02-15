<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// This displays a message (if set). An example can be found when a guest/member visits an admin page
// If they do they will see the login form along with a restricted page message.
// If no message has been set, nothing will display.

// Display the login form
echo "<div class='container'>
	<main class='content'>
        <p>";

            if(!isset($message)){
                echo "";
            } else {
                echo $message;
            }
           
echo "</p>
               <form name='login' method='POST' action='#'>
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
               </form>   
        ";

// If submit has been clicked attempt to login the user
if(isset($_POST['submit'])) {
    
    // Prepare data for login process
    $username   = stripslashes($_POST['username']);
    $username   = mysqli_real_escape_string($con, $username);
    
    $password   = $_POST['password'];
    
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    $query = "SELECT password, salt FROM users WHERE username = '$username';";
    $result = mysqli_query($con, $query);
    $userData = mysqli_fetch_array($result, MYSQL_ASSOC);
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    
    // Do some validation checks/error reporting
    if($username == "" || $password == "") {
        echo $errFieldsEmpty;
    }  elseif(mysqli_num_rows($result) < 1) {
            echo $errNoUser;
    } elseif($hash != $userData['password']) {
            echo $errWrongPass;
    } else {
            validateUser(); //sets the session data for this user
     }
} 
echo "</main></div>";