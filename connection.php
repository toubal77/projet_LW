<?php

require_once('config.php');

class Db {
    private static $conn = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        try {
            if (!self::$conn) {
                $pdo = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";", DB_USER, DB_PASS);
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

