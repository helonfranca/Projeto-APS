<?php

require_once("model/Pessoa.php");
require_once("model/Organizador.php");

try{
    
    $lista_organizadores = Organizador::verificarOrganizador();     

} catch(Exception $e){
    
    $e->getMessage();
    
}
   


  

