<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<div class='container'>
    <main class='content'>
        
<?php  
if(!isset($_POST['submit'])) {
    // Prepare the user data for the registration process
    // This functions runs the user input through stripslashes and mysqli_real_escape_string
    $userid = stripslashes(ctype_digit($_GET["id"]));
    $userid = mysqli_real_escape_string($con, $userid);
    
    $query = mysqli_query($con,"SELECT * FROM users WHERE id = {$_GET["id"]}");
    // While there is still a member to dislay echo their details
    $row = mysqli_fetch_array($query);
     echo "
                <form name='edit' method='POST' action='#'>
                    <table>
                        <tr>
                            <td><input type='text' name='username' value='{$row["username"]}'></td>
                            <td><input type='text' name='email' value='{$row["email"]}'></td>
                             <td><select name='user_level' value='{$row["user_level"]}'>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan='6'><input type='hidden' name='userid' value='{$row['id']}'>
                                            <input name='submit' type='submit' value='edit2' /></td>
                        </tr>
                    </table>
              </form>";
     
} else {
    
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
    } else { 
            $add = mysqli_query($con,"UPDATE  users SET username = '{$username}', email =  '{$email}', user_level = '{$user_level}' WHERE id = {$userid}");
            mysqli_close($con);
        
        echo "The selected user ({$username}) has been updated, please refresh the page to see the changes.";
         }    
}
?>
    </main>
</div>