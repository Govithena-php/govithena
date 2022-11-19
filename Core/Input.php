<?php

class Input
{
    private $value;

    function __construct($val)
    {
        $this->value = $val;
    }

    function get()
    {
        return $this->value;
    }

    function set($val)
    {
        $this->value = $val;
    }

    function isEmpty()
    {
        return empty($this->value);
    }

    function sanatizeText()
    {
        $temp = trim($this->value);
        $temp = stripslashes($temp);
        $temp = htmlspecialchars($temp);
        $this->value = $temp;
    }

    function sanatizeEmail()
    {
        $this->sanatizeText();
        $this->value = filter_var($this->value, FILTER_SANITIZE_EMAIL);
    }

    function sanatizePassword()
    {
        $this->sanatizeText();
        $this->value = filter_var($this->value, FILTER_SANITIZE_STRING);
    }

    function isValidPassword()
    {
        $uppercase = preg_match('@[A-Z]@', $this->value);
        $lowercase = preg_match('@[a-z]@', $this->value);
        $number    = preg_match('@[0-9]@', $this->value);
        $specialChars = preg_match('@[^\w]@', $this->value);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->value) < 8)
            return false;

        return true;
    }
}
