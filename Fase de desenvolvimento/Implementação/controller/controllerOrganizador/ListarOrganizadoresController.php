<?php

require_once("model/Pessoa.php");
require_once("model/Organizador.php");

try{
    
    $lista_organizadores = Organizador::listarOrganizador();     

} catch(Exception $e){
    
    $e->getMessage();
    
}
   


  

