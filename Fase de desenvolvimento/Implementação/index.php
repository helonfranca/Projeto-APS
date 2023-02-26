<?php

include 'controller/HomeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)

{
    case '/':
        HomeController::index();
    break;

    case '/homeAdm':
        HomeController::menuAdm();
    break;

    case '/home':
        HomeController::menuSecretario();
    break;

    case '/autores':
        HomeController::PagAutores();
    break;

    case '/autor/form/save':
        HomeController::saveAutor();
    break;

    case '/autor/form/editar':
        HomeController::editar();
    break;

    case '/autor/form/remover':
        HomeController::remover();
    break;

    case '/organizadores':
        HomeController::PagOrganizadores();
    break;

    case '/organizador/form/save':
        HomeController::saveOrganizador();
    break;

    default:
        echo "<h1  style = 'position: absolute; top: 50%; left: 50%; margin-right: -50%;
        transform: translate(-50%, -50%)'>Erro 404: Desculpe, página não encontrada. :/ </h1>";
    break;

}