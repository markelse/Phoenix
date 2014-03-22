<?php
// Generates an array of the site config options
$query_config = mysqli_query($con,"SELECT * FROM config");
while ($config0 = mysqli_fetch_array($query_config, MYSQLI_ASSOC)) {
    echo "
        <tr>
            <td style='text-align: center'>Name</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td style='text-align: center'>{$config0["Name"]}</td>
            <td>{$config0["Value"]}</td>
            <td>{$config0["Description"]}</td>
        </tr>
             ";
}