<?php 

    session_start();

     $header_text = 'Administrador de reseñas';
     require '../includes/functions.php';
     includeTemplate("header", $header_text);
?>
    
    <main class="container">
    <?php 
        if ($_SESSION['errors']) {
    ?>
        <div class="alert success">
            <?php echo $_SESSION['errors']; ?>
        </div>
    <?php
        }
    ?>
        <a href="/blog_sobreliteratura/admin/reviews/create.php" class="button-inline">Nueva reseña</a>
    </main>

<?php 
    includeTemplate("Footer", $header_text);
    session_destroy();
?>