<?php

require_once("conexaoDB.php");
class evento{

    private $id;
    private $nome;
    private $ano;
    private $tipoEvento;
    private $areadeEstudo;
    private $descricao;
    private $linkEvento;

    public function getId()
    {
        return $this->id;
    }

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

    public function getAno()
    {
        return $this->ano;
    }
 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    public function getTipoEvento()
    {
        return $this->tipoEvento;
    }

   
    public function setTipoEvento($tipoEvento)
    {
        $this->tipoEvento = $tipoEvento;
    }

    public function getAreadeEstudo()
    {
        return $this->areadeEstudo;
    }


    public function setAreadeEstudo($areadeEstudo)
    {
        $this->areadeEstudo = $areadeEstudo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

    }

    public function getLinkEvento()
    {
        return $this->linkEvento;
    }
    
    public function setLinkEvento($linkEvento)
    {
        $this->linkEvento = $linkEvento;
    }

    public function cadastrarEvento($nome, $ano, $tipoEvento, $areaEstudo, $descricao, $linkEvento){
        $conn = conexaoDB::conexao();
        session_start();
        $id_usuario = $_SESSION['id_usuario'];

        $stmt = $conn->prepare("INSERT INTO evento (Nome, Ano, Tipo, AreadeEstudo, descricao, linkEvento, Usuario_id_fk) 
        VALUES (?,?,?,?,?,?,?)");

        $stmt->bindParam(1, $nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $ano, PDO::PARAM_INT);
        $stmt->bindParam(3, $tipoEvento, PDO::PARAM_STR);
        $stmt->bindParam(4, $areaEstudo, PDO::PARAM_STR);
        $stmt->bindParam(5, $descricao);
        $stmt->bindParam(6, $linkEvento, PDO::PARAM_STR);
        $stmt->bindParam(7, $id_usuario, PDO::PARAM_STR);
        if ($stmt->execute() == true) {
            $this->id = $conn->lastInsertId();
            return true ;
        } else {
            return false;
        }
    }

    public function relacionarOrganizadoraEvento($organizador_id) {
        $conn = conexaoDB::conexao();
        
        $sql = 'INSERT INTO organizador_evento (Evento_id_fk, Organizador_id_fk) VALUES (:evento_id, :organizador_id)';
        $stmt = $conn->prepare($sql);
        if($stmt->execute(['evento_id' => $this->id, 'organizador_id' => $organizador_id]) == true ){
            return true;
        }else{
            return false;
        }
    }

    public function listarEventos($id_usuario) {
        $conn = conexaoDB::conexao();

        $sql = 'SELECT evento.*, GROUP_CONCAT(organizador.Nome SEPARATOR ", ") AS organizadores
        FROM evento
        JOIN organizador_evento ON evento_id = organizador_evento.Evento_id_fk
        JOIN organizador ON organizador_id = organizador_evento.Organizador_id_fk
        WHERE evento.Usuario_id_fk = :id_usuario
        GROUP BY evento_id';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        
        $resultados = array();

        $resultados = $stmt->fetchAll(PDO::FETCH_CLASS);

        if(!$resultados){
            throw new Exception("Não foi encontrado nenhum registro");
        }
        
        return $resultados;
    }

}