<?php

/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

function query_user_level(){
    global $con;
    $username = stripslashes($_SESSION['username']);
         
    $query = mysqli_query($con,"SELECT user_level FROM users WHERE username = '$username';");
    $row = mysqli_fetch_array($query);
}