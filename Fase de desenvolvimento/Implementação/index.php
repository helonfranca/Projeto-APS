<?php

include 'controller/HomeController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)

{
    case '/':
        echo "pagina inicial";
    break;

    case '/pessoa':
        HomeController::index();
    break;

    case '/lista':
        HomeController::lista();
    break;

    case '/autor/form/save':
        HomeController::save();
    break;

    default:
        echo "Erro 404";
    break;

}