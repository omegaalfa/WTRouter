<?php


namespace Event;


class Event
{

    private $name;
    private $data;
    private $object;

    function __construct($name, $data = null)
    {
        $this->name = $name;
        $this->data = (array)$data;
    }

    function __get($prop)
    {
        if($this->data[$prop] != null){
            return $this->data[$prop];
        }
    }

    function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }


}