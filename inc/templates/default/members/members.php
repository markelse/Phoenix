<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

    // Check to see if the user has logged in, if not redirect the user to the login form      
    if(!isLoggedIn()) {

        // Display the login form
        include 'inc/templates/default/login.php';
     } else {
         echo "
             <div class='container'>
                 <main class='content'>
                    You are logged in
                 </main>
            </div>";
     }