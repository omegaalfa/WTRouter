<?php

namespace App\Lib\Http\HttpInterface;

/**
 * Representação de uma resposta externa, do lado do servidor.
 *
 * Por especificação HTTP, esta interface inclui propriedades para
 * Cada um dos seguintes:
 *
 * - Versão do protocolo
 * - Código de status e frase de razão
 * - Cabeçalhos
 * - Corpo da mensagem
 *
 * As respostas são consideradas imutáveis; Todos os métodos que podem mudar o estado DEVE
 * Ser implementado de forma a reter o estado interno da corrente
 * Mensagem e retornar uma instância que contém o estado alterado.
 */
interface ResponseInterface
{
    /**
     * Gets the response status code.
     *
     * O código de status é um código de resultado inteiro de 3 dígitos da tentativa do servidor
     * Para entender e satisfazer o pedido.
     *
     * @return int Status code.
     */
    public function getStatusCode();

    /**
     * Responsável por retornar a messangem do código de resposta.
     *
     * @param $code
     * @return String: Retorna a messangem de resposta do status code.
     */
    public function getMessageStatusCode($code);

    /**
     * Retorna o tipo de do conteúdo da resposta
     *
     * @param $data
     * @param string $type
     * @return mixed
     */
    public function response($data, $type = '');

}
