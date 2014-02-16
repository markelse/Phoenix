<?php

/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */

$query = mysqli_query($con,"SELECT * FROM config");
$config = mysqli_fetch_array($query);