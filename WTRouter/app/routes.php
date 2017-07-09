<?php

use Lib\http\Request;
use Core\Router;

$request = new Request();
$app = new Router($request);

echo $app->getUrl().'<br>';

$app->get('/teste', function () {
    echo 'página inicial';
});
$app->run();