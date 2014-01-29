<?php
/* 
 * Phoenix PHP was designed by Mark Else and is Copyrighted.
 * If you wish to use this script then please contact me at djtheropy@gmail.com.
 */
?>

<div class="container">
    <main class="content">
	<strong>ERROR:</strong> no page exists by the name of <?php echo filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); ?>
    </main>
</div>