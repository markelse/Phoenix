<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

// Sets the database information
$db_host = "localhost";
$db_name = "login";
$db_user = "calendar";
$db_pass = "password";

// Create a new connection
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Can not connect to Server.");