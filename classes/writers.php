<?php 

    namespace App; // The name was bestowed on the composer.json

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    class Writers {
        protected static $db;
        protected static $columnWriters = [
            'id',
            'name',
            'lastname'
        ];

        public $id;
        public $name;
        public $lastname;

        public static function setDB($database) {
            self::$db = $database;
        }

        public function __constructor($args = []) {
            $this->id = $args['id'];
            $this->name = $args['name'];
            $this->lastname = $args['lastname'];
        }
        

    }



?>
