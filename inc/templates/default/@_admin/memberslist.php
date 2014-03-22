<?php
// Query the database for a list of members
$query_mem_list = mysqli_query($con,"SELECT id,username,email,user_level FROM users ORDER BY id");

// Echo the results in the form of a formatted HTML table.
echo "
    <h2>Memberslist</h2>
                    
    <p>Here is a list of all the members that have registered for our website.</p>
                    
    <table class='alt' align='left'>
        <tr>
            <th align='left' width='32'>ID</th>
            <th align='left' width='200'>Name</th>
            <th align='left' width='300'>Email</th>
            <th align='left' width='30'>Level</th>
        </tr>";
    
// While there is still a member to dislay echo their details
while ($mem_list = mysqli_fetch_array($query_mem_list, MYSQLI_ASSOC)) {
    echo "
        <tr>
            <td style='text-align: center'><a href='{$site_url}admin/member_edit/{$mem_list["id"]}/'>{$mem_list["id"]}</a></td>
            <td>{$mem_list["username"]}</td>
            <td>{$mem_list["email"]}</td>
            <td>{$mem_list["user_level"]}</td>
        </tr>";
}

echo "</table>";