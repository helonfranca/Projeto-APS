<?php

require_once("model/Usuario.php");
require_once("model/Secretario.php");
require_once("model/conexaoDB.php");

class GerenciamentoSecretario{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Secretario();
        $this->GerenciarSecretario(); 
       
    }

    public function GerenciarSecretario(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setSexo($_POST['sexo']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setSenha($_POST['senha']);
        $this->cadastro->setEndereço($_POST['endereco']);    
        $this->cadastro->setDataDeNascimento(date('Y-m-d',strtotime($_POST['dataNascimento'])));
        $result = $this->incluir();
        if($result >= 1){
            header("location: /secretario?result=1");
            exit();
        }else{
            header("location: /secretario?result=0");
            exit();
        }
    
    }

    public function incluir(){
        return $this->cadastro->cadastrarSecretario($this->cadastro->getNome(),$this->cadastro->getTelefone(),$this->cadastro->getSexo(),$this->cadastro->getCpf(),$this->cadastro->getEmail(), $this->cadastro->getSenha(), $this->cadastro->getEndereço(), $this->cadastro->getDataDeNascimento());
    }
   

}

new GerenciamentoSecretario();


?>


