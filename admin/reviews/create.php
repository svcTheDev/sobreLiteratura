<?php 

    require '../../includes/config/database.php';

    $db = connectDB();

    echo '<pre>'; 
    var_dump($_POST['title']);
    echo '</pre>';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $rating = $_POST['rating'];
        $publishing = $_POST['publishing'];
        $date = $_POST['date'];
        $users = $_POST['users_id'];

        $query = "INSERT INTO reviews (title, author, rating, publishing, date, users_id) VALUES ('$title', '$author', '$rating', '$publishing', '$date', '$users')";

        $result = mysqli_query($db, $query);
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
                <input type="text" name="title" id="title" placeholder="Titulo de la reseña">

                <label for="author">Autor:</label>
                <input type="text" name="author" id="author" placeholder="Autor del libro">
                
                <label for="cover">Portada:</label>
                <input type="file" id="cover" accept="image/jpeg, image/png">

                <label for="review">Reseña:</label>
                <textarea id="review"></textarea>

            </fieldset>


            <fieldset>
                <legend>Detalles del libro</legend>
                <label for="rating">Rating:</label>
                <input type="number" name="rating" id="rating" placeholder="Del 1 al 10" min="1" max="10">

                <label for="publishing">Editorial:</label>
                <input type="text" name="publishing" id="publishing" placeholder="Ej: Alianza">

                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" placeholder="Fecha de finalización">

            </fieldset>
            

            <fieldset>
                <legend>Escritor de la reseña</legend>
               <select name="users_id">
                   <option value="1">Sergio</option>
                   <option value="2">Jazmón</option>
               </select>

            </fieldset>
        <input type="submit" value="CREAR RESEÑA" class="button-inline">
        </form>
    </main>

<?php 
    includeTemplate("Footer", $header_text);
?>