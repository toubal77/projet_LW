<?php
  class Db {
   private static $conn = NULL;
   private $host = 'localhost';
   private $username = 'root';
   private $password = '';
   private $dbname = 'projetLW';
    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$conn)) {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connexion echoue: " . $this->conn->connect_error);
        }else{
          echo "connexion reussi";
        }
      }
      return self::$conn;
    }


  }
?>