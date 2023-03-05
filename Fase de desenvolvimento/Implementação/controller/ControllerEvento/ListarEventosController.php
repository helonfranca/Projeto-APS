<?php

require_once("model/Evento.php");

try{
    $id_usuario = $_SESSION['id_usuario'];
    $objeto = new evento();
    $meus_eventos = $objeto->listarEventos($id_usuario);    

} catch(Exception $e){
    
    $e->getMessage();
    
}