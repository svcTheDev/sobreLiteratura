<?php 
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    require 'includes/config/database.php';

    
    $db = connectDB();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: index.php');
    }

    $query = "SELECT * FROM reviews WHERE id = $id";

    $resultQuery = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($resultQuery);

    if($resultQuery->num_rows === 0) {
        header('location: index.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SobreLiteratura</title>
    <link rel="stylesheet" href="/blog_sobreliteratura/build/css/app.css">   
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Sevillana&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="header start" >
        <div class="heading container-header">
            <div class="logo">
                <a href="/blog_sobreliteratura/index.php"><img src="/blog_sobreliteratura/src/img/Logo_final_2copia_upscayl_4.png" alt="logo"></a>
            </div>
        </div>
        <nav class="nav container-header">
            <a href="about.php">Sobre mí</a>
            <a href="reviews.php">Reseñas</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contacto</a>
        </nav>
        <div class="header-text container-header">
             <p><?php echo $row['title']; ?> </p>
        </div>
    </header>

    <div class="review_container">
        <picture>
            <img class="coverbook" loading="lazy" src="<?php echo "uploads/" . $row['image']; ?>" alt="book1">
        </picture>

        <P><?php echo $row['description']?></P>
        <p><?php echo $row['author']?></p>
        <div class="iconColumn">
            <div>
                <picture>
                    <source srcset="build/img/checkbox.webp" type="image/webp">
                    <source srcset="build/img/checkbox.png" type="img/png">
                    <img class="image" loading="lazy" src="build/img/checkbox.png" alt="book1">
                </picture>
                <?php echo $row['dateReview']?>
            </div>
            <div>
                <picture>
                    <source srcset="build/img/seal.webp" type="image/webp">
                    <source srcset="build/img/seal.png" type="img/png">
                    <img class="image" loading="lazy" src="build/img/seal.png" alt="book1">
                </picture>
                <?php echo $row['publishing']?>
            </div>
        
        </div> 
    </div>
    <?php 
    require 'includes/functions.php';
    includeTemplate("Footer", $header_text = 0);
?>
