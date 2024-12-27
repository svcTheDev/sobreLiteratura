<?php

namespace App; // The name was bestowed on the composer.json

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Review {

    protected static $errors = [];
    protected static $db;
    protected static $columnDB = [
        'id',
        'title',
        'author',
        'image',
        'description',
        'rating',
        'publishing',
        'dateReview',
        'users_id',
        'created'
    ];

    public $id;
    public $title;
    public $author;
    public $image;
    public $description;
    public $rating;
    public $publishing;
    public $dateReview;
    public $users_id;
    public $created;

    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->author = $args['author'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rating = $args['rating'] ?? '';
        $this->publishing = $args['publishing'] ?? '';
        $this->dateReview = $args['dateReview'] ?? '';
        $this->users_id = $args['users_id'] ?? '';
        $this->created = date("y.m.d");
    }


    public function saveReview() {
        $attributes = $this->sanitizeAttributes();

        
        $query = ' INSERT INTO reviews (';
        $query .= join(', ', array_keys($attributes));
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";

        echo '<pre>'; 
        var_dump($query);
        echo '</pre>';
        
        $result = self::$db->query($query);
        
        echo "guardado en la base de datos";
    }

    // Identify and join the attributes 
    public function setAttributes() {
        $attributes = [];
        foreach (self::$columnDB as $column ) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function setImage($imageName) {
        if ($imageName) {
            // asignar el atributo a la imagen
            $this->image = $imageName;
        }
    }

    public function sanitizeAttributes() {
        $attributes = $this->setAttributes();
        $sanitized = [];
        foreach ($attributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    public static function getErrors() {
        return self::$errors;
    }

    public  function validate() {
        if (!$this->title) {
            self::$errors[] = "! Es necesario un título";
        }

        if (!$this->author) {
            self::$errors[] = "! Es necesario un autor";
        }
        if (!$this->image) {
            self::$errors[] = "! Es necesario una imagen";
        }
        if (!$this->description) {
            self::$errors[] = "! Es necesario una descripción y debe tener al menos 20 carateres";
        }
        if (!$this->rating) {
            self::$errors[] = "! Es necesario un rating";
        }
        if (!$this->publishing) {
            self::$errors[] = "! Es necesario una editorial";
        }
        if (!$this->dateReview) {
            self::$errors[] = "! Es necesario una fecha";
        }

        return self::$errors;
    }

    public static function all () {
        $query = "SELECT * FROM reviews";

        // $result = self::$db->query($query);

        $result = self::checkingSQL($query);
        
        return $result;
    }

    public static function checkingSQL($query) {
        $result = self::$db->query($query);

        $array = [];
        while($log = $result->fetch_assoc()){
            $array[] = self::createObj($log);
        }

        return $array;
    }

    protected static function createObj($log) {
        $object = new self;

        foreach ($log as $key => $value) {
            if (property_exists($object, $key))  {
                $object->$key = $value;
            }
        }
  
        return $object;
    }
}   

?>