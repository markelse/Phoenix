<?php

function menu_items($menu_category) {
    global $con,$site_url;
    $query = mysqli_query($con,"SELECT category, title FROM pages WHERE category = '$menu_category' ORDER BY id ASC");
    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        echo "<li class='indent'><a href='{$site_url}{$row["category"]}/{$row["title"]}/'>{$row["title"]}</a></li>";
    }
}

// Queries the config table.
$query_config = mysqli_query($con,"SELECT * FROM config");
$config = mysqli_fetch_array($query_config, MYSQLI_ASSOC);