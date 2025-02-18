<?php 

namespace App;

class Review extends ActiveRecord {
    protected static $table = 'Reviews';

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

    public function __construct($args = []) {
        $this->id = $args['id'] ?? NULL;
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

    public function validate() {

        
        echo '<pre>'; 
        var_dump($this->id);
        echo '</pre>';

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

        if (!$this->users_id) {
            self::$errors[] = "! Elige un escritor madafaka";
        }

        return self::$errors;
    }

}


?>