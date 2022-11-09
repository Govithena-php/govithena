<?php

class signoutController extends Controller
{
    public function index()
    {
        session_start();
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        session_destroy();
        $this->redirect('/');
    }
}
