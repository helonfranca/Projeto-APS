<?php

require_once("conexaoDB.php");

class Autor extends Pessoa{

    private $conn;
    /** Get the value of id     */ 
    public function getId()
    {
        return $this->id;
    }
    /** Set the value of id */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

    }

    public function getDataDeNascimento()
    {
        return $this->DataDeNascimento;
    }
    public function setDataDeNascimento($DataDeNascimento)
    {
        $this->DataDeNascimento = $DataDeNascimento;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

    }
    public function getSexo()
    {
        return $this->sexo;
    }

    public function getCurriculoLattes()
    {
        return $this->CurriculoLattes;
    }
    public function setCurriculoLattes($CurriculoLattes)
    {
        $this->CurriculoLattes = $CurriculoLattes;

    }

    public function getInstituicao()
    {
        return $this->instituicao;
    }
    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;

    }


    public function cadastrarAutor($nome, $telefone, $DataDeNascimento, $sexo, $CurriculoLattes, $instituicao)
        {
          
            //$db = new conexaoDb();
           // $this->conn = $db->conexao();
            $this->conn = conexaoDB::conexao();

            $stmt = $this->conn->prepare("INSERT INTO autor (Nome, Telefone, Instituição, CurriculoLattes, DataDeNascimento, Sexo) 
            VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1, $nome, PDO::PARAM_STR);
            $stmt->bindParam(2, $telefone, PDO::PARAM_INT);
            $stmt->bindParam(3, $instituicao, PDO::PARAM_STR);
            $stmt->bindParam(4, $CurriculoLattes, PDO::PARAM_STR);
            $stmt->bindParam(5, $DataDeNascimento);
            $stmt->bindParam(6, $sexo, PDO::PARAM_STR);

            if ($stmt->execute() == true) {
                return true ;
            } else {
                return false;
            }
        }

    public static function listarAutores()
    {
        $conn = conexaoDB::conexao();

        $stmt = "SELECT * FROM autor ORDER BY Autor_ID DESC";

        $stmt = $conn->prepare($stmt);

        $stmt->execute();
        $resultado = array();

        $resultado = $stmt->fetchAll(PDO::FETCH_CLASS);

        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum registro");
        }

        return $resultado;
    }

    public static function deletarAutor(int $id): bool{

        $conn = conexaoDB::conexao();

        $sql = 'DELETE FROM autor WHERE Autor_ID = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    
    public static function verificarAutor(int $id){

        $conn = conexaoDB::conexao();

        $sql = 'SELECT * FROM autor WHERE Autor_ID =?';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $id);        

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
      
        return $resultado;
       // while($row = $stmt ->fetchObject('Autor')){
         //   $resultado[] = $row;
        //}


     
    }

    public function editarAutor($nome, $telefone, $DataDeNascimento, $sexo, $CurriculoLattes, $instituicao, $id){
        $this->conn = conexaoDB::conexao();

        $sql = 'UPDATE autor SET Nome = :nome, Telefone = :telefone , Instituição = :instituicao,
        CurriculoLattes = :curriculoLattes , DataDeNascimento = :dataDeNascimento , Sexo = :sexo WHERE Autor_ID = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_INT);
        $stmt->bindParam(':instituicao', $instituicao, PDO::PARAM_STR);
        $stmt->bindParam(':curriculoLattes', $CurriculoLattes, PDO::PARAM_STR);
        $stmt->bindParam(':dataDeNascimento', $DataDeNascimento);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if ($stmt->execute() == true) {
            return true ;
        } else {
            return false;
        }

    }

}





