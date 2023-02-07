<?php

class UID
{
    // length of mainType = 3
    // length of subType = 4
    // length of ukey = 13

    // prefix = reverse(mainType(3))

    //  suffix_1 = reverse(subType(:2))
    //  suffix_2 = reverse(subType(3:))

    // ukey(:4) + prefix + ukey(4:8) + suffix_2 + ukey(8:) suffix_1

    //ex: 0000 +esu + 0000 + ni + 00000 + ev = 0000esu0000ni00000ev

    private $prefix = "";
    private $suffix_1 = "";
    private $suffix_2 = "";
    private $key = "";
    private $uid = "";

    public function __construct($args)
    {
        $this->key = uniqid();

        if (strlen($this->key) < 13) {
            $this->key = str_pad($this->key, 13, "0", STR_PAD_LEFT);
        }

        $params = func_get_args();
        $numOfParams = func_num_args();

        if ($numOfParams == 0) {
            $this->uid =  $this->key;
        } else {

            if ($numOfParams == 1) {
                $this->prefix = strtolower($params[0]);
            }
            if ($numOfParams == 2) {
                $this->prefix = strrev($params[0]);
                $this->suffix_1 = strrev(substr($params[1], 0, 2));
                $this->suffix_2 = strrev(substr($params[1], 2));
            }


            $this->uid = substr($this->key, 0, 4) . $this->prefix . substr($this->key, 4, 4)  . $this->suffix_2 . substr($this->key, 8) . $this->suffix_1;
        }
    }

    public function __toString()
    {
        return $this->uid;
    }

    public function get()
    {
        return $this->uid;
    }
}
