<?php

namespace Modulos\Helpers;

class Paths
{
    /**
     * Retorna o diretório das views
     * @return string
     */
    public static function viewsPath()
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
    }

    /**
     * @return string
     */
    public static function assetsPath()
    {
        return '/' . basename(dirname(__DIR__)) . '/';
    }

}