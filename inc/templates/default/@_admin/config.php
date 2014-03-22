<?php
// Query the database for a list of members
$query_config = mysqli_query($con,"SELECT * FROM config ORDER BY id");

// Echo the results in the form of a formatted HTML table.
echo "
    <h2>{$site_name} Config</h2>
                    
        <p>Here you can edit your website's config file, double check any edits before you click on edit config, incorrect settings could render your website broken.</p>
                    
    <table class='alt' align='left'>
        <tr>
            <th align='left' width='12'>ID</th>
            <th align='left' width='40'>Name</th>
            <th align='left' width='220'>Value</th>
            <th align='left' width='290'>Description</th>
        </tr>";
    
// While there is still a member to dislay echo their details
while ($config_list = mysqli_fetch_array($query_config, MYSQLI_ASSOC)) {
    echo "
        <tr>
            <td style='text-align: center'><a href='{$site_url}admin/config_edit/{$config_list["id"]}/'>{$config_list["id"]}</a></td>
            <td>{$config_list["Name"]}</td>
            <td>{$config_list["Value"]}</td>
            <td>{$config_list["Description"]}</td>
        </tr>";
}

echo "</table>";