<?php
// Sets the database information
$db_host = "localhost";
$db_name = "phoenix";
$db_user = "root";
$db_pass = "";

// Create a new connection
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("Can not connect to Server.");