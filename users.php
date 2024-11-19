<?php 

// 1 

require 'includes/config/database.php';

$db = connectDB();

// 2 

$username = 'Esteban';
$lastname = 'Campos';
$email = 'sergio.vargas@gmail.com';
$pass = '123';
$password = password_hash($pass, PASSWORD_DEFAULT);

// 3 

$query = "INSERT INTO admins (email, password) VALUES ('$email', '$password')";

// 4

echo $query;

mysqli_query($db, $query);


