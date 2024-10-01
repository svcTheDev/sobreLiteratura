<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SobreLiteratura</title>
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Sevillana&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="header start" >
        <div class="heading container-header">
            <div class="logo">
                <a href="/blog_sobreliteratura/index.php"><img src="src/img/Logo_final_2copia_upscayl_4.png" alt="logo"></a>
            </div>
        </div>
        <nav class="nav container-header">
            <a href="about.php">Sobre mí</a>
            <a href="reviews.php">Reseñas</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contacto</a>
        </nav>
        <div class="header-text container-header">
            <?php 
            switch ($header_text) {
                case 1: ?>
                <p>Explora la literatura universal de una forma distinta</p>     
                <?php 
                    break;
                case 2: ?>
                 <p>Sobre mí</p>
                <?php
                    break;
                case 3: ?>
                 <p>Reseñas</p>
                <?php
                    break;
                case 4: ?>
                <p>Mi blog</p>  
                <?php 
                    break;
                case 5: ?>
                 <p>Contacto</p>
                <?php } ?>
        </div>
    </header>