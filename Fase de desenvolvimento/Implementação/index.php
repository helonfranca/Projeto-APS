<?php

include 'controller/HomeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)

{
    case '/':
        HomeController::index();
    break;

    case '/login':
        HomeController::login();
    break;

    case '/logout':
        HomeController::logout();
    break;

    case '/homeAdm':
        HomeController::menuAdm();
    break;

    case '/home':
        HomeController::menuSecretario();
    break;

    //NEW
    case '/gerenciaADM':
        HomeController::gerenciaADM();
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

    case '/autor/form/busca':
        HomeController::busca();
    break;

    case '/organizadores':
        HomeController::PagOrganizadores();
    break;

    case '/organizador/form/save':
        HomeController::saveOrganizador();
    break;

    case '/organizador/form/remover':
        HomeController::removerOrganizador();
    break;

    case '/organizador/form/busca':
        HomeController::buscaOrganizador();
    break;

    case '/organizador/form/editar':
        HomeController::editarOrganizador();
    break;

    case '/eventos':
        HomeController::PagEventos();
    break;

    case '/evento/form/save':
        HomeController::saveEvento();
    break;

    default:
        echo "<h1  style = 'position: absolute; top: 50%; left: 50%; margin-right: -50%;
        transform: translate(-50%, -50%)'>Erro 404: Desculpe, página não encontrada. :/ </h1>";
    break;

}