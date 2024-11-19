<?php
require 'app.php';

function includeTemplate($name, $header_text) {
    include TEMPLATES_URL . "/{$name}.php";
}

function checkAuth() {

    session_start();
    
    $auth = $_SESSION['login'];

    if($auth) {
        return true;
    }

    return false;
}