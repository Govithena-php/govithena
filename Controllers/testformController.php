<?php

class testformController extends Controller
{

    public function index()
    {
        $this->render('index');
    }

    public function test()
    {
        print_r($_POST);
    }
}
