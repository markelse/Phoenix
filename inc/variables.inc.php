<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
require 'inc/db.inc.php';

// Site config variables
$query_config1 = mysqli_query($con,"SELECT Name,Value FROM config WHERE id = 1");
$config_sn = mysqli_fetch_array($query_config1, MYSQLI_ASSOC);
    $site_name = $config_sn["Value"];
    
$query_config2 = mysqli_query($con,"SELECT Name,Value FROM config WHERE id = 2");
$config_sp = mysqli_fetch_array($query_config2, MYSQLI_ASSOC);    
$site_path = $config_sp["Value"];

$query_config3 = mysqli_query($con,"SELECT Name,Value FROM config WHERE id = 3");
$config_su = mysqli_fetch_array($query_config3, MYSQLI_ASSOC);
    $site_url = $config_su["Value"];

$query_config4 = mysqli_query($con,"SELECT Name,Value FROM config WHERE Name = 'site_theme'");
$config_st = mysqli_fetch_array($query_config4);
    $site_theme = $config_st["Value"];
    
