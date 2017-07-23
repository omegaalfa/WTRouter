<?php

namespace Core;

use Helpers\Render;

/**
 * Class Controller
 * @package Core
 */
class Controller
{

    /**
     * @param $calback
     * @param $viewName
     * @param array $customVars
     */
    protected function beforeRenderTemplate($calback, $viewName, array $customVars = array())
    {
        if (is_callable($calback) && $calback()) {
            extract($customVars);
            Render::renderViewTemplate($viewName);
        };
    }

    /**
     * @param $viewName
     * @param array $customVars
     * @param $calback
     * @return mixed
     */
    protected function afterRenderTemplate($viewName, array $customVars = array(), $calback)
    {
        extract($customVars);

        Render::renderViewTemplate($viewName);

        if (is_callable($calback)) {
            return $calback();
        }
    }

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     */
    protected function renderView($viewName, array $customVars = array())
    {
        extract($customVars);
        Render::renderView($viewName);
    }

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     */
    protected function renderTemplate($viewName, array $customVars = array())
    {
        extract($customVars);
        Render::renderViewTemplate($viewName);
    }

} 