<?php 

function connectDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'reviews_crud'); 

    if (!$db) {
        echo 'no se conectó';
        exit();
    }

    return $db;
}
 