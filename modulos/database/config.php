<?php

$setAtribute = array(
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    \PDO::ATTR_PERSISTENT         => true,
    \PDO::ERRMODE_EXCEPTION
);

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'contaazul');
define('CHARSET', 'utf8');
define('SET_ATRIBUTE', $setAtribute);

