<?php 
     $header_text = 'Crear reseña';
     require '../../includes/functions.php';
     includeTemplate("header", $header_text);
?>

    <main class="container">
        <a href="../index.php" class="button-inline margin-bottom">Volver</a>

        <form action="" class="form">
            <fieldset>
                <legend>Informarción General</legend>

                <label for="title">Titulo:</label>
                <input type="text" id="title" placeholder="Titulo de la reseña">

                <label for="author">Autor:</label>
                <input type="text" id="author" placeholder="Autor del libro">
                
                <label for="cover">Portada:</label>
                <input type="file" id="cover" accept="image/jpeg, image/png">

                <label for="review">Reseña:</label>
                <textarea id="review"></textarea>

            </fieldset>


            <fieldset>
                <legend>Detalles del libro</legend>
                <label for="rating">Rating:</label>
                <input type="number" id="rating" placeholder="Del 1 al 10" min="1" max="10">

                <label for="publishing">Editorial:</label>
                <input type="text" id="publishing" placeholder="Ej: Alianza">

                <label for="date">Fecha:</label>
                <input type="date" id="date" placeholder="Fecha de finalización">

            </fieldset>
            

            <fieldset>
                <legend>Escrito de la reseña</legend>
               <select>
                   <option value="1">Sergio</option>
                   <option value="2">Jazmón</option>
               </select>

            </fieldset>
        </form>

        <input type="submit" value="CREAR RESEÑA" class="button-inline">
    </main>

<?php 
    includeTemplate("Footer", $header_text);
?>