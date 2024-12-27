<?php
// require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');

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