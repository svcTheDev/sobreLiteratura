<?php 

        
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $header_text = 'Iniciar sesión';
    require 'includes/functions.php';
    includeTemplate("header", $header_text);
    
    require 'includes/config/database.php';
    $db = connectDB();

    $errors = [];

    $email = '';
    $password = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
            $errors[] = 'Email necesario';
        }

        if(!$password) {
            $errors[] = 'Contraseña necesaria';
        }

        if(empty($errors)){
            $query = "SELECT * FROM admins WHERE email = '${email}'";

            $result = mysqli_query($db, $query);

            $row = mysqli_fetch_assoc($result);

            if ($result->num_rows) {
                
                echo '<pre>'; 
                var_dump($row['password']);
                echo '</pre>';

                $auth = password_verify($password, $row['password']);
                
              

                if ($auth) {
                    session_start();

                    $_SESSION['errors'] = '✔ La reseña fue subida';
                    $_SESSION['login'] = true;

                    header('location: admin/index.php');
                } else {
                    $errors[] = "El password es incorrecto";
                }
// sergio.vargas@gmail.com


            } else {
                $errors[] = "El usuario no existe";
            }
        }
    }


?>

    <main class="container">
        
    <form method="POST" action="/blog_sobreliteratura/login.php" class="form">
        <fieldset>
            <legend>Iniciar sesión</legend>

            <?php foreach ($errors as $error) : ?>
                <div class="alert error">
                <?php echo $error?> 
                </div>
            <?php endforeach; ?>
             
            <label for="email">Titulo:</label>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email ?>" required>
            
            <label for="password">Autor:</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" value="<?php echo $password ?>" required>
            
            <input type="submit" value="Iniciar sessión" class="button-block">

        </fieldset>
        </form>
    </main>

<?php 
    includeTemplate("footer", $header_text);
?>
   