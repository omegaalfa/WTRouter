<?php

namespace Helpers;

/**
 * Class Render
 * @package Helpers
 */
class Render
{

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     */
    public static function renderViewTemplate($viewName, array $customVars = array())
    {
        extract($customVars);

        return require_once Paths::viewsPath() . 'template.php';
    }

    /**
     * @param $viewName
     * @return mixed
     */
    public static function renderView($viewName)
    {
        return require_once Paths::viewsPath() . $viewName . '.php';
    }

}