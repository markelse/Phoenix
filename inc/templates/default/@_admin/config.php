<?php  
if(isset($_POST['submit'])) {
    {
    $site_name      = mysqli_real_escape_string($con, $_POST['site_name']);
    $site_path      = mysqli_real_escape_string($con, $_POST['site_path']);
    $site_url       = mysqli_real_escape_string($con, $_POST['site_url']);
        
    $add = mysqli_query($con,"UPDATE config2 SET site_name = '{$site_name}', site_path = '{$site_path}', site_url = '{$site_url}'");
      
    // Display a message upon successfull update.
    user_message("success message","Success","$msg_updated_config");
    }
}
    // Query the database
    include 'inc/reuse/query_site_config.php';
    
    echo "
        <h2>{$site_name} Config</h2>
        
        <p>Here you can edit your website's config file, double check any edits before you click on edit config, incorrect settings could render your website broken.</p>
                
        <form name='edit' method='POST' action='{$site_url}admin/config/'>
            <table class='alt'>
                <tr>
                    <td width='60%'><strong>Site Name</strong>:
                    <br /> This is displayed in the header of the template and the page title.<br /> <br /> </td>
                
                    <td><input type='text' name='site_name' value='{$config["site_name"]}' style='width:300px'></td>
                </tr>
                <tr>
                    <td width='60%'><strong>Site Path</strong>:<br /> 
                    The path to the root directory of the site, must contain a trailing slash at the end.<br /> <br /> </td>
                
                    <td><input type='text' name='site_path' value='{$config["site_path"]}' style='width:300px'></td>
                </tr>
                <tr>
                    <td width='60%'><strong>Site URL</strong>:<br /> 
                    The URL of the site, must contain a trailing slash at the end.<br /> <br /> </td>
                
                    <td><input type='text' name='site_url' value='{$config["site_url"]}' style='width:300px'></td>
                </tr>
                <tr>
                    <td width='60%'><strong>Site Theme</strong>:<br /> 
                    The theme that will be used for the site, must represent a valid folder name inside of /inc/templates/<br /> <br /> </td>
                
                    <td><input type='text' name='site_theme' value='{$config["site_theme"]}' style='width:300px'></td>
                </tr>
                <tr>
                    <td colspan='6'><input name='submit' type='submit' value='Edit Config' /></td>
                </tr>
            </table>
        </form>";
                    
mysqli_close($con);