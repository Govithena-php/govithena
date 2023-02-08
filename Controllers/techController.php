<?php

class techController extends Controller
{
    private $currentUser;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::TECH_ASSISTANT)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function farmers()
    {
        $this->render('farmers');
    }

    public function requests()
    {
        $this->render('requests');
    }

    public function farmerdetails()
    {
        $this->render('farmerdetails');
    }

    public function myaccount()
    {
        $this->render('myaccount');
    }

    public function dashboard()
    {
        $this->render('dashboard');
    }
}
