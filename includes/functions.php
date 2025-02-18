<?php
// require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');
define('UPLOAD_DIR', __DIR__ . '/../uploads/');


function includeTemplate($name, $header_text) {
    include TEMPLATES_URL . "/{$name}.php";
}

function checkAuth() {

    session_start();
    
    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function s($html){
    $s = htmlspecialchars($html);
    return $s;
}

function valideContentType ($type) {
    $array = ['review', 'user'];

    return in_array($type, $array);
}