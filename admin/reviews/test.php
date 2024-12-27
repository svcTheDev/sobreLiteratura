<?php 

    require '../../includes/app.php';


    use Intervention\Image\ImageManager;
    use Intervention\Image\Drivers\Imagick\Driver;
    
    // create new manager instance with desired driver
    $manager = new ImageManager(new Driver());
    
?>