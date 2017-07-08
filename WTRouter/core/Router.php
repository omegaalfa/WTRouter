<?php
/**
 * Created by PhpStorm.
 * User: HCNX
 * Date: 06/05/2017
 * Time: 21:33
 */

namespace Core;

use Lib\http\Request;

class Router
{
    /**
     * Variável responsável por guardar as rotas que
     * depois do filtro serão passadas para o método run.
     * @var $routes
     */
    private $routes;

    /**
     * Variável responsável por guardar o path da uri
     * @var $url
     */
    private $url;

    /**
     * Variável responsável por guardar o padrão
     * @var
     */
    private $pattern;

    /**
     * Método construtor que recebe como parâmetro um request
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Array que define os metodos aceitos pelas rotas
     * @var $routes array
     */
    protected $requestMethods = array('GET', 'POST', 'PUT', 'DELETE');


    /**
     * Método responsável por retornar a urm amigável
     * @return string
     */
    public function getUrl()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        if (strlen($this->url) >= 8) {
            $this->url = substr(strstr($_SERVER['REQUEST_URI'], '/public_html/'), 12);
        } else {
            $this->url = $_SERVER['REQUEST_URI'];
        }
        $this->url = rtrim($this->url, '\\/');
        return $this->url;
    }

    /**
     * Retorna array com tipos de requests aceitos pelo roteamento
     * @return array
     */
    public function getRequestMethods()
    {
        return $this->requestMethods;
    }

    /**
     * Emula metodos get, post, put, delete
     * @param $method
     * @param $patterBack
     * @throws \Exception
     */
    public function __call($method, $patterBack)
    {
        $method = strtoupper($method);

        if (!in_array($method, $this->getRequestMethods())) {
            throw new \Exception('Method http ' . $method . ' Invalid');
        }

        $rotas = array
        (
            'method' => $method,
            'pattern' => $patterBack[0],
            'calback' => $patterBack[1]
        );
        $this->dispatch($rotas);
    }

    /**
     * Método responsável por encontrar a rota que coincide com RequestUri
     * e passar o valores filtrados para o método private on() .
     * @param array $routes
     * @return bool
     */
    private function dispatch(Array $routes)
    {
        foreach ($routes as $parameter => $route) {
            if ($routes['method'] == $this->request->getMethod() && $this->isValidPattern($routes['pattern'])) {
                $this->colection($routes['calback']);
            }
        }
        return null;
    }

    /**
     * Método responsável por setar o pattern e retornar os partes válidos para a rota.
     * @param $pattern
     * @return int
     */
    private function isValidPattern($pattern)
    {
        $pattern = preg_replace('/:\w+/', '(\w+)', $pattern);
        $this->pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        return preg_match($this->pattern, $this->getUrl());

    }

    /**
     * Método responsável por setar as rotas pattern com os respectivos calbacks
     * que serão passadas para o método run().
     * @param $callback
     */
    private function colection($callback)
    {
        $this->routes[$this->pattern] = $callback;
    }

    /**
     * Método responsável por rodar a aplicação executando um callback
     * @return bool|mixed
     */
    public function run()
    {

        if($this->routes == null ? include __DIR__ .'/../app/Views/404.php' : $this->routes) ;

        if($this->routes != null){
            foreach ($this->routes as $pattern => $callback) {

                if (preg_match($pattern, $this->getUrl(), $params)) {
                    array_shift($params);
                    return call_user_func_array($callback, array_values($params));
                }
            }
        }
        return null;
    }
}