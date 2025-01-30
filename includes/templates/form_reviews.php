<fieldset>
            <legend>Informarción General</legend>
            
            <label for="title">Titulo:</label>
            <input type="text" value="<?php echo s($review->title) ?>" name="review[title]" id="title" placeholder="Titulo de la reseña">
            
            <label for="author">Autor:</label>
            <input type="text" value="<?php echo s($review->author) ?>" name="review[author]" id="author" placeholder="Autor del libro">
            
            <label for="cover">Portada:</label>
            <input type="file" name="review[cover]" id="cover" accept="image/jpeg, image/png">
            
            <label for="review">Reseña:</label>
            <textarea name="review[description]" id="review"><?php echo s($review->description) ?></textarea>
            
        </fieldset>
        
        
        <fieldset>
            <legend>Detalles del libro</legend>
            <label for="rating">Rating:</label>
            <input type="number" value="<?php echo s($review->rating) ?>" name="review[rating]" id="rating" placeholder="Del 1 al 10" min="1" max="10">
             
            <label for="publishing">Editorial:</label>
            <input type="text" value="<?php echo s($review->publishing) ?>" name="review[publishing]" id="publishing" placeholder="Ej: Alianza">
            
            <label for="dateReview">Fecha:</label>
            <input type="date" value="<?php echo s($review->dateReview) ?>" name="review[dateReview]" id="dateReview" placeholder="Fecha de finalización">
            
        </fieldset>



        <fieldset>
            <legend>Escritor de la reseña</legend>

            <select name="$review[review]->users_id">
                <option selected value="">--Seleccionar Escritor--</option>
                <option value=""> <?php echo $writers->name; ?> </option>
            </select>
        </fieldset>