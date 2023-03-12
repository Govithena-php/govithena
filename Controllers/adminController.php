<?php

class adminController extends Controller
{
    private $currentUser;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::ADMIN)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function users()
    {
        $this->render('users');
    }

    public function investments()
    {
        $this->render('investments');
    }

    public function categories()
    {
        $this->render('categories');
    }

    public function complains()
    {
        $this->render('complains');
    }

    public function help()
    {
        $this->render('helpCenter');
    }
}
