<?php

namespace Core;

use Lib\Medoo\Medoo;


class Model
{

    static function getDB()
    {
        return new Medoo(require '../config/database.php');
    }
} 