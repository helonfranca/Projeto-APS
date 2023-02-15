<?php

include_once("../model/conexaoDB.php");
include_once("../model/Usuario.php");

Class LoginController{
    private $error = false;
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
        $this->index();
    }

    public function index() {
        
        session_start();
        if(isset($_POST['email']) && isset($_POST['senha'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
        
            $usuario = new Usuario();
            
            if ($usuario->autenticarUsuario($email, $senha)){
                switch ($_SESSION['tipo_usuario']) {
                case "1": 
                    header("location: ../views/pages/adm/MenuAdm.php");
                    exit();
                case "2": 
                    header("location: ../views/pages/Secretário/MenuSecretário.php");
                    exit();
                default: 
                    break;
                }
            } else {
                $this->error = true;
            }
        }

    }
}

new LoginController();
