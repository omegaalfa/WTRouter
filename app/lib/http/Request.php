<?php

namespace App\Lib\Http;

use App\Lib\Http\HttpInterface\RequestInterface;


/**
 * Class Request
 * @package Lib\http
 */
class Request implements RequestInterface

{
    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_OVERRIDE = '_METHOD';

    /**
     * Método responsável por retornar a queryString presente na URI do pedido.
     *
     * @return String: Retorna a queryString presente na URI do pedido.
     */
    public function getQueryString()
    {
        return filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_STRING);
    }

    /**
     * Método responsável por retornar a URI do pedido.
     *
     * @return String: Retorna a URI em formado de string
     */
    public function getUri()
    {
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
        return trim($url);
    }

    /**
     * Método responsável por retornar o tipo de conteúdo da solicitação.
     *
     * Ex: (application/x-www-form-urlencoded)
     *
     * @return String: Retorna o tipo de conteúdo em formado de string
     */
    public function getContentType()
    {
        return (isset($_SERVER['CONTENT_TYPE'])) ? $_SERVER['CONTENT_TYPE'] : null;
    }

    /**
     * Método responsável por retornar o método Http.
     *
     * GET, POST, PUT, DELETE
     *
     * @return mixed
     */
    public function getMethod()
    {
        return (isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    }


    /**
     * Método responsável por retornar o corpo da solicitação de um pedido.
     *
     * @return String
     */
    public function getBody()
    {
        return filter_input_array(INPUT_POST, FILTER_DEFAULT);
    }
}