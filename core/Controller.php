<?php

namespace Core;

use Modulos\Helpers\Render;


/**
 * Class Controller
 * @package Core
 */
abstract class Controller
{
    /**
     * Trait render
     */
    use Render;

    /**
     * Retorna uma instância única de uma classe.
     *
     * @staticvar Singleton $instance A instância única dessa classe.
     *
     * @return Singleton A Instância única.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }


} 