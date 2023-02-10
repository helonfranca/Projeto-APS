<?php
class Db {
    private $pdo;

    public function getConnection() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=projeto_aps", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $this->pdo;
    }

}

// // Example usage
// $db = new Db();
// $conn = $db->getConnection();







