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
    use App\Users;

    $review = Review::all();
    $users = Users::all();

    $db = connectDB();

    $query = "SELECT * FROM reviews";

    $resultQuery;

            

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

       
   
        $deleteID = $_POST['id'];

        $deleteID = filter_var($deleteID, FILTER_VALIDATE_INT);

        if ($deleteID) {
        $type = $_POST['type'];
       
        if(valideContentType($type)){

            if ($type === 'review') {
            
                $upload_dir = '../uploads/';
                
                unlink($upload_dir . $_POST['image']);
                $review = Review::find($deleteID);
                $review->delete();
            } else if ($type === 'user'){
            
                $users = Users::find($deleteID);
                $users->delete();
            }
        }
        }

      
        // if ($deleteID) {
        //     $review = Review::find($deleteID);

            
        //     $review->delete();
         
        // }

     
    }

    $resultQuery = mysqli_query($db, $query);

     $header_text = 'Administrador de reseñas';
     includeTemplate("header", $header_text);


?>
    
    <main class="container">

        <a href="/blog_sobreliteratura/admin/reviews/create.php" class="button-inline">Nueva reseña</a>
        <a href="/blog_sobreliteratura/admin/users/create.php" class="button-inline">Nuevo usuario</a>

        <h2>Reseñas</h2>
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

                                <input type="hidden" name="image" value="<?php echo s($value->image) ?>">

                                <input type="hidden" name="id" value="<?php echo s($value->id) ?>">
                                <input type="hidden" name="type" value="<?php echo 'review'; ?>">

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
        <h2 class="center">Escritores</h2>
        <table class="reviews">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
            <?php 
            foreach ($users as $user) {
                

            // if ($result = $review->num_rows) {
                // Loop through each row
                    ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->lastname; ?></td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="id" value="<?php echo s($user->id) ?>">

                                <input type="hidden" name="type" value="<?php echo 'user'; ?>">

                                <input type="submit" class="button-block" value="Eliminar"> 
                            </form>

                            <a href="users/update.php?id=<?php echo $user->id ?>">
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
