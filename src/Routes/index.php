<?php

use App\Controllers\HomeController;
use App\Controllers\LibraryController;
use App\Controllers\LessonController;
use App\Controllers\ResourceController;
use App\Router;

$router = new Router();

$router->get('/', function(){
    $controller = new HomeController();
    $controller->index();
});
$router->get('/library', function(){
    $controller = new LibraryController();
    $controller->select_language();
});

$router->get('/library/$iso', function($iso){
    $controller = new LibraryController();
    $controller->get_collections($iso);
});

$router->get('/lesson/$iso/$id', function($iso, $id){
    $controller = new LessonController();
    $controller->get_lesson($iso, $id);
});

$router->get('/translate/$iso/$text', function($iso, $text){
    $controller = new LessonController();
    $controller->get_translation($iso, $text);
});

$router->get('/learning-resources', function(){
    $controller = new ResourceController();
    $controller->index();
});