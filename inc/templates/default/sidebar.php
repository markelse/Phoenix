<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>
<aside class="left-sidebar">
<?php
if(isLoggedIn () && $_SESSION['level'] == 5) {
    
    echo "
     <ol>
        <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
        <li><a href='{$site_url}index.php/admin/' title='Admin Dashboard'>Admin Dashboard</li>
        <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
        <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
    </ol>";
    
} elseif(isLoggedIn() && $_SESSION['level'] == 1) {

         echo "
     <ol>
        <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
        <li><a href='{$site_url}index.php/members/' title='Members Dashboard'>Members Dashboard</a></li>
        <li><a href='{$site_url}index.php/logout/' title='Logout Of Your Account'>Logout</a></li>
    </ol>";
} else {
    echo "
     <ol>
        <li><a href='{$site_url}index.php/' title='Home'>Home</a></li>
        <li><a href='{$site_url}index.php/login/' title='Login To Your Account'>Login</a></li>
        <li><a href='{$site_url}index.php/register/' title='Register For An Account'>Register</a></li>
    </ol>";
}

?>
</aside>