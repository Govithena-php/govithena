<?php

class profileController extends Controller
{

    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }
    }

    public function index($params)
    {
        var_dump($params);
        $this->render('index');
    }
}
