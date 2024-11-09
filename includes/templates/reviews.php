    <?php 
         session_start();

         ini_set('display_errors', 1);
         ini_set('display_startup_errors', 1);
         error_reporting(E_ALL);
     
     
         require 'includes/config/database.php';
     
         
         $db = connectDB();
     
         $query = "SELECT * FROM reviews LIMIT {$limit}";
     
         $resultQuery = mysqli_query($db, $query);

    ?>
    
    <?php 
                                
    if ($resultQuery->num_rows > 0) {
         // Loop through each row
         while ($row = mysqli_fetch_assoc($resultQuery)) {
            ?>
    <div class="cardbook">
        <picture>
            <img class="coverbook" loading="lazy" src="<?php echo "uploads/" . $row['image']; ?>" alt="book1">
        </picture>

        <h6><?php echo $row['title']?></h6>
        <P><?php echo $row['description']?></P>
        <p><?php echo $row['author']?></p>
        <ul class="iconList">
            <li>
                <picture>
                    <source srcset="build/img/rating_start.webp" type="image/webp">
                    <source srcset="build/img/rating_start.png" type="img/png">
                    <img loading="lazy" src="build/img/rating_start.png" alt="book1">
                </picture>
                <?php echo $row['rating']?></li>
            <li>
                <picture>
                    <source srcset="build/img/checkbox.webp" type="image/webp">
                    <source srcset="build/img/checkbox.png" type="img/png">
                    <img loading="lazy" src="build/img/checkbox.png" alt="book1">
                </picture>
                <?php echo $row['dateReview']?></li>
            <li>
                <picture>
                <source srcset="build/img/seal.webp" type="image/webp">
                <source srcset="build/img/seal.png" type="img/png">
                <img loading="lazy" src="build/img/seal.png" alt="book1">
                </picture><?php echo $row['publishing']?></li>
        </ul>
        <a class="button-block" href="/blog_sobreliteratura/review.php?id=<?php echo $row['id']?>">Ver reseñas</a>
    </div>
        <?php
                }
            } else {
                ?>
                  <tr>
                    <td colspan="5">Aún no hay ninguna reseña</td>
                </tr>
                <?php
            }

            includeTemplate("Footer", $header_text);
        
            ?>