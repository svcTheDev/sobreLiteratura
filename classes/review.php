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
}

?>