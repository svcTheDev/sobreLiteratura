<?php 

    namespace App; // The name was bestowed on the composer.json

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    class Users extends ActiveRecord {
        protected static $table = 'users';

        protected static $columnDB = ['id', 'name', 'lastname'];

        public $id;
        public $name;
        public $lastname;

        public function __construct($args = []) {
            $this->id = $args['id'] ?? NULL;
            $this->name = $args['name'] ?? '';
            $this->lastname = $args['lastname'] ?? '';
        }
   
        public function validate() {
    
            if (!$this->name) {
                self::$errors[] = "! Es necesario un nombre";
            }
    
            if (!$this->lastname) {
                self::$errors[] = "! Es necesario un apellido";
            }

            return self::$errors;

    
    }   

    
    }


?>
