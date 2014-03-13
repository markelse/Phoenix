<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $site_name; ?></title>
            <?php include 'inc/templates/default/head.php'; ?>
    </head>
    
    <body>
        <!-- The wrapper div is opened here and closed in the footer -->
        <div class="wrapper">
            <header class="header">
                <?php
                echo "<img src='{$site_url}inc/templates/default/images/logo-icon.gif' border='0' style='float:left' /> <h1>{$site_name}</h1>";
                ?> 
            </header>