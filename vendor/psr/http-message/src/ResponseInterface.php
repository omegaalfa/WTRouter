<?php

namespace Psr\Http\Message;

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
interface ResponseInterface extends MessageInterface
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
     * Retorna uma instância com o código de status especificado e, opcionalmente, a frase de razão.
     *
     * Se nenhuma frase de razão for especificada, as implementações podem escolher o padrão
     * Para o RFC 7231 ou IANA recomendou a frase de razão para a resposta
     * Código de status.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Status atualizado e frase de razão.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @param int $code The 3-digit integer result code to set.
     * @param string $reasonPhrase The reason phrase to use with the
     * Código de status fornecido; Se nenhum for fornecido, implementações MAYO
     * Use os padrões como sugerido na especificação HTTP.
     * @return static
     * @throws \InvalidArgumentException For invalid status code arguments.
     */
    public function withStatus($code, $reasonPhrase = '');

    /**
     * Obtém a frase de razão de resposta associada ao código de status.
     *
     * Porque uma frase de razão não é um elemento obrigatório em uma resposta
     * Linha de status, o valor da frase de razão pode ser nulo. Implementações MAIO
     * Escolha para retornar a frase de razão recomendada RFC 7231 (ou aqueles
     * Listado no Registro de Código de Status HTTP IANA) para a resposta
     * Código de status.
     *
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @return string Reason phrase; must return an empty string if none present.
     */
    public function getReasonPhrase();
}
