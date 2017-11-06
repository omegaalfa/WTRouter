<?php

namespace Modulos\Database;


abstract class AbstractConnector
{
    private $host;
    private $dbname;
    private $user;
    private $password;

    public function __construct()
    {
        $this->host = HOST;
        $this->dbname = DB;
        $this->user = USER;
        $this->password = PASS;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getDbname()
    {
        return $this->dbname;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    abstract public function getDsn();
}