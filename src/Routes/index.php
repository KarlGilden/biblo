<?php

use App\Controllers\HomeController;
use App\Controllers\LibraryController;
use App\Router;

$router = new Router();

$router->get('/', function(){
    $controller = new HomeController();
    $controller->index();
});
$router->get('/library', function(){
    $controller = new LibraryController();
    $controller->index();
});

$router->get('/library/$iso', function($iso){
    $controller = new LibraryController();
    $controller->get_collections($iso);
});