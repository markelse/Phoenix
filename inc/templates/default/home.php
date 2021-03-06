<?php
include "inc/templates/{$site_theme}/header.php";

include "inc/templates/{$site_theme}/l-sidebar.php";
    
// Run the query and create an array named $page2[]
$query_page = mysqli_query($con,"SELECT * FROM pages WHERE title = 'Home' AND category = 'Home'");
$page_sel = mysqli_fetch_array($query_page);

// Give the array rows easy to remember variable names.
$page_title         = $page_sel["title"];
$page_excerpt       = $page_sel["excerpt"];
$page_body          = $page_sel["body"];
$page_category      = $page_sel["category"];

echo "
<div id='content'>
    <h2>{$page_title}</h2>
        {$page_body}
                    
    <p>Posted in {$page_category}.</p>
</div>";
    
include "inc/templates/{$site_theme}/r-sidebar.php";

include "inc/templates/{$site_theme}/footer.php";