<?php

abstract class conexaoDB
{
    private static $pdo;

    public function __construct()
    {
        
    }

    public static function conexao()
    {
        if (self::$pdo == null){
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=biblioteca_aps", "root", "morango19");
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
        return self::$pdo;
    }

}
