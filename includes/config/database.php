<?php 

function connectDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'reviews_crud'); 

    if (!$db) {
        echo 'no se conectó';
        exit();
    }

    return $db;
}
 