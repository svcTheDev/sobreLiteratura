<?php 

    require '../../includes/app.php';

    use App\Users;

    $user = new Users;

    $errors = [];

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $user = new Users($_POST['user']);

      
        $errors = $user->validate();
      

        
        if (empty($errors)) {
            $user->saveReview();
        }
    } 

    $header_text = 'Crear usuario';
    includeTemplate("header", $header_text);
?>

<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom" >Volver</a>
    
    <?php foreach ($errors as $error) : ?>
                <div class="alert error">
                <?php echo $error?> 
                </div>
            <?php endforeach; ?>

    <form method="POST" action="/blog_sobreliteratura/admin/users/create.php" class="form">
        <?php 
        include '../../includes/templates/form_users.php';
        ?>

        <input type="submit" id="users" value="Crear usuario" class="button-inline">

    </main>
   
<?php 
    includeTemplate("Footer", $header_text);
?>