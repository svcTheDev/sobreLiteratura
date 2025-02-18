<?php 

    require '../../includes/app.php';

    use App\Users;


    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    $user = Users::find($id);
    


    $errors = Users::getErrors();

    if (!$id) {
        header('location: ../index.php');
    }   


    if($_SERVER["REQUEST_METHOD"] == "POST") {

    
        $args = $_POST['user'];


        $user->sincronize($args);
        


        $errors = $user->validate();

        if (empty($errors)) {
            $result = $user->saveReview();
        }

        
    } 

    $header_text = 'Actualizar usuario';
    includeTemplate("header", $header_text);
?>

<main class="container">
    
    <a href="../index.php" class="button-inline margin-bottom" >Volver</a>
    
    <form method="POST" class="form">
        <?php 
        include '../../includes/templates/form_users.php';
        ?>

        <input type="submit" id="create" value="ACTUALIZAR" class="button-inline">

    </main>
   
<?php 
    includeTemplate("Footer", $header_text);
?>