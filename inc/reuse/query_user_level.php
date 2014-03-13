<?php
// Queries the logged-in user to find his/her user_level or sets user_level to 0 if they are logged out
if(isset($_SESSION['username'])) {
    $username   = stripslashes($_SESSION['username']);
    $username   = mysqli_real_escape_string($con, $username);
         
    $query2 = mysqli_query($con,"SELECT user_level FROM users WHERE username = '$username';");
    $row = mysqli_fetch_array($query2, MYSQLI_ASSOC);

    $user_level = $row["user_level"];
} else {
    $user_level = 0;   
}

