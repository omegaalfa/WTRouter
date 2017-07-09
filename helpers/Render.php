<?php

namespace Helpers;

class Render
{

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     */
    public static function renderTemplate($viewName, array $customVars = array())
    {
        extract($customVars);
        return require_once Paths::viewsPath() . 'template.php';
    }

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     */
    public static function renderView($viewName, array $customVars = array())
    {
        extract($customVars);
        return require_once Paths::viewsPath() . $viewName.'.php';
    }

} 