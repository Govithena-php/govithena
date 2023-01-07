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

                    if (str_contains($v[1], '%20')) {
                        $v[1] = str_replace('%20', ' ', $v[1]);
                    }
                    if (str_contains($v[1], '+')) {
                        $v[1] = str_replace('+', ' ', $v[1]);
                    }
                    if (str_contains($v[1], '%25')) {
                        $v[1] = str_replace('%25', '%', $v[1]);
                    }
                    if (str_contains($v[1], '%40')) {
                        $v[1] = str_replace('%40', '@', $v[1]);
                    }
                    if (str_contains($v[1], '%2F')) {
                        $v[1] = str_replace('%2F', '/', $v[1]);
                    }
                    // $param[$v[0]] = $v[1];
                    $_GET[$v[0]] = $v[1];
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
