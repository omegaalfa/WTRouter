<?php

use Lib\http\Request;
use Core\Router;
use App\Controller;

//require_once 'controllers/HomeController.php';

$request = new Request();
$app = new Router($request);

$app
    ->get('/404', function () {
        return (new Controller\HomeController())->notfound();
    })
    ->get('/teste2', function () {
    echo 'chamou inicial teste 2 do WTRouter';
    });
$app->run();