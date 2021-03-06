<?php
$pageid = mysqli_real_escape_string($con, $_GET["id"]);

if(isset($_POST['delete']) && is_numeric($_POST['pageid'])) {
    $id = mysqli_real_escape_string($con, $_POST['pageid']);
    $delete = mysqli_query($con,"DELETE FROM pages WHERE id='{$id}'");
    
    echo "<h2>Page Deleted</h2>
          <p>The page has been successfully deleted. <a href='{$site_url}admin/page_view/'>Click here</a> to the remaining pages.";
    
} elseif(isset($_POST['submit']) && is_numeric($_POST['id'])) {
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
        // If all goes well this query will update the users details with whatever you have entered in the form.
        $add = mysqli_query($con,"UPDATE pages SET title = '{$title}', excerpt = '{$excerpt}', body = '{$body}', category = '{$category}' WHERE id = {$pageid}");
        
        // Display a message upon successfull update.
        user_message("success message","Success","$msg_updated_page");
    }
}      
if(!isset($_POST['delete'])) {
// Display the form
     $query = mysqli_query($con,"SELECT * FROM pages WHERE id = {$pageid}");
     $p_edit = mysqli_fetch_array($query, MYSQLI_ASSOC);
     
     echo "<script type=\"text/javascript\">
               function ConfirmDelete()
      {
            if (confirm(\"Are you sure that you want to delete this page? This is not reversiable!!\"))
                 location.href='{$site_url}admin/page_edit/{$p_edit["id"]}';
      }
            </script>
    <form id='edit' name='edit' method='POST' action='{$site_url}admin/page_edit/{$p_edit["id"]}/'>
        <table>
            <tr>
                <td colspan='2'>
                <h2>Edit Page</h2>
                <p>Below you can edit the contents of the page, both the site category and site title names will affect the URL of the page, if either are changed then you will need to update any links pointing to them. <br/><br />
                Your current URL would look something like: <strong><span style='color:red'>{$site_url}</span><span style='color:green'>{$p_edit["category"]}</span>/<span style='color:blue'>{$p_edit["title"]}</span>/</strong></p>
            </tr>
            <tr>
                <td width='60'><strong>Title:</strong></td>
                <td>
                <input class='edit' type='text' name='title' value='{$p_edit["title"]}'></td>
            </tr>
            <tr>
                <td colspan='2'>&nbsp;<td>
            </tr>
            <tr>
                <td width='60'><strong>Excerpt:</strong></td>
                <td><textarea rows='5' cols='50' name='excerpt'>{$p_edit["excerpt"]}</textarea></td>
            </tr>
            <tr>
                <td colspan='2'>&nbsp;<td>
            </tr>
            <tr>
                <td width='60'><strong>Body:</strong></td>
                <td><textarea class='editable' rows='20' cols='50' name='body'>{$p_edit["body"]}</textarea></td>
            </tr>
            <tr>
                <td colspan='2'>&nbsp;<td>
            </tr>
            <tr>
                <td width='60'><strong>Category:</strong></td>
                <td><input type='text' name='category' value='{$p_edit["category"]}'></td>
            </tr>
            <tr>
                <td><input onclick=\"ConfirmDelete()\" type='submit' name='delete' value='Delete' /></td>
                <td><input type='hidden' name='pageid' value='{$p_edit['id']}'>
                                <input name='submit' type='submit' value='Edit Page' />
                </td>
            </tr>
        </table>
    </form>";
}        
mysqli_close($con);