<?php
include_once("conexaoDB.php");
include_once("Pessoa.php");
include_once("Usuario.php");

class Secretario extends Usuario {
  
    public function __construct() {
      
    }

    public function cadastrarSecretario($dadosSecretario) {
    // Conexao com o banco de dados
    $conn = conexaoDB::conexao();
    
    // Preparacao da query para inserir um novo secretario na tabela usuario
    $query = "INSERT INTO usuario (Nome, Senha, Telefone, DataDeNascimento, Sexo, CPF, Endereco, Email, Perfil_id_fk)
    VALUES (:nome, :senha, :telefone, :dataNascimento, :sexo, :cpf, :endereco, :email, 2)";
    
    $stmt = $conn->prepare($query);
    
    // Binding dos valores dos parametros da query
    $stmt->bindValue(':nome', $dadosSecretario['nome']);
    $stmt->bindValue(':senha', password_hash($dadosSecretario['senha'], PASSWORD_DEFAULT));
    $stmt->bindValue(':telefone', $dadosSecretario['telefone']);
    $stmt->bindValue(':dataNascimento', $dadosSecretario['dataNascimento']);
    $stmt->bindValue(':sexo', $dadosSecretario['sexo']);
    $stmt->bindValue(':cpf', $dadosSecretario['cpf']);
    $stmt->bindValue(':endereco', $dadosSecretario['endereco']);
    $stmt->bindValue(':email', $dadosSecretario['email']);
    
    // Execucao da query para inserir um novo secretario na tabela usuario
    $stmt->execute();
    
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

public function verificarSecretario($idSecretario) {
        // Conexão com o banco de dados
        $conn = conexaoDB::conexao();
        
        // Preparação da query para buscar o secretário pelo ID
        $query = "SELECT Nome, CPF, Telefone, Email FROM usuario WHERE Usuario_ID = :id AND Perfil_id_fk = 2";
        
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $idSecretario);
        
        // Execução da query para buscar o secretário pelo ID
        $stmt->execute();
        
        // Recuperação do resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
  
}
  
  