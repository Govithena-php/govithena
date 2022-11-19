<?php

class paramsExampleController extends Controller
{

    function index($params)
    {
        echo "index" . "<br>";
        print_r($params);
        $this->render('index');
    }

    function a($params)
    {
        echo "a" . "<br>";
        print_r($params);
        $this->render('index');
    }

    function b($params)
    {
        $props['data'] = $params;
        $props['name'] = "Janith Madarasinghe";
        $this->set($props);
        $this->render('index');
    }
}
