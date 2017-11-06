<?php

namespace Modulos\Classes;


class Registry
{
    /**
     * Instância única de Registry
     * @var Registry
     */
    private static $instance;

    /**
     * Nosso registro
     * @var ArrayObject
     */
    private $storage;

    /**
     * Registry é um caso de uso de Singleton
     */
    protected function __construct()
    {
        $this->storage = new \ArrayObject();
    }

    /**
     * Recupera um registro utilizando sua chave
     * @param string $key
     * @return mixed O valor armazenado
     * @throws RuntimeException Se não houver um registro para a chave especificada
     */
    public function getRegistry($key)
    {
        if ($this->storage->offsetExists($key)) {
            return $this->storage->offsetGet($key);
        } else {
            throw new \RuntimeException(sprintf('Não existe um registro para a chave "%s".', $key));
        }
    }

    /**
     * Recupera a instância única de Registry
     * @return Registry
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Registry();
        }

        return self::$instance;
    }

    /**
     * Registra um valor à uma chave
     * @param string $key A chave que será utilizada no registro
     * @param mixed $value O valor que será registrado
     * @throws LogicException Se a chave já estiver registrada
     */
    public function setRegistry($key, $value)
    {
        if (!$this->storage->offsetExists($key)) {
            $this->storage->offsetSet($key, $value);
        } else {
            throw new LogicException(sprintf('Já existe um registro para a chave "%s".', $key));
        }
    }

    /**
     * Remove o registro de uma chave específica
     * @param string $key A chave que será removida
     * @throws RuntimeException Se não houver um registro para a chave especificada
     */
    public function unregister($key)
    {
        if ($this->storage->offsetExists($key)) {
            $this->storage->offsetUnset($key);
        } else {
            throw new RuntimeException(sprintf('Não existe um registro para a chave "%s".', $key));
        }
    }
}