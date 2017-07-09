<?php

define('BASE_PATH', dirname(dirname(__FILE__)));

// Tratamento de erros
define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

// PHPErro :: Personaliza o gatilho do php
function phpErro($errNo, $errMsg, $errFile = null, $errLine = null)
{
    $cssClass = ($errNo == E_USER_NOTICE ? WS_INFOR : ($errNo == E_USER_WARNING ? WS_ALERT : ($errNo == E_USER_ERROR ? WS_ERROR : $errNo)));
    echo "<h5 class=\"trigger {$cssClass}\">{$errMsg} </h5><br>";
    if($errFile != null){
        echo "<small>{$errFile}</small>";
    }
    if($errLine != null){
        echo "<b> LINHA :: {$errLine} </b><br>";
    }
    if ($errNo == E_USER_ERROR):
        die;
    endif;

}
set_error_handler('phpErro');