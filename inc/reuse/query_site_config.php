<?php
// Generates an array of the site config options
$query = mysqli_query($con,"SELECT * FROM config");
while ($mem_list = mysqli_fetch_array($query_mem_list, MYSQLI_ASSOC)) {
    echo "
        <tr>
            <td style='text-align: center'><a href='{$site_url}admin/member_edit/{$mem_list["id"]}/'>{$mem_list["id"]}</a></td>
            <td>{$mem_list["username"]}</td>
            <td>{$mem_list["email"]}</td>
            <td>{$mem_list["user_level"]}</td>
        </tr>";
}