<?php

namespace App\Lib\Http;

use App\Lib\Http\HttpInterface\ResponseInterface;

class Response implements ResponseInterface
{
    protected $code = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );

    private $data;

    private function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Gets the response status code.
     *
     * O código de status é um código de resultado inteiro de 3 dígitos da tentativa do servidor
     * Para entender e satisfazer o pedido.
     *
     * @return int Status code.
     */
    public function getStatusCode()
    {
        return filter_input(INPUT_SERVER, 'REDIRECT_STATUS', FILTER_DEFAULT);
    }



    public static function json($data, $status = 200, $headers = false, $options = 0)
    {
        if(!isset($data)){
            throw new \Exception('Data Invalid');
        }
        if($headers){
            header('Content-Type: application/json; charset=utf-8');
        }
        return json_encode(self::toArray($data));
    }

    public static function object($data)
    {
        return json_decode($data);
    }

    public static function toArray($data)
    {
        $array = (array)(json_decode($data));
        return array($array);
    }
    /**
     * Responsável por retornar a messangem do código de resposta.
     *
     * @param $code
     * @return String: Retorna a messangem de resposta do status code.
     */
    public function getMessageStatusCode($code)
    {
        return $this->code[$code];
    }

    /**
     * Retorna o tipo de do conteúdo da resposta
     *
     * @param $data
     * @param string $type
     * @return mixed
     */
    public function response($data, $type = '')
    {
        // TODO: Implement response() method.
    }
}