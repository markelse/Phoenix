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
    $query = mysqli_query($con,"SELECT username,email FROM users ORDER BY id");

    // While there is still a member to dislay echo their details
    while ($row = mysqli_fetch_array($query))
    {
        echo "<p>"
        . "<strong>Name :</strong> {$row["username"]} "
        . "({$row["email"]})<br />"
        . "</p>";
    }
?>
    </main>
</div>