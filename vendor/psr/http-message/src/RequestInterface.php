<?php

namespace Psr\Http\Message;

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
interface RequestInterface extends MessageInterface
{
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
    public function getRequestTarget();

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
    public function withRequestTarget($requestTarget);

    /**
     * Recupera o método HTTP da solicitação.
     *
     * @return string Returns the request method.
     */
    public function getMethod();

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
    public function withMethod($method);

    /**
     * Recupera a instância URI.
     *
     * Este método DEVE retornar uma instância UriInterface.
     *
     * @link http://tools.ietf.org/html/rfc3986#section-4.3
     * @return UriInterface Returns a UriInterface instance
     *     representing the URI of the request.
     */
    public function getUri();

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
    public function withUri(UriInterface $uri, $preserveHost = false);
}
