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
    $query = mysqli_query($con,"SELECT * FROM users ORDER BY id");

    echo "<table width='100%' align='left'>
            <tr>
                <th align='left' width='5%'>ID</th>
                <th align='left' width='25%'>Name</th>
                <th align='left' width='45%'>Email</th>
                <th align='left' width='5%'>Level</th>
              
            </tr>";
    
    // While there is still a member to dislay echo their details
    while ($row = mysqli_fetch_array($query))
    {
        echo "
                <tr>
                    <td><a href='../../index.php?page=member_edit&id={$row["id"]}&username={$row["username"]}&email={$row["email"]}&user_level={$row["user_level"]}'>{$row["id"]}</a></td>
                    <td>{$row["username"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["user_level"]}</td>
                   
                </tr>";
    }
    echo "</table>"
?>
    </main>
</div>