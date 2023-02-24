<?php
  
require_once("../model/Pessoa.php");
require_once("../model/Autor.php");

class UptadeAutorController{  
    private $upt;
    public function __construct()
    {  
        $this->upt = New Autor();
        $this->UptAutor();
    }

    public function UptAutor(){
        $id = ($_POST['id']);
        $this->upt->setId($id);
        $this->upt->setNome($_POST['editNome']);
        $this->upt->setTelefone($_POST['editTelefone']);
        $this->upt->setSexo($_POST['editsexo']);
        $this->upt->setInstituicao($_POST['editinstituicao']);
        $this->upt->setCurriculoLattes($_POST['editCurriculoLattes']);    
        $this->upt->setDataDeNascimento(date('Y-m-d',strtotime($_POST['editDataDeNascimento'])));
        $result = $this->incluir();
        if ($result >= 1) {
            header("location: /lista?result=1");
            exit();
        } else {
            header("location: /lista?result=0");
            exit();
        }
    }

    public function incluir(){
        return $this->upt->editarAutor($this->upt->getNome(),$this->upt->getTelefone(),$this->upt->getDataDeNascimento(),$this->upt->getSexo(),$this->upt->getCurriculoLattes(), $this->upt->getInstituicao(), $this->upt->getId());
    }
}

new UptadeAutorController();