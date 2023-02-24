<?php

class HomeController
{
    public static function index()
    {
       
        include 'views\pages\index.php';
        
    }

    public static function lista()
    {
        include 'views\pages\Secretário\pgs gerencia\crudAutores.php';
   
    }

    public static function save()
    {
        include 'GerenciamentoAutor.php';        
         
    }

    public static function verificar(){
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


    }

}

