<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-message/src'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Modulos\\Http\\' => array($baseDir . '/modulos/http'),
    'Modulos\\Helpers\\' => array($baseDir . '/modulos/helpers'),
    'Modulos\\Database\\' => array($baseDir . '/modulos/database'),
    'Modulos\\Classes\\'  => array($baseDir . '/modulos/classes'),
    'App\\Model\\DAO\\'   => array($baseDir . '/app/models/dao'),
    'App\\Model\\' => array($baseDir . '/app/models'),
    'App\\Controller\\' => array($baseDir . '/app/controllers'),
    'App\\' => array($baseDir . '/app'),
);
