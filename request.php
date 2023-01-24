<?php
class Request
{
    public $url;
    public $controller;
    public $action;
    public $params;

    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }



    public function setParams($param)
    {
        foreach ($param as $key => $segment) {
            if (str_starts_with($segment, '?')) {
                $segment = substr($segment, 1);
                $val = explode('&', $segment);
                foreach ($val as $v) {
                    $v = explode('=', $v);
                    $_GET[$v[0]] = urldecode($v[1]);
                }
                unset($param[$key]);
            }
        }
        $this->params = $param;
    }
    public function getParams()
    {
        return $this->params;
    }

    public function printR()
    {
        echo "controller : " . $this->controller;
        echo "<br>";
        echo "action : " . $this->action;
        echo "<br>";
        echo "params : ";
        print_r($this->params);
        die();
    }
}
