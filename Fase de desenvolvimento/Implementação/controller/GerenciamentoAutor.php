
<?php
require_once("../model/Pessoa.php");
require_once("../model/Autor.php");
require_once("../model/conexaoAutor.php");

class GerenciamentoAutor{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Autor();
        $this->cadastrarAutor();   
        
    }

    public function cadastrarAutor(){
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setSexo($_POST['sexo']);
        $this->cadastro->setInstituicao($_POST['instituicao']);
        $this->cadastro->setCurriculoLattes($_POST['CurriculoLattes']);    
        $this->cadastro->setDataDeNascimento(date('Y-m-d',strtotime($_POST['DataDeNascimento'])));
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../views/teste.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }
    
}

new GerenciamentoAutor();

