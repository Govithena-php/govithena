<?php

use function PHPSTORM_META\type;

class Input
{
    private $value = "";
    private $method = POST;

    public function __construct($val)
    {
        $parms = func_get_args();
        $numOfParms = func_num_args();

        if ($numOfParms == 1) {
            $this->value = $this->method[$parms[0]];
        } else if ($numOfParms > 1) {
            $this->method = $parms[0];
            $this->value = $this->method[$parms[1]];
        } else {
            $this->value = "";
            die('ERROR: Invalid number of parameters');
        }
    }

    public function get()
    {
        return $this->value;
    }

    public function set($val)
    {
        $this->value = $val;
    }

    public function isEmpty()
    {
        return empty($this->value);
    }

    public function sanatizeText()
    {
        $temp = trim($this->value);
        $temp = stripslashes($temp);
        $temp = htmlspecialchars($temp);
        $this->value = $temp;
    }

    public function sanatizeEmail()
    {
        $this->value = filter_var($this->value, FILTER_SANITIZE_EMAIL);
    }

    public function sanatizePassword()
    {
        $this->value = filter_var($this->value, FILTER_SANITIZE_STRING);
    }

    public function isValidPassword()
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
