<?php
  
require_once("../model/Pessoa.php");
require_once("../model/Autor.php");

class DeletarAutorController{
    
    private $dlt;
    public function __construct()
    {  
        $this->dlt = New Autor();
        $this->verificaid();
    }

    public function verificaid(): void
    {   
        $id = ($_POST['id_autor']);
        if ($id === null || $id === false) {
            header("location:/autores?result=0");
            exit();
        }

        $success = $this->dlt->deletarAutor($id);
        if ($success === false) {
            header("location: /autores?result=0");
            exit();
        } else {
            header("location: /autores?result=1");
            exit();
        } 

    }
}

new DeletarAutorController();