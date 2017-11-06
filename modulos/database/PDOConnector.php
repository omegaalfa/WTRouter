<?php

namespace Modulos\Database;


final class PDOConnector
{
    /**
     * Instãncia singleton
     * @var DB
     */
    private $instance;

    /**
     * @var array
     */
    private $config;

    /**
     * @param $config
     * @throws \Exception
     */
    public function __construct($config)
    {
        $arquivo = __DIR__ . DS . 'dbase.ini';

        if (!file_exists($arquivo)) {
            throw new \Exception('Erro: Arquivo não encontrado');
            exit;
        }
        $this->config = parse_ini_file($arquivo);

        try {
            $setAtribute = array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                \PDO::ATTR_PERSISTENT         => true,
                \PDO::ERRMODE_EXCEPTION
            );

            if (!$this->isConnected()) {
                $this->instance = new \PDO
                (
                    $this->config['host'] . ":
                    host=" . $this->config['servidor'] . ";
                    dbname=" . $this->config['banco'] . ";
                    charset=" . $this->config['charset'] . ";",
                    $this->config['usuario'],
                    $this->config['senha'],
                    $setAtribute
                );
            }
        } catch (\PDOException $e) {
            phpErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }
    }


    /**
     * Impedir clonagem
     */
    private function __clone()
    {
    }


    /**
     * Impedir utilização do Unserialize
     */
    private function __wakeup()
    {
    }


    public function connect()
    {
        //return $this->load();
    }

    public function disconnect()
    {
        if ($this->isConnected()) {
            $this->instance = null;
        }
    }

    public function isConnected()
    {
        return ($this->instance instanceof \PDO);
    }

    public function getConnection()
    {
        if ($this->instance == null) {
            $this->connect();
        }
        return $this->instance;
    }
}