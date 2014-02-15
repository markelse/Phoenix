<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>
<div class="container">
    <main class="content">
        
<?php
    // Query the database for a list of members
    $query = mysqli_query($con,"SELECT id,username,email,user_level FROM users ORDER BY id");

    echo "<table width='100%' align='left'>
            <tr>
                <th align='left' width='25%'>Name</th>
                <th align='left' width='45%'>Email</th>
                <th align='left' width='5%'>Level</th>
              
            </tr>";
    
    // While there is still a member to dislay echo their details
    while ($row = mysqli_fetch_array($query, MYSQL_ASSOC))
    {
        echo "
                <tr>
                    <td>{$row["username"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["user_level"]}</td>
                   
                </tr>";
    }
    echo "</table>"
?>
    </main>
</div>