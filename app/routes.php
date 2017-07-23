<?php

use Lib\http\Request;
use Core\Router;
use App\Controller;

$app = new Router(new Request());


//$teste = $app->calback(function() {
//    return 'chamando rota com parameter : ' ;
//});

//$imput = file_get_contents('php://input');
//var_dump($imput) ;

$app
    ->get('/', function () {
        return (new Controller\HomeController())->index();
    })
    ->get('/teste/:id', function ($id) {
        echo 'chamando rota com parameter : ' . $id;
    });
$app->run();