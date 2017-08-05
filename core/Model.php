<?php

namespace Core;

use Lib\Medoo\Medoo;

/**
 * Class Model
 * @package Core
 */
class Model
{
    /**
     * @return Medoo
     */
    static function getDB()
    {
        return new Medoo(require '../config/database.php');
    }
} 