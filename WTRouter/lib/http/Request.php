<?php
/**
 * Created by PhpStorm.
 * User: HCNX
 * Date: 02/07/2017
 * Time: 22:08
 */

namespace Lib\http;


class Request
{
    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_OVERRIDE = '_METHOD';

    /**
     * Retorna o metodo atual ou GET por padrão
     * @return string
     */
    public function getMethod()
    {
        return (isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    }

    /**
     * Retorna o content-type do request atual
     * @return string
     */
    public function getContentType()
    {
        return (isset($_SERVER['CONTENT_TYPE'])) ? $_SERVER['CONTENT_TYPE'] : null;
    }
    
}
