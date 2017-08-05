<?php

namespace App\Controller;

use Core\Controller;
use Core\Model;
use Helpers\Converts;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{
    public function index()
    {
        $data = array('nome' =>'Fulano');
        $this->afterRender(function(){
            return true;
        }, 'home', array('dados' =>$data));

//        $this->beforeRender(function(){
//            return true;
//        },'home', array());


    }

}