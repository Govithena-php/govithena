<?php

class adminController extends Controller
{
    private $currentUser;
    private $adminModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::ADMIN)) {
            $this->redirect('/error/dontHaveAccess');
        }
        $this->adminModel = $this->model('admin');
    }

    public function index()
    {
        $this->render('index');
    }

    public function users()
    {
        $props = [];

        $activeUsers = $this->adminModel->fetchAllActiveUsers();
        if ($activeUsers['success']) {
            $props['activeUsers'] = $activeUsers['data'];
        }

        $suspendedUsers = $this->adminModel->fetchAllSuspendedUsers();
        if ($suspendedUsers['success']) {
            $props['suspendedUsers'] = $suspendedUsers['data'];
        }

        $this->set($props);
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
