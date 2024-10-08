<?php 
     $header_text = 1;
     require 'includes/functions.php';
     includeTemplate("header", $header_text);
?>

    <main class="container">
        <h3>Title</h3>
    </main>

<?php 
    includeTemplate("Footer", $header_text);
?>