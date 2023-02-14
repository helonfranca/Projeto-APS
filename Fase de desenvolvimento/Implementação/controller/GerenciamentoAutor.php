<?php
require_once("../model/Pessoa.php");
require_once("../model/Autor.php");
require_once("../model/conexao.php");

class GerenciamentoAutor{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Autor();
        $this->GerenciarAutor(); 
       
    }

    public function GerenciarAutor(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setSexo($_POST['sexo']);
        $this->cadastro->setInstituicao($_POST['instituicao']);
        $this->cadastro->setCurriculoLattes($_POST['CurriculoLattes']);    
        $this->cadastro->setDataDeNascimento(date('Y-m-d',strtotime($_POST['DataDeNascimento'])));
        $result = $this->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../views/pages/Secretário/pgs gerencia/crudAutores.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }

    public function incluir(){
        

        return $this->cadastro->CadastrarAutor($this->cadastro->getNome(),$this->cadastro->getTelefone(),$this->cadastro->getDataDeNascimento(),$this->cadastro->getSexo(),$this->cadastro->getCurriculoLattes(), $this->cadastro->getInstituicao());

    }

}

new GerenciamentoAutor();





