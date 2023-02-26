<?php

class HomeController
{
    public static function index()
    {
        include 'views\pages\home.php';    
    }

    public static function login()
    {
        include 'LoginController.php';    
    }

    public static function logout()
    {
        include 'LogoutController.php';    
    }

    public static function menuAdm()
    {
        include 'views\pages\administrador\menuAdm.php';
    }

    public static function menuSecretario()
    {
        include 'views\pages\secretario\menuSecretario.php';
    }

    public static function PagAutores()
    {
        include 'views\pages\secretario\pagAutores.php';
    }

    public static function saveAutor()
    {
        include 'GerenciamentoAutor.php';           
    }

    public static function editar()
    {
        include 'UpdateAutorController.php';            
    }

    public static function remover()
    {
        include 'DeletarAutorController.php';            
    }

    public static function busca()
    {
        include 'BuscaAutorController.php';            
    }

    public static function PagOrganizadores()
    {
        include 'views\pages\secretario\pagOrganizador.php';
    }

    public static function saveOrganizador()
    {
        include 'controllerOrganizador\GerenciamentoOrganizador.php';           
    }

   

}

