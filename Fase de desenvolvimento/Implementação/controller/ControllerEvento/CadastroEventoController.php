<?php

require_once("model/Pessoa.php");
require_once("model/Organizador.php");
require_once("model/Evento.php");

class GerenciamentoEvento
{
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new Evento();
        $this->GerenciarEvento();
    }

    public function GerenciarEvento()
    {   
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setAno($_POST['ano']);
        $this->cadastro->setTipoEvento($_POST['tipo']);
        $this->cadastro->setLinkEvento($_POST['link']);
        $this->cadastro->setDescricao($_POST['descricao']);
        $this->cadastro->setAreadeEstudo($_POST['areadeestudo']);
        $result = $this->incluir();

        $organizadores = $_POST['organizador'];

        foreach ($organizadores as $organizador_id) {
            if ($this->cadastro->relacionarOrganizadoraEvento($organizador_id)) {
                $organizador_relacionado = true;
            }
        }

        if($result >= 1 && $organizador_relacionado) {
            header("location: /eventos?result=1");
            exit();
        } else {
            header("location: /eventos?result=0");
            exit();
        }
    }

    public function incluir()
    {
        return $this->cadastro->cadastrarEvento($this->cadastro->getNome(), $this->cadastro->getAno(), $this->cadastro->getTipoEvento(), $this->cadastro->getLinkEvento(), $this->cadastro->getDescricao(), $this->cadastro->getareadeEstudo());
    }
}

new GerenciamentoEvento();
