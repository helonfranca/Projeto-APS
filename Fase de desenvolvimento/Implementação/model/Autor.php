<?php

require_once("Pessoa.php");
require_once("conexaoAutor.php");

class Autor extends Pessoa{
    
    /** Get the value of id     */ 
    public function getId()
    {
        return $this->id;
    }

    /** Set the value of id */
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

   

    public function getCurriculoLattes()
    {
        return $this->CurriculoLattes;
    }

    public function setCurriculoLattes($CurriculoLattes)
    {
        $this->CurriculoLattes = $CurriculoLattes;

    }

    public function getInstituicao()
    {
        return $this->instituicao;
    }

    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;

    }


    public function incluir(){
        
        $obj = new conexaoAutor();
        return $obj->setAutor($this->getNome(),$this->getTelefone(),$this->getDataDeNascimento(),$this->getSexo(),$this->getCurriculoLattes(), $this->getInstituicao());
    
    }


}





