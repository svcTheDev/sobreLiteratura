<?php 
    require '../../includes/app.php';

 
    use App\Review;
    use App\Users;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $db = connectDB();


    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: ../index.php');
    }
   

    $review = Review::find($id);
    $users = Users::all();

        $errors = Review::getErrors();


        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $args = $_POST['review'];
     

            
           
            $imageName = md5( uniqid( rand(), true)) . ".jpg";

            if ($_FILES['review']['tmp_name']['cover']) {

                $manager = new Image(new Driver()); 
                $image = $manager->read($_FILES['review']['tmp_name']['cover'])->cover(800, 600);

                // $image = Image::read($_FILES['cover']['tmp_name']);
                $review->setImage($imageName);
            }


            $review->sincronize($args);

            $errors = $review->validate();

  
            if (empty($errors)) {
                if ($_FILES['review']['tmp_name']['cover']) {

                $image->save(UPLOAD_DIR . $imageName);
                }
                
                $result = $review->saveReview();
            }
        }
            
    
    

     $header_text = 'Actualizar reseña';
     includeTemplate("header", $header_text);
?>

<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom" >Volver</a>
    
    <form method="POST" enctype="multipart/form-data" class="form">
        
        <?php 
        
        include '../../includes/templates/form_reviews.php';
        
        ?>

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