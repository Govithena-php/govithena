<?php

class Controller
{

    var $vars = [];
    var $layout = false;

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();
        echo ($content_for_layout);
        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layout/" . $this->layout . '.php');
        }
    }

    function redirect($url)
    {
        header('Location: ' . URLROOT . $url);

        // header('location: http://localhost/govithena/signin/error.php');

    }
}
