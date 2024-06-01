<?php

use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Router;

$router = new Router();

$router->get('/', function(){
    $controller = new HomeController();
    $controller->index();
});
$router->get('/dashboard', function(){
    $controller = new DashboardController();
    $controller->index();
});

$router->get('/dashboard/$iso', function($iso){
    $controller = new DashboardController();
    $controller->get_collections($iso);
});