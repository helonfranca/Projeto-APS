<?php

require_once("../model/Pessoa.php");
require_once("../model/Autor.php");


    try{
        $lista_autores = Autor::verificarAutor();

        var_dump($lista_autores);

    } catch(Exception $e){
        echo$e->getMessage();
    }
   





