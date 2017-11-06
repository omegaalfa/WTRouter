<?php

use App\Controller;
use core\router\Router;
use Modulos\Http\Request;

//var_dump(get_headers(BASE_URL));

$app = new Router(new Request());

$app
    ->get('/', function () {
        return Controller\HomeController::getInstance()->index();
    })
    ->get('/404', function () {
        return (new Controller\HomeController())->index();
    })
    ->get('/teste/:id', function ($id) {
        echo 'chamando rota com parameter : ' . $id;
    });
$app->run();