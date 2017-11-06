<?php

namespace Modulos\Database;


interface IConnector
{
    public function connect(AbstractConnector $connector);

    public function disconnect();

    public function isConnected();

    public function getConnection();
} 