<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<div class='container'>
    <main class='content'>
        <h2>Welcome <?php get_username(); ?></h2>
        <p>Thanks for logging in, here is a list of things that you can do;</p>
        <ol>
            <li><a href='<?php echo $site_url; ?>index.php/members_email/'>Change your email</a></li>
        </ol> 
    </main>
</div>