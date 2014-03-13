<?php
if(isset($_POST['add_page'])) {
    // Prepare the user submitted data for the database
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $excerpt = mysqli_real_escape_string($con, $_POST['excerpt']);
    $body = mysqli_real_escape_string($con, $_POST['body']);                                
    $category = mysqli_real_escape_string($con, $_POST['category']);

    $_SESSION['p_title'] = $title;
    $_SESSION['p_excerpt'] = $excerpt;
    $_SESSION['p_body'] = $body;
    $_SESSION['p_category'] = $category;
        
    if($title == "" || $excerpt == "" || $body == "" || $category == "") {
        user_message("error message","Error","$msg_empty_fields");
    } else {
        $query = mysqli_query($con,"SELECT id FROM pages WHERE title = '$title'");
        $row = mysqli_num_rows($query); 
        if($row == 1) { 
            user_message("error message","Error","$msg_exists_page");
        } else {
            // If there are no error then go ahead and update the email address.
            $add = mysqli_query($con,"INSERT INTO pages (title, excerpt, body, category) VALUES ('$title' , '$excerpt' , '$body' , '$category')");
            user_message("success message","Success","$msg_created_page");
        }
    }
} 

// Display the add page form
if(!isset($_POST['add_page'])) {
    $_SESSION['p_title'] = "";
    $_SESSION['p_excerpt'] = "";
    $_SESSION['p_body'] = "";
    $_SESSION['p_category'] = "";
}

echo "
    <h2>Add A Page</h2>
    
    <form name='add_page' method='POST' action='{$site_url}admin/page_add/'>
        <table>
            <tr>
                <td>Title:</td>
                <td><input name='title' type='text' value='{$_SESSION['p_title']}'  /><td>
            </tr>    
            <tr>
                <td>Excerpt:</td>
                <td><textarea rows='4' cols='50' name='excerpt'>{$_SESSION['p_excerpt']}</textarea><td>
            </tr>
            <tr>
                <td>Body:</td>
                <td><textarea class='editable' rows='20' cols='50' name='body'>{$_SESSION['p_body']}</textarea><td>
            </tr>
            <tr>
                <td>Category:</td>
                <td><input name='category' type='text' value='{$_SESSION['p_category']}' /><td>
            </tr>
            <tr>
                <td colspan='2'><input name='add_page' type='submit' value='Add a page' /></td>
            </tr>
        </table>
    </form>";
                
mysqli_close($con);