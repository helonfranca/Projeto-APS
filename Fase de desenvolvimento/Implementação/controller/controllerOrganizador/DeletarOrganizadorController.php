<?php
  
require_once("model/Pessoa.php");
require_once("model/Organizador.php");

class DeletarOrganizadorController{
    
    private $dlt;
    public function __construct()
    {  
        $this->dlt = New Organizador();
        $this->verificaid();
    }

    public function verificaid(): void
    {   
        $id = ($_POST['id_organizador']);
        if ($id === null || $id === false) {
            header("location:/organizadores?result=0");
            exit();
        }

        $success = $this->dlt->deletarOrganizador($id);
        if ($success === false) {
            header("location: /organizadores?result=0");
            exit();
        } else {
            header("location: /organizadores?result=1");
            exit();
        } 

    }
}

new DeletarOrganizadorController();