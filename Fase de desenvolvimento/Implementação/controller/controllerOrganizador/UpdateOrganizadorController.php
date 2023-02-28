<?php
  
require_once("model/Pessoa.php");
require_once("model/Organizador.php");

class UptadeOrganizadorController{  
    private $upt;
    public function __construct()
    {  
        $this->upt = New Organizador();
        $this->UptOrganizador();
    }

    public function UptOrganizador(){
        $id = ($_POST['id']);
        $this->upt->setId($id);
        $this->upt->setNome($_POST['editNome']);
        $this->upt->setTelefone($_POST['editTelefone']);
        $this->upt->setSexo($_POST['editsexo']);
        $this->upt->setInstituicao($_POST['editinstituicao']);
        $this->upt->setCurriculoLattes($_POST['editCurriculoLattes']); 
        $this->upt->setcpf($_POST['editCpf']);   
        $this->upt->setDataDeNascimento(date('Y-m-d',strtotime($_POST['editDataDeNascimento'])));
        $result = $this->incluir();
        if ($result >= 1) {
            header("location: /organizadores?result=1");
            exit();
        } else {
            header("location: /organizadores?result=0");
            exit();
        }
    }

    public function incluir(){
        return $this->upt->editarOrganizador($this->upt->getNome(),$this->upt->getTelefone(),$this->upt->getDataDeNascimento(),$this->upt->getSexo(),$this->upt->getCurriculoLattes(), $this->upt->getInstituicao(), $this->upt->getId(), $this->upt->getcpf());
    }
}

new UptadeOrganizadorController();