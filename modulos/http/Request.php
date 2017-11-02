<?php

namespace Modulos\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;


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

    /**
     * Retrieves the HTTP protocol version as a string.
     *
     * The string MUST contain only the HTTP version number (e.g., "1.1", "1.0").
     *
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    /**
     * Return an instance with the specified HTTP protocol version.
     *
     * The version string MUST contain only the HTTP version number (e.g.,
     * "1.1", "1.0").
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new protocol version.
     *
     * @param string $version HTTP protocol version
     * @return static
     */
    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    /**
     * Retrieves all message header values.
     *
     * The keys represent the header name as it will be sent over the wire, and
     * each value is an array of strings associated with the header.
     *
     *     // Represent the headers as a string
     *     foreach ($message->getHeaders() as $name => $values) {
     *         echo $name . ": " . implode(", ", $values);
     *     }
     *
     *     // Emit headers iteratively:
     *     foreach ($message->getHeaders() as $name => $values) {
     *         foreach ($values as $value) {
     *             header(sprintf('%s: %s', $name, $value), false);
     *         }
     *     }
     *
     * While header names are not case-sensitive, getHeaders() will preserve the
     * exact case in which headers were originally specified.
     *
     * @return string[][] Returns an associative array of the message's headers. Each
     *     key MUST be a header name, and each value MUST be an array of strings
     *     for that header.
     */
    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    /**
     * Checks if a header exists by the given case-insensitive name.
     *
     * @param string $name Case-insensitive header field name.
     * @return bool Returns true if any header names match the given header
     *     name using a case-insensitive string comparison. Returns false if
     *     no matching header name is found in the message.
     */
    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
    }

    /**
     * Retrieves a message header value by the given case-insensitive name.
     *
     * This method returns an array of all the header values of the given
     * case-insensitive header name.
     *
     * If the header does not appear in the message, this method MUST return an
     * empty array.
     *
     * @param string $name Case-insensitive header field name.
     * @return string[] An array of string values as provided for the given
     *    header. If the header does not appear in the message, this method MUST
     *    return an empty array.
     */
    public function getHeader($name)
    {
        // TODO: Implement getHeader() method.
    }

    /**
     * Retrieves a comma-separated string of the values for a single header.
     *
     * This method returns all of the header values of the given
     * case-insensitive header name as a string concatenated together using
     * a comma.
     *
     * NOTE: Not all header values may be appropriately represented using
     * comma concatenation. For such headers, use getHeader() instead
     * and supply your own delimiter when concatenating.
     *
     * If the header does not appear in the message, this method MUST return
     * an empty string.
     *
     * @param string $name Case-insensitive header field name.
     * @return string A string of values as provided for the given header
     *    concatenated together using a comma. If the header does not appear in
     *    the message, this method MUST return an empty string.
     */
    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    /**
     * Return an instance with the provided value replacing the specified header.
     *
     * While header names are case-insensitive, the casing of the header will
     * be preserved by this function, and returned from getHeaders().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new and/or updated header and value.
     *
     * @param string $name Case-insensitive header field name.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }

    /**
     * Return an instance with the specified header appended with the given value.
     *
     * Existing values for the specified header will be maintained. The new
     * value(s) will be appended to the existing list. If the header did not
     * exist previously, it will be added.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * new header and/or value.
     *
     * @param string $name Case-insensitive header field name to add.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    /**
     * Return an instance without the specified header.
     *
     * Header resolution MUST be done without case-sensitivity.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that removes
     * the named header.
     *
     * @param string $name Case-insensitive header field name to remove.
     * @return static
     */
    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    /**
     * Return an instance with the specified message body.
     *
     * The body MUST be a StreamInterface object.
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return a new instance that has the
     * new body stream.
     *
     * @param StreamInterface $body Body.
     * @return static
     * @throws \InvalidArgumentException When the body is not valid.
     */
    public function withBody(StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    /**
     * Recupera o alvo de solicitação da mensagem.
     *
     * Recupera o pedido-alvo da mensagem, como ele aparecerá (para
     * Clientes), conforme apareceu a pedido (para servidores), ou como era
     * Especificado para a instância (veja withRequestTarget ()).
     *
     * Na maioria dos casos, esta será a origem-forma do URI composto,
     * A menos que tenha sido fornecido um valor à implementação concreta (ver
     * WithRequestTarget () abaixo).
     *
     * Se nenhum URI estiver disponível, e nenhum pedido-alvo foi especificamente
     * Desde que este método DEVE retornar uma string "/".
     *
     * @return string
     */
    public function getRequestTarget()
    {
        // TODO: Implement getRequestTarget() method.
    }

    /**
     * Devolver uma instância com o específico request-target.
     *
     * Se o pedido precisar de um pedido de destino não-origem - por exemplo, para
     * Especificando uma forma absoluta, forma de autoridade ou forma de asterisco -
     * Este método pode ser usado para criar uma instância com o especificado
     * Request-target, verbatim.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Alvo de solicitação alterada.
     *
     * @link http://tools.ietf.org/html/rfc7230#section-5.3 (for the various
     *     request-target forms allowed in request messages)
     * @param mixed $requestTarget
     * @return static
     */
    public function withRequestTarget($requestTarget)
    {
        // TODO: Implement withRequestTarget() method.
    }

    /**
     * Retorna uma instância com o método HTTP fornecido.
     *
     * Enquanto os nomes dos métodos HTTP são tipicamente todos os caracteres maiúsculos, HTTP
     * Os nomes dos métodos são sensíveis a maiúsculas e minúsculas e, portanto, as implementações NÃO DEVEM
     * Modifique a string fornecida.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Método de pedido alterado.
     *
     * @param string $method Case-sensitive method.
     * @return static
     * @throws \InvalidArgumentException for invalid HTTP methods.
     */
    public function withMethod($method)
    {
        // TODO: Implement withMethod() method.
    }

    /**
     * Retorna uma instância com o URI fornecido.
     *
     * Este método DEVE atualizar o cabeçalho Host da solicitação retornada por
     * Padrão se o URI contiver um componente host. Se a URI não
     * Contém um componente de host, qualquer cabeçalho de host pré-existente DEVE ser carregado
     * Para o pedido devolvido.
     *
     * Você pode optar por preservar o estado original do cabeçalho do host por
     * Configuração `$ preserveHost` para` true`. Quando `$ preserveHost` estiver configurado para
     * `True`, esse método interage com o cabeçalho Host das seguintes maneiras:
     *
     * - Se o cabeçalho do host está ausente ou vazio, e o novo URI contém
     * Um componente host, este método DEVE atualizar o cabeçalho Host no retorno
     * Pedido.
     * - Se o cabeçalho Host estiver ausente ou vazio, e o novo URI não contém um
     * Componente do host, este método NÃO DEVE atualizar o cabeçalho do host no retorno
     * Pedido.
     * - Se um cabeçalho Host estiver presente e não vazio, este método NÃO DEVE atualizar
     * O cabeçalho Host na solicitação retornada.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Nova instância UriInterface.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @param UriInterface $uri New request URI to use.
     * @param bool $preserveHost Preserve the original state of the Host header.
     * @return static
     */
    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        // TODO: Implement withUri() method.
    }
}