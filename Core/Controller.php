<?php

class Controller
{

    var $vars = [];
    var $layout = false;

    public function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    public function render($filename)
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

    public function model($model)
    {
        require_once(ROOT . 'Models/' . $model . '.php');
        return new $model();
    }

    public function redirect($url)
    {
        header('Location: ' . URLROOT . $url);

        // header('location: http://localhost/govithena/signin/error.php');

    }

    public function goto($type)
    {
        switch ($type) {
            case ACTOR::INVESTOR:
                $this->redirect('/');
                break;
            case ACTOR::FARMER:
                $this->redirect('/farmer');
                break;
            case ACTOR::ADMIN:
                $this->redirect('/admin');
                break;
            case ACTOR::AGROLOGIST:
                $this->redirect('/agrologist');
                break;
            case ACTOR::TECH_ASSISTANT:
                $this->redirect('/tech');
                break;
        }
    }
}
