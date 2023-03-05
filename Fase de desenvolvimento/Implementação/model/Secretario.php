<?php
include_once("conexaoDB.php");
include_once("Usuario.php");

class Secretario extends Usuario {
    
    private $cpf;
    private $endereço;
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

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setEndereço($endereço)
    {
        $this->endereço = $endereço;

    }

    public function getEndereço()
    {
        return $this->endereço;
    }


    public function cadastrarSecretario($nome, $telefone, $sexo, $cpf, $email, $senha, $endereco, $datadenascimento) {
    // Conexao com o banco de dados
        $conn = conexaoDB::conexao();
        
        // Preparacao da query para inserir um novo secretario na tabela usuario
        $query = "INSERT INTO usuario (Nome, Senha, Telefone, DataDeNascimento, Sexo, CPF, Endereco, Email, Perfil_id_fk)
        VALUES (:nome, :senha, :telefone, :dataNascimento, :sexo, :cpf, :endereco, :email, 2)";
        
        $stmt = $conn->prepare($query);
        
        // Binding dos valores dos parametros da query
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));
        $stmt->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindValue(':dataNascimento', $datadenascimento, PDO::PARAM_STR);
        $stmt->bindValue(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        
        // Execucao da query para inserir um novo secretario na tabela usuario
        if($stmt->execute()== true){
            return true;
        }else{
            return false;
        }
        
        // Recuperacao do ID do usuario recem-inserido na tabela usuario
        //$usuarioId = $conn->lastInsertId();

    }

    public function listarSecretarios() {
        // Conexao com o banco de dados
        $conn = conexaoDB::conexao();

        // Preparacao da query para listar todos os secretarios
        $query = "SELECT * FROM usuario WHERE Perfil_id_fk = 2";
        $stmt = $conn->prepare($query);

        // Execucao da query para listar todos os secretarios
        $stmt->execute();
        
        // Recuperacao dos resultados da query em forma de array
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public static function verificarSecretario($idSecretario) {
        // Conexão com o banco de dados
        $conn = conexaoDB::conexao();
        
        // Preparação da query para buscar o secretário pelo ID
        $query = "SELECT Nome, Cpf, Telefone, Email FROM usuario WHERE Usuario_ID = :id AND Perfil_id_fk = 2";
        
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $idSecretario);
        
        // Execução da query para buscar o secretário pelo ID
        $stmt->execute();
        
        // Recuperação do resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
  
}
  
  