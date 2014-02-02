<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Display the login form
echo "<div class='container'>
	<main class='content'>";
               if(!isLoggedIn()) {

        // Display the login form
        include 'inc/templates/default/login.php';
    } else {
         $username = stripslashes($_SESSION['username']);
         
         $query = mysqli_query($con,"SELECT user_level FROM users WHERE username = '$username';");
         $row = mysqli_fetch_array($query); 

         if($row['user_level'] == 5) 
         { 
            echo "is admin {$username}{$row['user_level']}";
            
         } else { 
             
        echo "is not admin {$username} {$row['user_level']}";
        } 
    }
echo "</main></div>";