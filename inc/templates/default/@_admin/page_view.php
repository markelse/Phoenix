<?php
// Query the database for a list of pages, ordered by id
$query_pages = mysqli_query($con,"SELECT * FROM pages ORDER BY id ASC");

echo "
    <table class='alt' width='100%' align='left' cellpadding='5'>
        <tr>
            <th align='left' width='5%'>ID</th>
            <th align='left' width='10%'>Title</th>
            <th align='left' width='75%'>Excerpt</th>
            <th align='left' width='10%'>Category</th>
        </tr>";
    
// While there is still a page to dislay echo the results of the query
while ($pages = mysqli_fetch_array($query_pages, MYSQLI_ASSOC)) {
    echo "
        <tr>
            <td style='text-align: center'><a href='{$site_url}admin/page_edit/{$pages["id"]}/'>{$pages["id"]}</a></td>
            <td><strong>{$pages["title"]}</strong></td>
            <td>{$pages["excerpt"]}</td>
            <td>{$pages["category"]}</td>
       </tr>";
}

echo "</table>";