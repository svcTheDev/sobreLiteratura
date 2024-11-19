<?php 

require '../includes/functions.php';

$auth = checkAuth();

if (!$auth) {
    header('location: ../index.php');
}
echo '<pre>'; 
var_dump($_SESSION);
echo '</pre>';

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require '../includes/config/database.php';

    
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
    
            $_SESSION['errors'] = '✔ La reseña fue Eliminada';        
        }

    }

    $resultQuery = mysqli_query($db, $query);

     $header_text = 'Administrador de reseñas';
     includeTemplate("header", $header_text);


  

?>
    
    <main class="container">
    <?php 
        if (isset($_SESSION['errors'])) {
    ?>
        <div class="alert success">
            <?php echo $_SESSION['errors']; ?>
        </div>
    <?php
        }
    ?>
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
                                
            if ($resultQuery->num_rows > 0) {
                // Loop through each row
                while ($row = mysqli_fetch_assoc($resultQuery)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><img class="image_review" src="<?php echo "../uploads/" . $row['image']; ?>" alt="Image"></td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                <input type="submit" class="button-block" value="Eliminar"> 
                            </form>

                            <a href="reviews/update.php?id=<?php echo $row['id']; ?>">
                                <button class="button-block">Editar</button>
                            </a>
                        </td>
                    </tr>
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
                </tbody>
                
                
        </table>

        
    </main>

<?php 
    includeTemplate("Footer", $header_text);
    session_destroy();
?>