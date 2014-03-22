<?php
$config_id = mysqli_real_escape_string($con, $_GET["id"]);

if(isset($_POST['submit'])) {
    // Prepare the user data for user editing
    $value = mysqli_real_escape_string($con, $_POST['value']);

     // Start some error checking
    if($value == "") {
        user_message("error message","Error","$msg_empty_fields");
    } 
             
    // If all goes well this query will update the users details with whatever you have entered in the form.
    $add = mysqli_query($con,"UPDATE config SET Value = '{$value}' WHERE id = {$config_id}");
            
    // Display a message upon successfull update.
    user_message("success message","Success","$msg_updated_config");
}

// Run a query based on the user id, we dont use * in our query to prevent things such
// as passwords and salts being returned to malicious visitors
$query_config = mysqli_query($con,"SELECT * FROM config WHERE id = {$config_id}");
$config_edit = mysqli_fetch_array($query_config, MYSQLI_ASSOC);
    
echo "
    <form name='edit' method='POST' action='{$site_url}admin/config_edit/{$config_id}/'>
        <table>
            <tr>
                <td><p><strong>Config Name:</strong> {$config_edit["Name"]}</p></td>
            </tr>
            <tr>
                <td><p><strong>Config Description:</strong> {$config_edit["Description"]}</p></td>
            </tr>
            <tr>
                <td><p><strong>Config Value:</strong> <input class='edit' type='text' name='value' value='{$config_edit["Value"]}'></p></td>
            </tr>
            <tr>
                <td colspan='6'><input type='hidden' name='config_id' value='{$config_edit['id']}'>
                                <input name='submit' type='submit' value='Edit Config' />
                </td>
            </tr>
        </table>
    </form>";    
        
mysqli_close($con);