<?php 
    $header_text = 'Reseñas';
    require 'includes/functions.php';
    includeTemplate("header", $header_text);
?>
    <div class="cards_container margin-top container">

                <?php 

                    $limit = 10;
                    include 'includes/templates/reviews.php';
                ?>
        </div>

<?php 
    includeTemplate("Footer", $header_text);
?>