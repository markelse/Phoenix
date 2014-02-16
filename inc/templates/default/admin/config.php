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
    
    // Query the database
    include 'inc/reuse/query_site_config.php';
    
     echo "     <h2>{$site_name} Config</h2>
                <p>Here you can edit your website's config file, double check any edits before you click on edit config, 
                incorrect settings could render your website broken.</p>
                
                <form name='edit' method='POST' action='#'>
                    <table>
                        <tr>
                            <td width='250'>Site Name:</td>
                            <td><input type='text' name='site_name' value='{$config["site_name"]}'></td>
                        </tr>
                        <tr>
                            <td width='250'>Site Path (with trailing /)</td>
                            <td><input type='text' name='site_path' value='{$config["site_path"]}'></td>
                        </tr>
                        <tr>
                            <td width='250'>Site URL (with trailing /)</td>
                            <td><input type='text' name='site_url' value='{$config["site_url"]}'></td>
                        </tr>
                        <tr>
                            <td colspan='6'><input name='submit' type='submit' value='Edit Config' /></td>
                        </tr>
                    </table>
              </form>";
     
} else {

    $site_name      = mysqli_real_escape_string($con, $_POST['site_name']);
    $site_path      = mysqli_real_escape_string($con, $_POST['site_path']);
    $site_url       = mysqli_real_escape_string($con, $_POST['site_url']);
        
    $add = mysqli_query($con,"UPDATE config SET 
                                                site_name   = '{$site_name}', 
                                                site_path   = '{$site_path}', 
                                                site_url    = '{$site_url}'");
    
    
            mysqli_close($con);
        
        // Display a message upon successfull update.
        echo "Your site config information has been updated, <a href='{$site_url}index.php/admin_config/'>click here</a> to reload the config page.";
}
?>
    </main>
</div>