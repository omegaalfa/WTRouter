<?php

namespace App\Lib\Http\HttpInterface;

/**
 * Representação de uma solicitação de saída, cliente-cliente.
 *
 * Por especificação HTTP, esta interface inclui propriedades para
 * Cada um dos seguintes:
 *
 * - Protocol version
 * - HTTP method
 * - URI
 * - Headers
 * - Message body
 *
 * Durante a construção, as implementações DEVEM tentar configurar o cabeçalho do Host de
 * URI fornecido se nenhum cabeçalho Host for fornecido.
 *
 * Os pedidos são considerados imutáveis; Todos os métodos que podem mudar o estado DEVE
 * Ser implementado de forma a reter o estado interno da corrente
 * Mensagem e retornar uma instância que contém o estado alterado.
 */
interface RequestInterface
{
    /**
     * Método responsável por retornar o método Http.
     *
     * GET, POST, PUT, DELETE
     *
     * @return mixed
     */
    public function getMethod();


    /**
     * Método responsável por retornar o tipo de conteúdo da solicitação.
     *
     * Ex: (application/x-www-form-urlencoded)
     *
     * @return String: Retorna o tipo de conteúdo em formado de string
     */
    public function getContentType();

    /**
     * Método responsável por retornar a URI do pedido.
     *
     * @return String: Retorna a URI em formado de string
     */
    public function getUri();

    /**
     * Método responsável por retornar a queryString presente na URI do pedido.
     *
     * @return String: Retorna a queryString presente na URI do pedido.
     */
    public function getQueryString();

    /**
     * Método responsável por retornar o corpo da solicitação de um pedido.
     * @return String
     */
    public function getBody();

}
