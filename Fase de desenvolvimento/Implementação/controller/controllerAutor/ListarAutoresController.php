<?php

require_once("model/Pessoa.php");
require_once("model/Autor.php");

try{
    
    $lista_autores = Autor::listarAutores();     

} catch(Exception $e){
    
    $e->getMessage();
    
}
   


  

