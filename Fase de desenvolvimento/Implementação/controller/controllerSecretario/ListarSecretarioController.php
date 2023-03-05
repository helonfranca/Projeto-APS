<?php

require_once("model/Pessoa.php");
require_once("model/Secretario.php");

try{
    
    // Instancia um objeto da classe Secretario
    $secretario = new Secretario();

    // Chama o método listarSecretarios para recuperar a lista de secretários
    $listaSecretarios = $secretario->listarSecretarios();   

} catch(Exception $e){
    
    $e->getMessage();
    
}
   


  

