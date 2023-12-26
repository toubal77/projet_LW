<?php

class Db {
    private static $conn = NULL;
    const DB_TYPE = 'mysql';
    const DB_NAME = 'projetLW';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        try {
            if (!self::$conn) {
                $pdo = new PDO(self::DB_TYPE . ":host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";", self::DB_USER, self::DB_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$conn = $pdo;
                return self::$conn;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
?>
