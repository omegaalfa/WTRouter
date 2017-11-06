<?php


abstract class ActiveRecord
{

    public function save() //: bool
    {
        //...
    }

    public function load(int $id) //: ActiveRecord
    {
        //...
    }

    public function delete() //: bool
    {
        //...
    }

    public function find(string $param) //: array
    {
        //...
    }
}