<?php

class UUID
{
    private $prefix;
    private $key;
    private $suffix;

    function __construct($type = "", $prefix = "", $suffix = "")
    {
        if(empty($type))
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $key = uniqid();
        $this->key = $suffix . $key . $prefix;
    }

    public function get()
    {
        return $this->key;
    }
}
