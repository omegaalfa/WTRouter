<?php

use App\Controller;
use App\Lib\Http\Request;
use core\router\Router;


$app = new Router(new Request());

$app
    ->get('/', function () {
        return Controller\HomeController::getInstance()->index();
    })
    ->get('/users', function () {
        return (new Controller\HomeController())->index();
    })
    ->get('/teste/:id', function ($id) {
        echo 'chamando rota com parameter : ' . $id;
    });
$app->run();