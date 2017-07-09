<?php

use Lib\http\Request;
use Core\Router;

$request = new Request();
$app = new Router($request);

//
//echo $app->getUrl().'<br>';

$app
    ->get('/', function () {
    echo 'página inicial WTRouter';
    })
    ->get('/teste2', function () {
    echo 'chamou inicial teste 2 do WTRouter';
    });
$app->run();