<?php
define('BASE_PATH', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__) . DS);


// Tratamento de erros
define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

// PHPErro :: Personaliza o gatilho do php
function phpErro($errNo, $errMsg, $errFile = null, $errLine = null)
{
    echo '<link href="/assets/css/config.css" type="text/css" rel="stylesheet" media="screen,projection"/>';
    $cssClass = ($errNo == E_USER_NOTICE ? WS_INFOR : ($errNo == E_USER_WARNING ? WS_ALERT : ($errNo == E_USER_ERROR ? WS_ERROR : $errNo)));
    echo "
                <div class=\"trigger {$cssClass}\">
                   <span>Message: {$errMsg}</span><br>
                   <span>Line  :: {$errLine}</span><br>
                   <span>File  :: {$errFile}</span><br>
                </div>";
    if ($errNo == E_USER_ERROR):
        die;
    endif;
}
set_error_handler('phpErro');