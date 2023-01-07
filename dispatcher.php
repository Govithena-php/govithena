<?php

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        if (!method_exists($controller, $this->request->action)) {
            array_unshift($this->request->params, $this->request->action);
            $this->request->action = "index";
        }

        // print_r($_GET);
        // $this->request->printR();

        call_user_func_array([$controller, $this->request->action], array($this->request->params));
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';

        if (!file_exists($file)) {
            $name = 'errorController';
            $file = ROOT . 'Controllers/errorController.php';
        }
        require($file);
        $controller = new $name();
        return $controller;
    }
}
