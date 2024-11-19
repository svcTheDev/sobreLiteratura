<?php 
    require '../../includes/functions.php';

    $auth = checkAuth();

    if (!$auth) {
        echo "esta aqui?";
        // header('location: ../index.php');
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require '../../includes/config/database.php';

    $db = connectDB();

    $errors = [];

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: ../index.php');
    }
    


        $queryUpdate = "SELECT * FROM reviews WHERE id = $id";

        $resultUpdate = mysqli_query($db, $queryUpdate);
        $review = mysqli_fetch_assoc($resultUpdate);

            
        echo '<pre>'; 
        var_dump($review);
        echo '</pre>';

            $title = $review['title'];
            $author = $review['author'];
            $imageName = $review['image'];
            $description = $review['description'];
            $rating = $review['rating'];  
            $publishing = $review['publishing'];
            $dateReview = $review['dateReview'];
            $user = $review['users_id'];

            $queryWriter = "SELECT * FROM users WHERE id = $user";

            $result = mysqli_query($db, $queryWriter);
    
        if($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $author = mysqli_real_escape_string($db, $_POST['author']);
            $description = mysqli_real_escape_string($db, $_POST['description']);
            $rating = mysqli_real_escape_string($db, $_POST['rating']);
            $publishing = mysqli_real_escape_string($db, $_POST['publishing']);
            $dateReview = mysqli_real_escape_string($db, $_POST['dateReview']);
            $user = mysqli_real_escape_string($db, $_POST['users_id']);


            
            $cover = $_FILES['cover'];
            
            $upload_dir = '../../uploads/';
            
            if(!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }

            $imageName = '';
    
    
            if ($cover['name']) {

                unlink($upload_dir . $review['image']);

                $temp = $_FILES['cover']['tmp_name'];

                $imageName = md5( uniqid( rand(), true)) . ".jpg";
    
                $target_file = $upload_dir . $imageName;
    
                move_uploaded_file($temp, $target_file);
            } else {
                $imageName = $review['image'];
            }

            // if(!$imageName) {

            //     $cover = $_FILES['image'];
                
            //     $upload_dir = '../../uploads/';
                
            //     if(!is_dir($upload_dir)) {
            //         mkdir($upload_dir);
            //     }
                
            //     $temp = $_FILES['image']['tmp_name'];
                
            //     $imageName = md5( uniqid( rand(), true)) . ".jpg";
                
            //     $target_file = $upload_dir . $imageName;
                
            //     move_uploaded_file($temp, $target_file);


                $measure = 1000 * 1000;
    
        
            //     if($cover['name'] || $cover['error']) {
            //         $errors[] = "! La imagen es obligatoria";
            //     }
        
                if ($cover['size'] > $measure) {
                    $errors[] = "! La imagen es muy grande";
                }
            
    
            if (!$title) {
                $errors[] = "! Es necesario un título";
            }
    
            if (!$author) {
                $errors[] = "! Es necesario un autor";
            }
            if (strlen($description) < 20) {
                $errors[] = "! Debes escribir una reseña mayor a 20 caracteres";
            }
    
            if (!$rating) {
                $errors[] = "! Es necesario una calificación";
            }
    
            if (!$publishing) {
                $errors[] = "! Es necesario un editor";
            }
            if (!$dateReview) {
                $errors[] = "! Debe tener una fecha";
            }
    
            if (!$user) {
                $errors[] = "! Debes seleccionar un escritor";
            }
    
  
        

            if (empty($errors)) {
                $queryUpdate2 = "UPDATE reviews SET title = '$title', author='$author', image='$imageName', description='$description', rating='$rating', publishing='$publishing', dateReview='$dateReview', users_id='$user' WHERE id = $id";
                
                $resultUpdate2 = mysqli_query($db, $queryUpdate2);

                if ($resultUpdate2) {
                    echo "hola";
                    $_SESSION['errors'] = '✔ La reseña fue actualizada';
                    header('location: ../index.php');
                    exit;
                }
            } 
        }
            
    
    

     $header_text = 'Actualizar reseña';
     includeTemplate("header", $header_text);
?>

<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom" >Volver</a>
    
    <form method="POST" enctype="multipart/form-data" class="form">
        <fieldset>
            <legend>Informarción General</legend>
            
            <label for="title">Titulo:</label>
            <input type="text" value="<?php echo $title ?>" name="title" id="title" placeholder="Titulo de la reseña">
            
            <label for="author">Autor:</label>
            <input type="text" value="<?php echo $author ?>" name="author" id="author" placeholder="Autor del libro">
            
            <label for="image">Portada:</label>
            <input type="file" name="cover" id="image" accept="image/jpeg, image/png">
            
            <label for="review">Reseña:</label>
            <textarea name="description" id="review"><?php echo $description ?></textarea>
            
        </fieldset>
        
        
        <fieldset>
            <legend>Detalles del libro</legend>
            <label for="rating">Rating:</label>
            <input type="number" value="<?php echo $rating ?>" name="rating" id="rating" placeholder="Del 1 al 10" min="1" max="10">
             
            <label for="publishing">Editorial:</label>
            <input type="text" value="<?php echo $publishing ?>" name="publishing" id="publishing" placeholder="Ej: Alianza">
            
            <label for="dateReview">Fecha:</label>
            <input type="date" value="<?php echo $dateReview ?>" name="dateReview" id="dateReview" placeholder="Fecha de finalización">
            
        </fieldset>



        <fieldset>
            <legend>Escritor de la reseña</legend>
            <select name="users_id">
                <option value="">--Seleccionar Escritor--</option>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <option <?php echo $user === $row['id'] ? 'selected' : ''; ?>
                    value="<?php echo $row['id'] ?>">
                    <?php echo $row['name'] . " " . $row['lastname']; ?>
                </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <?php foreach ($errors as $error) : ?>
                <div class="alert error">
                <?php echo $error?> 
                </div>
            <?php endforeach; ?>
        
     
        <input type="submit" id="create" value="ACTUALIZAR" class="button-inline">
        </form>
    </main>

<?php 
    includeTemplate("Footer", $header_text);
?>