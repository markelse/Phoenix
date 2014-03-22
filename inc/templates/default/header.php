<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $site_name; ?></title>
            <?php include "inc/templates/{$site_theme}/head.php"; ?>
    </head>
    
<body>
<div id="wrapper">
    <div id="header">
    <?php echo "
        <img src='{$site_url}inc/templates/{$site_theme}/images/logo-icon.gif' border='0' style='float:left;padding:5px;' /> 
        <h1>{$site_name}</h1>";
    ?>
    </div>