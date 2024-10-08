<?php 
     $header_text = 'Administrador de reseñas';
     require '../includes/functions.php';
     includeTemplate("header", $header_text);
?>

    <main class="container">
        <a href="/blog_sobreliteratura/admin/reviews/create.php" class="button-inline">Nueva reseña</a>
    </main>

<?php 
    includeTemplate("Footer", $header_text);
?>