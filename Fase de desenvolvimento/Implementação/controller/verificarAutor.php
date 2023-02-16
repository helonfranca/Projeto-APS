<?php
require_once("../model/Pessoa.php");
require_once("../model/Autor.php");

try{
    $lista_autores = Autor::verificarAutor();     

} catch(Exception $e){
    echo$e->getMessage();
}
   


  

