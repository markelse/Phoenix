<?php
$userid = mysqli_real_escape_string($con, $_GET["id"]);

if(isset($_POST['submit'])) {
    // Prepare the user data for user editing
    $username       = mysqli_real_escape_string($con, $_POST['username']);
    $email          = mysqli_real_escape_string($con, $_POST['email']);
    $user_level     = mysqli_real_escape_string($con, $_POST['user_level']);

     // Start some error checking
    if($username == "" || $email == "" || $user_level == "") {
        user_message("error message","Error","$msg_empty_fields");
    } elseif(!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/',$_POST['email']))  {
        user_message("error message","Error","$msg_invalid_email");
    } elseif (strlen($username) > 30) {
        user_message("error message","Error","$msg_username_length");
    } 
             
    // If all goes well this query will update the users details with whatever you have entered in the form.
    $add = mysqli_query($con,"UPDATE users SET username = '{$username}', email = '{$email}', user_level = '{$user_level}' WHERE id = {$userid}");
            
    // Display a message upon successfull update.
    user_message("success message","Success","$msg_updated_member_edit");
}
    
// Run a query based on the user id, we dont use * in our query to prevent things such
// as passwords and salts being returned to malicious visitors
$query_user = mysqli_query($con,"SELECT id, username, email, user_level FROM users WHERE id = {$userid}");
$m_edit = mysqli_fetch_array($query_user, MYSQLI_ASSOC);
    
echo "
    <form name='edit' method='POST' action='{$site_url}admin/member_edit/{$userid}/'>
        <table>
            <tr>
                <th align='left' width='35%'>Username</th>
                <th align='left' width='45%'>Email Address</th>
                <th align='left' width='20%'>User Level</th>
            </tr>
            <tr>
                <td><input type='text' name='username' value='{$m_edit["username"]}'></td>
                <td><input type='text' name='email' value='{$m_edit["email"]}'></td>
                <td><input type='text' name='user_level' value='{$m_edit["user_level"]}'></td>
            </tr>
            <tr>
                <td colspan='6'><input type='hidden' name='userid' value='{$m_edit['id']}'>
                                <input name='submit' type='submit' value='Edit Member' />
                </td>
            </tr>
        </table>
    </form>";    
        
mysqli_close($con);