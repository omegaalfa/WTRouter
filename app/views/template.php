<h1>Template</h1>
<?php

if (isset($viewName)) {
    $path = \Helpers\Paths::viewsPath() . $viewName . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}

