<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../../includes/config/database.php';

    $db = connectDB();
    
    $queryWriter = "SELECT * FROM users";
    
    $result = mysqli_query($db, $queryWriter);

    $errors = [];

    $title = "";
    $author = "";
    $description = "";
    $rating = "";  
    $publishing = "";
    $dateReview = "";
    $user = "";
    $created = date("y.m.d");



    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];
        $publishing = $_POST['publishing'];
        $dateReview = $_POST['dateReview'];
        $user = $_POST['users_id'];

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
            $query = "INSERT INTO reviews (title, author, description, rating, publishing, dateReview   , users_id, created) VALUES ('$title', '$author', '$description', '$rating', '$publishing', '$dateReview', '$user', '$created')";
        
            $result = mysqli_query($db, $query);

            if ($result) {

                header('location: create.php');
            }
        } 

    }
    

     $header_text = 'Crear reseña';
     require '../../includes/functions.php';
     includeTemplate("header", $header_text);
?>


<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom">Volver</a>
    
    <form method="POST" action="/blog_sobreliteratura/admin/reviews/create.php" class="form">
        <fieldset>
            <legend>Informarción General</legend>
            
            <label for="title">Titulo:</label>
            <input type="text" value="<?php echo $title ?>" name="title" id="title" placeholder="Titulo de la reseña">
            
            <label for="author">Autor:</label>
            <input type="text" value="<?php echo $author ?>" name="author" id="author" placeholder="Autor del libro">
            
            <label for="cover">Portada:</label>
            <input type="file" id="cover" accept="image/jpeg, image/png">
            
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
        
        <input type="submit" id="create" value="CREAR RESEÑA" class="button-inline">


        </form>
    </main>
   
<?php 
    includeTemplate("Footer", $header_text);
?>