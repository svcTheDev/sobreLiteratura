<?php 

    require '../includes/app.php';

    // checkAuth();

    // $auth = checkAuth();

    // if (!$auth) {
    //     header('location: ../index.php');
    // }

    

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use App\Review;

    $review = Review::all();

    
    $db = connectDB();

    $query = "SELECT * FROM reviews";

    $resultQuery;

            

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
        $deleteID = $_POST['id'];

        $deleteID = filter_var($deleteID, FILTER_VALIDATE_INT);


        echo '<pre>'; 
        var_dump($_POST['image']);
        echo '</pre>';

        $upload_dir = '../uploads/';
        
        unlink($upload_dir . $_POST['image']);

        if ($deleteID) {
            $queryDelete = "DELETE FROM reviews WHERE id = $deleteID";
        
            $resultQuery = mysqli_query($db, $queryDelete);
          
        }

        echo '<pre>'; 
        var_dump($value2);
        echo '</pre>';

    }

    $resultQuery = mysqli_query($db, $query);

     $header_text = 'Administrador de reseñas';
     includeTemplate("header", $header_text);


  

?>
    
    <main class="container">

        <a href="/blog_sobreliteratura/admin/reviews/create.php" class="button-inline">Nueva reseña</a>

        <table class="reviews">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
            <?php 
            foreach ($review as $key => $value) {
                

            // if ($result = $review->num_rows) {
                // Loop through each row
                    ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->title; ?></td>
                        <td><?php echo $value->author; ?></td>

                        <!--  -->
                        <td><img class="image_review" src="<?php echo "../uploads/" . $value->image; ?>" alt="Image"></td>
                        <td>

                            <form method="POST">

                                <input type="hidden" name="image" value="<?php echo $value->imagen ?>">

                                <input type="hidden" name="id" value="<?php echo $value->id ?>">

                                <input type="submit" class="button-block" value="Eliminar"> 
                            </form>

                            <a href="reviews/update.php?id=<?php echo $value->id ?>">
                                <button class="button-block">Editar</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            
        
            ?>
                </tbody>
                
                
        </table>

        
    </main>

<?php 
    includeTemplate("Footer", $header_text);
    session_destroy();

/* 
                while ($row = mysqli_fetch_assoc($resultQuery)) {


    } else {
                ?>
                <tr>
                    <td colspan="5">Aún no hay ninguna reseña</td>
                </tr>
                <?php
            } */

?>
