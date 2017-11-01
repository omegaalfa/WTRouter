<?php

namespace Psr\Http\Message;

/**
 * Representação de uma solicitação HTTP recebida, do lado do servidor.
 *
 * Por especificação HTTP, esta interface inclui propriedades para
 * Cada um dos seguintes:
 *
 * - Versão do protocolo
 * - Método HTTP
 * - URI
 * - Cabeçalhos
 * - Corpo da mensagem
 *
 * Além disso, encapsula todos os dados conforme chegou ao
 * Aplicativo do ambiente CGI e / ou PHP, incluindo:
 *
 * - Os valores representados em $ _SERVER.
 * - Todos os cookies fornecidos (geralmente via $ _COOKIE)
 * - Argumentos de string de consulta (geralmente via $ _GET, ou como analisado via parse_str ())
 * - Carregar arquivos, se houver (como representado por $ _FILES)
 * - Parâmetros deserializados do corpo (geralmente de $ _POST)
 *
 * $ _SERVER valores DEVEM ser tratados como imutáveis, pois representam a aplicação
 * Estado no momento do pedido; Como tal, não são fornecidos métodos para permitir
 * Modificação desses valores. Os outros valores fornecem esses métodos, como eles
 * Pode ser restaurado a partir de $ _SERVER ou o corpo do pedido e pode precisar de tratamento
 * Durante a aplicação (por exemplo, os parâmetros do corpo podem ser deserializados com base em
 * tipo de conteúdo).
 *
 * Além disso, esta interface reconhece a utilidade de introspecção de um
 * Solicitação para derivar e combinar parâmetros adicionais (por exemplo, via caminho URI
 * Correspondência, descodificando os valores dos cookies, deserializando o corpo não codificado
 * Conteúdo, correspondência de cabeçalhos de autorização para usuários, etc.). Esses parâmetros
 * São armazenados em uma propriedade "atributos".
 *
 * Os pedidos são considerados imutáveis; Todos os métodos que podem mudar o estado DEVE
 * Ser implementado de forma a reter o estado interno da corrente
 * Mensagem e retornar uma instância que contém o estado alterado.
 */
interface ServerRequestInterface extends RequestInterface
{
    /**
     * Recuperar parâmetros do servidor.
     *
     * Recupera dados relacionados ao ambiente de solicitação recebida,
     * Tipicamente derivado do $ _SERVER superglobal do PHP. Os dados NÃO ESTÃO
     * REQUERIDO para originar de $ _SERVER.
     *
     * @return array
     */
    public function getServerParams();

    /**
     * Recuperar cookies.
     *
     * Recupera os cookies enviados pelo cliente para o servidor.
     *
     * Os dados DEVEM ser compatíveis com a estrutura do $ _COOKIE
     * Superglobal.
     *
     * @return array
     */
    public function getCookieParams();

    /**
     * Retorna uma instância com os cookies especificados.
     *
     * Os dados NÃO EXIGEM para vir do $ _COOKIE superglobal, mas DEVE
     * Seja compatível com a estrutura de $ _COOKIE. Normalmente, esses dados
     * Ser injetado na instanciação.
     *
     * Este método NÃO DEVE atualizar o cabeçalho de Cookie relacionado do pedido
     * Instância, nem valores relacionados nos params do servidor.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Valores de cookies atualizados.
     *
     * @param array $cookies Array of key/value pairs representing cookies.
     * @return static
     */
    public function withCookieParams(array $cookies);

    /**
     * Recuperar argumentos de cadeia de consulta.
     *
     * Recupera os argumentos de cadeia de consulta deserializados, se houver.
     *
     * Nota: os params de consulta podem não estar em sincronia com o URI ou o servidor
     * Params. Se você precisa garantir que você esteja apenas obtendo o original
     * Valores, você precisará analisar a seqüência de consulta de `getUri () -> getQuery ()`
     * Ou do parâmetro do servidor `QUERY_STRING`.
     *
     * @return array
     */
    public function getQueryParams();

    /**
     * Retorna uma instância com os argumentos de cadeia de consulta especificados.
     *
     * Estes valores DEVEM permanecer imutáveis ​​ao longo da entrada
     * Pedido. Eles podem ser injetados durante a instanciação, como do PHP
     * $ _GET superglobal, ou pode ser derivado de algum outro valor, como o
     * URI. Nos casos em que os argumentos são analisados ​​a partir do URI, os dados
     * DEVE ser compatível com o que parse_str () do PHP retornaria para
     * Fins de como os parâmetros de consulta duplicados são tratados e como aninhados
     * Conjuntos são tratados.
     *
     * Configuração de argumentos de seqüência de consulta NÃO DEVE alterar o URI armazenado pelo
     *, Nem os valores nos parâmetros do servidor.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Argumentos de cadeia de consulta atualizados.
     *
     * @param array $query Array of query string arguments, typically from
     *     $_GET.
     * @return static
     */
    public function withQueryParams(array $query);

    /**
     * Recuperar dados de upload de arquivos normalizados.
     *
     * Este método retorna metadados de upload em uma árvore normalizada, com cada folha
     * Uma instância de Psr \ Http \ Message \ UploadedFileInterface.
     *
     * Estes valores podem ser preparados a partir de $ _FILES ou o corpo da mensagem durante
     * Instanciação, ou pode ser injetado via withUploadedFiles ().
     *
     * @return Array Uma árvore de matriz de instâncias UploadedFileInterface; um vazio
     * Array DEVE ser retornado se nenhum dado estiver presente.
     */
    public function getUploadedFiles();

    /**
     * Crie uma nova instância com os arquivos carregados especificados.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Parâmetros atualizados do corpo.
     *
     * @param array $uploadedFiles An array tree of UploadedFileInterface instances.
     * @return static
     * @throws \InvalidArgumentException if an invalid structure is provided.
     */
    public function withUploadedFiles(array $uploadedFiles);

    /**
     * Recupere os parâmetros fornecidos no corpo da solicitação.
     *
     * Se a solicitação Content-Type for aplicação / x-www-form-urlencoded
     * Ou multipart / form-data, eo método de solicitação é POST, este método DEVE
     * Retornar o conteúdo de $ _POST.
     *
     * Caso contrário, este método pode retornar os resultados da deserialização
     * O conteúdo do corpo do pedido; Como análise de conteúdo estruturado, o
     * Os tipos potenciais DEVEM ser apenas arrays ou objetos. Um valor nulo indica
     * A ausência de conteúdo no corpo.
     *
     * @return null|array|object Os parâmetros desserializados do corpo, se houver.
     * Estes geralmente serão uma matriz ou objeto.
     */
    public function getParsedBody();

    /**
     * Retorna uma instância com os parâmetros especificados do corpo.
     *
     * Estes podem ser injetados durante a instanciação.
     *
     * Se a solicitação Content-Type for aplicação / x-www-form-urlencoded
     * Ou multipart / form-data, eo método de solicitação é POST, use este método
     * SOMENTE para injetar o conteúdo de $ _POST.
     *
     * O dado NÃO É NECESSÁRIO para vir de $ _POST, mas DEVE ser o resultado de
     * Deserializando o conteúdo do corpo da solicitação. Deserialização / análise de retorno
     * Dados estruturados e, como tal, este método APENAS aceita arrays ou objetos,
     * Ou um valor nulo se nada estivesse disponível para analisar.
     *
     * Como exemplo, se a negociação de conteúdo determinar que os dados da solicitação
     * É uma carga útil JSON, este método pode ser usado para criar um pedido
     * Instância com os parâmetros desserializados.
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Parâmetros atualizados do corpo.
     *
     * @param null|array|object $data Os dados desserializados do corpo. Isso vai
     * Normalmente está em uma matriz ou objeto.
     * @return static
     * @throws \InvalidArgumentException if an unsupported argument type is
     *     provided.
     */
    public function withParsedBody($data);

    /**
     * Recuperar atributos derivados da solicitação.
     *
     * Os "atributos" de solicitação podem ser usados ​​para permitir a injeção de qualquer
     * Parâmetros derivados da solicitação: por exemplo, os resultados do caminho
     * Operações de correspondência; Os resultados de descodificar cookies; os resultados de
     * Deserializando corpos de mensagens codificados de forma não-formada; Etc. Atributos
     * Será aplicação e solicitação específica, e pode ser mutable.
     *
     * @return array Attributes derived from the request.
     */
    public function getAttributes();

    /**
     * Recuperar um único atributo de pedido derivado.
     *
     * Recupera um único atributo de solicitação derivada conforme descrito em
     * GetAttributes (). Se o atributo não tiver sido configurado anteriormente, retorna
     * O valor padrão conforme fornecido.
     *
     * Este método evita a necessidade de um método hasAttribute (), como ele permite
     * Especificando um valor padrão para retornar se o atributo não for encontrado.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $default Default value to return if the attribute does not exist.
     * @return mixed
     */
    public function getAttribute($name, $default = null);

    /**
     * Retorna uma instância com o atributo de solicitação derivada especificada.
     *
     * Este método permite configurar um único atributo de pedido derivado como
     * Descrito em getAttributes ().
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que tenha a
     * Atributo atualizado.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @param mixed $value The value of the attribute.
     * @return static
     */
    public function withAttribute($name, $value);

    /**
     * Retorna uma instância que remove o atributo de requisição derivada especificada.
     *
     * Este método permite a remoção de um único atributo de requisição derivado como
     * Descrito em getAttributes ().
     *
     * Este método DEVE ser implementado de forma a reter o
     * Imutabilidade da mensagem, e DEVE retornar uma instância que remova
     * O atributo.
     *
     * @see getAttributes()
     * @param string $name The attribute name.
     * @return static
     */
    public function withoutAttribute($name);
}
