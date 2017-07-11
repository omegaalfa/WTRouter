<?php

    use Lib\http\Request;
    use Core\Router;
    use App\Controller;

    $app = new Router(new Request());

    $app
        ->get('/', function () {
            return (new Controller\HomeController())->index();
        })
        ->get('/teste/:id', function ($id) {
            echo 'chamando rota com parameter : '. $id;
        });
    $app->run();