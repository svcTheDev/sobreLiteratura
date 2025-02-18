    <?php 

        use App\Review;

        $review = Review::all();

    ?>
    
    <?php 

    if ($review) {

                                
    foreach ($review as $value) {
        # code...
            ?>
    <div class="cardbook">
        <picture>
            <img class="coverbook" loading="lazy" src="<?php echo "uploads/" . $value->image; ?>" alt="book1">
        </picture>

        <h6><?php echo $value->title ?></h6>
        <P><?php echo $value->description ?></P>
        <p><?php echo $value->author ?></p>
        <ul class="iconList">
            <li>
                <picture>
                    <source srcset="build/img/rating_start.webp" type="image/webp">
                    <source srcset="build/img/rating_start.png" type="img/png">
                    <img loading="lazy" src="build/img/rating_start.png" alt="book1">
                </picture>
                <?php echo $value->rating?></li>
            <li>
                <picture>
                    <source srcset="build/img/checkbox.webp" type="image/webp">
                    <source srcset="build/img/checkbox.png" type="img/png">
                    <img loading="lazy" src="build/img/checkbox.png" alt="book1">
                </picture>
                <?php echo $value->dateReview?></li>
            <li>
                <picture>
                <source srcset="build/img/seal.webp" type="image/webp">
                <source srcset="build/img/seal.png" type="img/png">
                <img loading="lazy" src="build/img/seal.png" alt="book1">
                </picture><?php echo $value->publishing?></li>
        </ul>
        <a class="button-block" href="/blog_sobreliteratura/review.php?id=<?php echo $value->id?>">Ver reseñas</a>
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
            ?>