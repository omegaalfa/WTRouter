<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit663c037db8670bd16c8179489d3c6523
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'Modulos\\Http\\' => 13,
            'Modulos\\Helpers\\' => 16,
        ),
        'A' => 
        array (
            'App\\Model\\' => 10,
            'App\\Controller\\' => 15,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Modulos\\Http\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modulos/http',
        ),
        'Modulos\\Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modulos/helpers',
        ),
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'App\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Core\\Controller' => __DIR__ . '/../..' . '/core/Controller.php',
        'Core\\Model' => __DIR__ . '/../..' . '/core/Model.php',
        'core\\router\\Router' => __DIR__ . '/../..' . '/core/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit663c037db8670bd16c8179489d3c6523::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit663c037db8670bd16c8179489d3c6523::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit663c037db8670bd16c8179489d3c6523::$classMap;

        }, null, ClassLoader::class);
    }
}
