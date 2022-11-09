<?php

class signoutController extends Controller
{
    public function index()
    {
        Session::unset(['uid', 'username']);
        Session::destroy();
        $this->redirect('/');
    }
}
