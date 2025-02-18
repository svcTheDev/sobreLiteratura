<?php

namespace App; // The name was bestowed on the composer.json

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ActiveRecord {

    protected static $errors = [];
    protected static $db;
    protected static $columnDB = [];
    protected static $table = '';

    public static function setDB($database) {
        self::$db = $database;
    }

    public function saveReview() {

        if(!is_null($this->id)) {
            $this->update();
        } else {
            $this->create();
        }
    }

    public function create() {
        $attributes = $this->sanitizeAttributes();
        
        $query = ' INSERT INTO ' . static::$table . ' (';
        $query .= join(', ', array_keys($attributes));
        $query .= ") VALUES (' ";
        $query .= join("', '", array_values($attributes));
        $query .= " ') ";
        
        $result = self::$db->query($query);
        
        echo "guardado en la base de datos";

        if ($result) {
            header('location: /blog_sobreliteratura/admin/index.php');
        }
    }

    public function update() {
        $attributes = $this->sanitizeAttributes();

        $values = [];
        foreach ($attributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(', ', $values );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
    
        // exit();

        $result = self::$db->query($query);

        echo "actualizado en la base de datos";

        if ($result) {
            header('location: /blog_sobreliteratura/admin/index.php?=result=2');
        }

    }

    public function delete() {
        
        $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        
        $result = self::$db->query($query);

        if($result) {
            $this->deleteImage();
            header('location: /blog_sobreliteratura/admin/index.php?resultado=3');
        }

    }

    // Identify and join the attributes 
    public function setAttributes() {
        $attributes = [];
        foreach (static::$columnDB as $column ) {
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function setImage($imageName) {
           
        if (!is_null($this->id)) {
            $this->deleteImage();
        }

        echo '<pre>'; 
        var_dump($this->image);
        echo '</pre>';
        // exit();
        
        if ($imageName) {
            // asignar el atributo a la imagen
            $this->image = $imageName;
        }
      
    }

    public function deleteImage () {
        // $upload_dir = '../uploads/';
       
        $exists = file_exists(UPLOAD_DIR . $this->image);
        if($exists) {
            unlink(UPLOAD_DIR . $this->image);
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
        return static::$errors;
    }

    public function validate() {

        return static::$errors;
    }

    public static function all () {
        $query = "SELECT * FROM " . static::$table;

        // $result = self::$db->query($query);

        $result = self::checkingSQL($query);
        
        return $result;
    }

    public static function find($id) {
    
        $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
      
        $result = self::checkingSQL($query);

        return array_shift($result);
    }

    public static function checkingSQL($query) {
        $result = self::$db->query($query);

        $array = [];
        while($log = $result->fetch_assoc()){
            $array[] = static::createObj($log);
        }

        return $array;
    }

    protected static function createObj($log) {
        $object = new static;

        foreach ($log as $key => $value) {
            if (property_exists($object, $key))  {
                $object->$key = $value;
            }
        }
  
        return $object;
    }

    public function sincronize($args = []) {
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }


}   

?>