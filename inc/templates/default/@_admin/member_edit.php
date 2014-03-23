<?php
$userid = mysqli_real_escape_string($con, $_GET["id"]);

if(isset($_POST['delete']) && is_numeric($_POST['userid'])) {
    $id = mysqli_real_escape_string($con, $_POST['userid']);
    if($id == is_numeric(1)) {
        echo "<p>Sorry but the admin user cannot be deleted.</p>";
    } else {
    $delete = mysqli_query($con,"DELETE FROM user WHERE id='{$id}'");
    
    echo "<h2>Member Deleted</h2>
          <p>The user has been successfully deleted. <a href='{$site_url}admin/memberslist/'>Click here</a> to the remaining members.";
    }
} elseif(isset($_POST['submit'])) {
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

if(!isset($_POST['delete'])) {
$query_user = mysqli_query($con,"SELECT id, username, email, user_level FROM users WHERE id = {$userid}");
$m_edit = mysqli_fetch_array($query_user, MYSQLI_ASSOC);
    
echo "<script type=\"text/javascript\">
               function ConfirmDelete()
      {
            if (confirm(\"Are you sure that you want to delete this member? This is not reversiable!!\"))
                 location.href='{$site_url}admin/member_edit/{$userid}/';
      }
            </script>
    <form name='edit' method='POST' action='{$site_url}admin/member_edit/{$userid}/'>
        <table>
            <tr>
                <td width='125'><strong>Name</strong>:</td>
                <td><input class='edit' type='text' name='username' value='{$m_edit["username"]}'></td>
            </tr>
            <tr>
                <td width='125'><strong>Email</strong>:</td>
                <td><input class='edit' type='text' name='email' value='{$m_edit["email"]}'></td>
            </tr>
            <tr>
                <td width='125'><strong>User Level</strong>:</td>
                <td><input class='edit' type='text' name='user_level' value='{$m_edit["user_level"]}'></td>
            </tr>
            <tr>
                <td><input onclick=\"ConfirmDelete()\" type='submit' name='delete' value='Delete' /></td>
                <td><input type='hidden' name='userid' value='{$m_edit['id']}'>
                                <input name='submit' type='submit' value='Edit Member' />
                </td>
            </tr>
        </table>
    </form>";    
}  
mysqli_close($con);