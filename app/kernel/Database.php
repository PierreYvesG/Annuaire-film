<?php

class Database {
   static protected $_instance = null;
   protected $_db;

   static public function getInstance() {
      if( is_null(self::$_instance) )
         self::$_instance = new Database();
      return self::$_instance;
   }

   protected function __construct() {
      // A faire : fichier de config
      $this->_db = new PDO(
         "mysql:host=localhost;dbname=bddfilms;charset=utf8",
         "pierreyvesg",
         "online@2017"
      );
   }

   public function __call($method, array $arg) {
      // Si on appelle une méthode qui n'existe pas, on 
      // delegue cet appel à l'objet PDO $this->_db
      return call_user_func_array(array($this->_db, $method), $arg);
   }



}



