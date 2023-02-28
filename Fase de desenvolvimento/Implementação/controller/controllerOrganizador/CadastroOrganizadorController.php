<?php
require_once("model/Pessoa.php");
require_once("model/Organizador.php");
require_once("model/conexaoDB.php");

class GerenciamentoOrganizador{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Organizador();
        $this->GerenciarOrganizador(); 
       
    }

    public function GerenciarOrganizador(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setSexo($_POST['sexo']);
        $this->cadastro->setCpf($_POST['cpf']);
        $this->cadastro->setInstituicao($_POST['instituicao']);
        $this->cadastro->setCurriculoLattes($_POST['CurriculoLattes']);    
        $this->cadastro->setDataDeNascimento(date('Y-m-d',strtotime($_POST['DataDeNascimento'])));
        $result = $this->incluir();
        if($result >= 1){
            header("location: /organizadores?result=1");
            exit();
        }else{
            header("location: /organizadores?result=0");
            exit();
        }
    }

    public function incluir(){
        return $this->cadastro->cadastrarOrganizador($this->cadastro->getNome(),$this->cadastro->getTelefone(),$this->cadastro->getDataDeNascimento(),$this->cadastro->getSexo(),$this->cadastro->getCurriculoLattes(), $this->cadastro->getInstituicao(), $this->cadastro->getcpf());
    }

}

new GerenciamentoOrganizador();





