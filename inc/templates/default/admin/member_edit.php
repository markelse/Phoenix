<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<div class='container'>
    <main class='content'>
        
<?php  

    
    // Prepare the user data for user editing
    // This functions runs the user input through stripslashes and mysqli_real_escape_string 
    // This helps to ensure that the data is as safe as can be.
    // cytpe_digit helps to ensure that $_GET["id"] returns only a number
    $userid = stripslashes(ctype_digit($_GET["id"]));
    $userid = mysqli_real_escape_string($con, $userid);
    
    // Run a query based on the user id, we dont use * in our query to prevent things such
    // as passwords and salts being returned to malicious visitors
    $query = mysqli_query($con,"SELECT id, username, email, user_level FROM users WHERE id = {$_GET["id"]}");
    
    // While there is still a member to dislay echo their details
    $row = mysqli_fetch_array($query, MYSQL_ASSOC);
    
     echo "  <form name='edit' method='POST' action='#'>
                    <table>
                        <tr>
                            <td><input type='text' name='username' value='{$row["username"]}'></td>
                            <td><input type='text' name='email' value='{$row["email"]}'></td>
                            <td><input type='text' name='user_level' value='{$row["user_level"]}'></td>
                        </tr>
                        <tr>
                            <td colspan='6'><input type='hidden' name='userid' value='{$row['id']}'>
                                            <input name='submit' type='submit' value='Edit Member' />
                            </td>
                        </tr>
                    </table>
              </form>";
     
if(isset($_POST['submit'])) {
    // Prepare the user data for user editing
    // This functions runs the user input through stripslashes and mysqli_real_escape_string 
    // This helps to ensure that the data is as safe as can be
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($con, $username);
    
    $email   = stripslashes($_POST['email']);
    $email   = mysqli_real_escape_string($con, $email);
    
    $user_level = stripslashes($_POST['user_level']);
    $user_level   = mysqli_real_escape_string($con, $user_level);
    
    $userid = stripslashes($_POST['userid']);
    $userid = mysqli_real_escape_string($con, $userid);
    
     // Start some error checking
    if($username == "" || $email == "" || $user_level == "") {
        echo $errFieldsEmpty;
    } elseif(!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/',$_POST['email']))  {
        echo $errEmailInvalid;
    } elseif (strlen($username) > 30) {
        echo $errUserLength;
    } 
    $query = mysqli_query($con,"SELECT id FROM users WHERE username = '$username'");
    $row = mysqli_num_rows($query); 
         
         if($row == 1) 
         { 
            echo $errUserTaken;  
         } else { 
            // If all goes well this query will update the users details with whatever you have entered in the form.
            $add = mysqli_query($con,"UPDATE  users SET username = '{$username}', email =  '{$email}', user_level = '{$user_level}' WHERE id = {$userid}");
            mysqli_close($con);
        
        // Display a message upon successfull update.
        echo "The selected user ({$username}) has been updated, please refresh the page to see the changes.";
         }    
}
?>
    </main>
</div>