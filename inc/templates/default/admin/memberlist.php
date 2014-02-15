<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<div class='container'>
    <main class='content'>
        
<?php
    
if(isset($_POST['edit{$row["id"]}'])) {
    $query = mysqli_query($con,"SELECT * FROM users WHERE id = {$_POST["id"]}");
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
                            <td colspan='6'><input type='hidden' name='id' value='{$row['id']}'>
                                            <input name='submit' type='submit' value='edit2' /></td>
                        </tr>
                    </table>
              </form>";
            
} elseif(isset ($_POST["edit2"])) {
    // If there are no error then go ahead and update the email address.
    $add = mysqli_query($con,"UPDATE  `phoenix`.`users` SET  `username` = '{$row["username"]}', `email` =  '{$row["email"]}', `user_level` = '{$row["user_level"]}' WHERE `username` = '$username'");
    mysqli_close($con);
} else {
    echo " 
        <form name='edit_user' method='POST' action='#'>
        <table width='100%' align='left'>
            <tr>
                <th align='left' width='5%'>ID</th>
                <th align='left' width='25%'>Name</th>
                <th align='left' width='45%'>Email</th>
                <th align='left' width='5%'>Level</th>
                <th align='left' width='5%'>Edit</th>
                <th align='left' width='5%'>Delete</th>
            </tr>";
   
// Query the database for a list of members
    $query = mysqli_query($con,"SELECT * FROM users ORDER BY id");
    // While there is still a member to dislay echo their details
    while ($row = mysqli_fetch_array($query))
    {
        echo "
                <tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["username"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["user_level"]}</td>
                    <td><input type='checkbox' name='edit{$row["id"]}' value='edit'>Edit</td>
                    <td>DELETE</td>
                </tr>";
    }
       echo "   <tr>
                    <td colspan='6'><input name='submit' type='submit' value='update' /></td>
                </tr>
                       </table></form>";
}
?>
    </main>
</div>