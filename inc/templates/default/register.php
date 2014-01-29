<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Display the registration form
echo "
    <div class='container'>
	<main class='content'>
                <form name='register' method='POST' action='#'>
                    <table>
                        <tr>
                           <td width='150'>Username [<acronym title='{$errUserLengthACC}'>?</acronym>]:</td>
                           <td><input name='username' type='text' maxlength='30' /></td>
                       </tr>
                       <tr>
                           <td width='150'>Email:</td>
                           <td><input name='email' type='text' /><td>
                       </tr>
                       <tr>
                           <td width='150'>Password [<acronym title='{$errPWLengthACC}'>?</acronym>]:</td>
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
    $username   = $_POST['username'];
    $username   = stripslashes($username);
    $username   = mysqli_real_escape_string($con, $username);
    
    $email   = $_POST['email'];
    $email   = stripslashes($email);
    $email   = mysqli_real_escape_string($con, $email);
    
    $password   = $_POST['password'];
    $password2  = $_POST['password2'];
    
    $hash = hash('sha256', $password);
    $salt = createSalt();
    $hash = hash('sha256', $salt . $hash);
    
    if($username == "" || $email == "" || $password == "" || $password2 == "") {
        echo $errFieldsEmpty;
    } elseif(!preg_match('/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{7,30}$/',$_POST['password']))  {
        echo $errPWLength;
   } elseif($password != $password2) {
        echo $errPWMatch;
   } elseif(!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/',$_POST['email']))  {
        echo $errEmailInvalid;
    } elseif (strlen($username) > 30) {
        echo $errUserLength;
    } else {
         $query = mysqli_query($con,"SELECT id FROM users WHERE username = '$username'");
         $row = mysqli_num_rows($query); 
         
         if($row == 1) 
         { 
            echo $errUserTaken;  
         } else { 
            $add = mysqli_query($con,"INSERT INTO users ( username, email, password, salt ) VALUES ( '$username' , '$email' , '$hash' , '$salt' )");
            mysqli_close($con);
        
        echo "Your account has been created, your username is " . $username.". Click <a href='index.php?page=login'>here</a> to login.";
         } 
}
}

echo "</main></div>";