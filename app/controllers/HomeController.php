<?php

namespace App\Controller;

use Helpers\Render;

class HomeController
{

    public function notfound()
    {
        return Render::renderTemplate('404', array());
    }
} 