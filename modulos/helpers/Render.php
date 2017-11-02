<?php

namespace Modulos\Helpers;


/**
 * trait Render
 * @package Helpers
 */
trait Render
{
    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     * @throws \Exception
     */
    protected function renderViewTemplate($viewName, array $customVars = array())
    {
        if (!file_exists(Paths::viewsPath() . $viewName . '.php')) {
            phpErro(E_USER_ERROR, 'Not exists file: ' . $viewName, __FILE__, __LINE__);
        }
        extract($customVars);
        return require_once Paths::viewsPath() . 'dashboard.php';
    }

    /**
     * @param $viewName
     * @param array $customVars
     * @return mixed
     * @throws \Exception
     */
    protected function renderView($viewName, array $customVars = array())
    {
        if (!file_exists(Paths::viewsPath() . $viewName . '.php')) {
            phpErro(E_USER_ERROR, 'Not exists file: ' . $viewName, __FILE__, __LINE__);
        }
        extract($customVars);
        return require_once Paths::viewsPath() . $viewName . '.php';
    }

    /**
     * @param $callback
     * @param $view
     * @param $data
     * @return mixed
     */
    public function beforeRenderView($callback, $view, $data)
    {
        if (!is_callable($callback) or !$callback()) {
            phpErro(E_USER_ERROR, 'Undefined function calback or return null', __FILE__, __LINE__);
        }
        return $this->renderView($view, $data);
    }

    /**
     * @param $calback
     * @param $view
     * @param $data
     * @return mixed
     */
    public function afterRenderView($calback, $view, $data)
    {
        $this->renderView($view, $data);
        if (!is_callable($calback) or !$calback() ) {
            phpErro(WS_ERROR, 'Undefined function calback or return null', __FILE__, __LINE__);
        }
        return $calback();
    }

    /**
     * @param $callback
     * @param $view
     * @param $data
     * @return mixed
     */
    public function beforeRenderViewTemplate($callback, $view, $data)
    {
        if (!is_callable($callback) or !$callback()) {
            phpErro(E_USER_ERROR, 'Undefined function calback or return null', __FILE__, __LINE__);
        }
        return $this->renderViewTemplate($view, $data);
    }

    /**
     * @param $calback
     * @param $view
     * @param $data
     * @return mixed
     */
    public function afterRenderTemplate($calback, $view, $data)
    {
        $this->renderViewTemplate($view, $data);
        if (!is_callable($calback) or !$calback() ) {
            phpErro(WS_ERROR, 'Undefined function calback or return null', __FILE__, __LINE__);
        }
        return $calback();
    }

}