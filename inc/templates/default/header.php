<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $site_name; ?></title>
            <?php include 'head.php'; ?>
   </head>
    
   <body>
       <!-- The wrapper div is opened here and closed in the footer -->
       <div class="wrapper">
            <header class="header">
               <?php
                    // This function will include the site logo
                    get_site_header();
               ?> 
            </header>