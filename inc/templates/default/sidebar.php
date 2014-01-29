<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>
<aside class="left-sidebar">
<?php
if(!isLoggedIn()) {

         echo "
     <ol>
        <li><a href='index.php' title='Home'>Home</a></li>
        <li><a href='index.php?page=login' title='Login To Your Account'>Login</a></li>
        <li><a href='index.php?page=register' title='Register For An Account'>Register</a></li>
    </ol>";
        
     } else {
         
         echo "
     <ol>
        <li><a href='index.php' title='Home'>Home</a></li>
        <li><a href='index.php?page=members' title='Members Dashboard'>Members Dashboard</a></li>
        <li><a href='index.php?page=logout' title='Logout Of Your Account'>Logout</a></li>
    </ol>";
     }

?>
</aside>