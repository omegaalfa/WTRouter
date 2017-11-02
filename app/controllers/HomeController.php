<?php

namespace App\Controller;

use Core\Controller;


/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{
    public function index()
    {
        $data = array('nome' =>'Fulano');
        $this->renderView('home', $data);

    }

}