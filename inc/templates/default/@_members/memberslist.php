<?php

// Query the database for a list of members
$query = mysqli_query($con,"SELECT id,username,email,user_level FROM users ORDER BY id");
                
// Echo the results in the form of a formatted HTML table.
echo "
    <h2>Memberslist</h2>
                    
    <p>Here is a list of all the members that have registered for our website.</p>
                    
    <table class='alt' width='100%' align='left'>
        <tr>
            <th align='left' width='25%'>Name</th>
            <th align='left' width='45%'>Email</th>
            <th align='left' width='5%'>Level</th>
       </tr>";
    
    // While there is still a member to dislay echo their details
    while ($memberslist = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        echo "
            <tr>
                <td style='padding-left:5px;'>{$memberslist["username"]}</td>
                <td>{$memberslist["email"]}</td>
                <td>{$memberslist["user_level"]}</td>
            </tr>";
    }
   
echo "</table>";