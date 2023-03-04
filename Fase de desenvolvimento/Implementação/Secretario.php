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
        $query = "INSERT INTO usuario (Nome, Email, Senha, Perfil_id_fk) VALUES (:nome, :email, :senha, 2)";
        $stmt = $conn->prepare($query);
        
        // Binding dos valores dos parametros da query
        $stmt->bindValue(':nome', $dadosSecretario['nome']);
        $stmt->bindValue(':email', $dadosSecretario['email']);
        $stmt->bindValue(':senha', password_hash($dadosSecretario['senha'], PASSWORD_DEFAULT));
        
        // Execucao da query para inserir um novo secretario na tabela usuario
        $stmt->execute();
        
        // Recuperacao do ID do usuario recem-inserido na tabela usuario
        $usuarioId = $conn->lastInsertId();
        
        // Preparacao da query para inserir os dados do secretario na tabela pessoa
        $query = "INSERT INTO pessoa (Nome, Telefone, DataDeNascimento, Sexo, CurriculoLattes, Instituicao, Usuario_id_fk) 
                  VALUES (:nome, :telefone, :dataNascimento, :sexo, :curriculoLattes, :instituicao, :usuarioId)";
        $stmt = $conn->prepare($query);
        
        // Binding dos valores dos parametros da query
        $stmt->bindValue(':nome', $dadosSecretario['nome']);
        $stmt->bindValue(':telefone', $dadosSecretario['telefone']);
        $stmt->bindValue(':dataNascimento', $dadosSecretario['dataNascimento']);
        $stmt->bindValue(':sexo', $dadosSecretario['sexo']);
        $stmt->bindValue(':curriculoLattes', $dadosSecretario['curriculoLattes']);
        $stmt->bindValue(':instituicao', $dadosSecretario['instituicao']);
        $stmt->bindValue(':usuarioId', $usuarioId);
        
        // Execucao da query para inserir os dados do secretario na tabela pessoa
        $stmt->execute();
    }
  
}
  
  