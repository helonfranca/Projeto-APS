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
        include 'controllerAutor\CadastroAutorController.php';           
    }

    public static function editar()
    {
        include 'controllerAutor\UpdateAutorController.php';            
    }

    public static function remover()
    {
        include 'controllerAutor\DeletarAutorController.php';            
    }

    public static function busca()
    {
        include 'controllerAutor\VerificarAutorController.php';            
    }

    public static function PagOrganizadores()
    {
        include 'views\pages\secretario\pagOrganizador.php';
    }

    public static function saveOrganizador()
    {
        include 'controllerOrganizador\CadastroOrganizadorController.php';           
    }
    
    public static function removerOrganizador()
    {
        include 'controllerOrganizador\DeletarOrganizadorController.php';           
    }

    public static function buscaOrganizador()
    {
        include 'controllerOrganizador\VerificarOrganizadorController.php';            
    }

    public static function editarOrganizador()
    {
        include 'controllerOrganizador\UpdateOrganizadorController.php';            
    }

    public static function PagEventos()
    {
        include 'views\pages\secretario\pagEventos.php';
    }

    public static function saveEvento()
    {
        include 'controllerEvento\CadastroEventoController.php';           
    }

    public static function PagArtigos()
    {
        include 'views\pages\secretario\pagArtigos.php';
    }

    public static function PagSecretario()
    {
        include 'views\pages\administrador\pagSecretario.php';
    }

    public static function saveSecretario()
    {
        include 'controllerSecretario\CadastroSecretarioController.php';           
    }

    public static function buscaSecretario()
    {
        include 'controllerSecretario\VerificarSecretarioController.php';            
    }

    public static function PagAdmAutores()
    {
        include 'views\pages\administrador\pagAutores.php';
    }

    public static function PagAdmEvento()
    {
        include 'views\pages\administrador\pagEvento.php';
    }
    
    public static function PagAdmOrganizador()
    {
        include 'views\pages\administrador\pagOrganizador.php';
    }
    public static function PagAdmArtigos()
    {
        include 'views\pages\administrador\pagArtigos.php';
    }
   

}

