<?php

namespace App\Controller;

use Core\Controller;
use Event\Event;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{
    public function index()
    {
        $this->beforeRenderTemplate('', 'home', array());

//        $this->afterRenderTemplate('home', array(), function(){
//            echo 'after'.PHP_EOL;
//        });
    }

}