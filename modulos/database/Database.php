<?php


namespace Modulos\Database;


class Database
{
    /**
     * @var string
     */
    private $host = HOST;

    /**
     * @var string
     */
    private $user = USER;

    /**
     * @var string
     */
    private $pass = PASS;

    /**
     * @var string
     */
    private $charset = CHARSET;

    /**
     * @var string
     */
    private $db = DB;

    /**
     * Instãncia singleton
     * @var DB
     */
    private static $instance;

    /**
     * Conexão com o banco de dados
     * @var \PDO
     */
    private static $connection;

    /**
     * Construtor privado da classe singleton
     */
    protected function __construct()
    {
        try {
            $opcoes = array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                \PDO::ATTR_PERSISTENT         => true
            );
            self::$connection = new \PDO("mysql:host=" . $this->host . "; dbname=" . $this->db . "; charset=" . $this->charset . ";",
                $this->user, $this->pass, $opcoes);
        } catch (\PDOException $e) {
            phpErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

    }

    /**
     * Obtém a instancia da classe DB
     * @return type
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Retorna a conexão PDO com o banco de dados
     * @return \PDO
     */
    public static function getConn()
    {
        self::getInstance();
        return self::$connection;
    }

    /**
     * Prepara a SQl para ser executada posteriormente
     * @param String $sql
     * @return \PDOStatement stmt
     */
    public static function prepare($sql)
    {
        return self::getConn()->prepare($sql);
    }

    /**
     * Retorna o id da última consulta INSERT
     * @return int
     */
    public static function lastInsertId()
    {
        return self::getConn()->lastInsertId();
    }

    /**
     * Inicia uma transação
     * @return bool
     */
    public static function beginTransaction()
    {
        return self::getConn()->beginTransaction();
    }

    /**
     * Comita uma transação
     * @return bool
     */
    public static function commit()
    {
        return self::getConn()->commit();
    }

    /**
     * Realiza um rollback na transação
     * @return bool
     */
    public static function rollBack()
    {
        return self::getConn()->rollBack();
    }

}