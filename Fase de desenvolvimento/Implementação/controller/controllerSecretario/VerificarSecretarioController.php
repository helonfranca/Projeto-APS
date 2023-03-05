<?php

require_once("model/Pessoa.php");
require_once("model/Secretario.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    if(!empty($id)){
    
        $info_secretario = Secretario::verificarSecretario((int)$id);

        if(!empty($info_secretario)){
            $retorna = ['status'=>true, 'dados'=> $info_secretario];

        }else{
            $retorna = ['status'=>false, 'msg'=> " <div class='dentro-bloco'
            role='alert'>  <h3> Usuário não encontrado!</h3> </div>"];


        }

    }else{
        $retorna = ['status'=>false, 'msg'=> "<div class = 'Alert Alert-danger' role='alert'> Erro! Usuário não encontrado</div>"];
    }
 
    echo json_encode($retorna);




