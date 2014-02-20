<?php

/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
if(isset($_SESSION['username'])) {
$username   = stripslashes($_SESSION['username']);
$username   = mysqli_real_escape_string($con, $username);
         
$query2 = mysqli_query($con,"SELECT user_level FROM users WHERE username = '$username';");
$row = mysqli_fetch_array($query2, MYSQLI_ASSOC);

$user_level = $row["user_level"];
} else {
    $user_level = 0;
    
}

