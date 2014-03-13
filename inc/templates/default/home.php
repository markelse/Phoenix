<?php
get_page_header();
?>

<div class="middle">

<?php
echo "
    <div class='container'>
        <main class='content'>
            <h2>{$page_title}</h2>
                {$page_body}
                    
                <p>Posted in {$page_category}.</p>
        </main>
    </div>";
    
include 'inc/templates/default/sidebar.php';
?>	
</div>

<?php
include 'inc/templates/default/footer.php';