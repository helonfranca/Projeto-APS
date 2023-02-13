<?php

class conexaoAutor{

    private $pdo;
    private $conn;

    public function __construct(){
        $this->conn = $this->conexao();
    }    
   
    public function conexao() {
        try {
            $this->pdo = new PDO("mysql:host=localhost:3306;dbname=testebibli", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $this->pdo;
    }
  
    public function setAutor($nome,$telefone,$DataDeNascimento,$sexo, $CurriculoLattes, $instituicao){
        $stmt = $this->conn->prepare("INSERT INTO autor (Nome, Telefone, DataDeNascimento, Sexo, CurriculoLattes, Instituição) VALUES (?,?,?,?,?,?)");

        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $telefone, PDO::PARAM_INT);
        $stmt->bindParam(3, $instituicao, PDO::PARAM_STR);
        $stmt->bindParam(4, $CurriculoLattes, PDO::PARAM_STR);
        $stmt->bindParam(5, $DataDeNascimento, PDO::PARAM_INT);
        $stmt->bindParam(6, $sexo, PDO::PARAM_STR);
    
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

}


?>