<?php

namespace Helpers;

/**
 * Class Converts
 * @package Helpers
 */
class Converts
{

    /**
     * @param array $array
     * @return string
     */
    public static function ArrayToJson(array $array = array())
    {
        if (!is_array($array)) {
            phpErro(WS_ERROR, 'Parameter not array', __FILE__, __LINE__);
        }
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($array);
    }
} 