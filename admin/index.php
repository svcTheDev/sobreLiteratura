<?php 

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require '../includes/config/database.php';

     $header_text = 'Administrador de reseñas';
     require '../includes/functions.php';
     includeTemplate("header", $header_text);

     $db = connectDB();

     $query = "SELECT * FROM reviews";

     $result = mysqli_query($db, $query);

     echo '<pre>'; 
     var_dump($result->fetch_assoc());
     echo '</pre>';
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
            
                if ($result->num_rows > 0) {
                
                while ($row = mysqli_fetch_assoc($result)) : ?>
                       
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><img class="image_review" src="<?php echo "../uploads/"  . $row['image']; ?>"></td>
                        <td>
                            <button class="button-block">Eliminar</button>
                            <button class="button-block">Editar</button>
                        </td>
                    </tr>
                </tbody>
                <?php endwhile; } ?>
            
        </table>

        
    </main>

<?php 
    includeTemplate("Footer", $header_text);
    session_destroy();
?>