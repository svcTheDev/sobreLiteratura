<?php 
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);

    require 'functions.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    use App\Review;

    $review = new Review();
     