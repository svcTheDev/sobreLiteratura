<?php 

    // var_dump($_SESSION);    


    require '../../includes/app.php';

    // $auth = checkAuth();

    // if (!$auth) {
    //     header('location: ../../index.php');
    // }

    use App\Review;
    use App\Writers;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;
    // user Intervention

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $db = connectDB();

    $review = new Review;

    $errors = Review::getErrors();

    echo '<pre>'; 
    var_dump($errors);
    echo '</pre>';

    $queryWriter = "SELECT * FROM users";

    $result = mysqli_query($db, $queryWriter);

 


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $review = new Review($_POST);
        $writers = new Writers($_POST);

        
        $cover = $_FILES['cover'];

     

        $imageName = md5( uniqid( rand(), true)) . ".jpg";

        if ($_FILES['cover']['tmp_name']) {

            $manager = new Image(new Driver()); 
            $image = $manager->read($_FILES['cover']['tmp_name'])->cover(800, 600);

            // $image = Image::read($_FILES['cover']['tmp_name']);
            $review->setImage($imageName);
        }

        $errors = $review->validate();

        
        if (empty($errors)) {

            $upload_dir = '../../uploads/';

            if(!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }
 
                $result = $review->saveReview();
            
                $image->save($upload_dir . $imageName);
          
                if ($result) {
                    header('location: /admin?result=1');
                }
            }

        }



     $header_text = 'Crear reseña';
     includeTemplate("header", $header_text);
?>


<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom" >Volver</a>
    
    <form method="POST" action="/blog_sobreliteratura/admin/reviews/create.php" enctype="multipart/form-data" class="form">
        <?php 
        include '../../includes/templates/form_reviews.php';
        ?>

        <?php foreach ($errors as $error) : ?>
                <div class="alert error">
                <?php echo $error?> 
                </div>
            <?php endforeach; ?>
        
     
        <input type="submit" id="create" name="reviews" value="<?php echo isset($_GET['actualizar']) ? "ACTUALIZAR" : "CREAR"; ?>" class="button-inline">
        </form>
    </main>
   
<?php 
/*    <?php foreach($writers as $writer) { ?>
                    <option <?php echo $review->users_id === $writer->id ? 'selected' : '' ?> value="<?php echo $writer->id ?>"><?php echo $writer->name . " " . $writer->lastname; ?>
                <?php  } ?> */
    includeTemplate("Footer", $header_text);
?>