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

    public function suspend_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $suspendUser = new Input(POST, 'suspend-confirm');
            $response = $this->adminModel->suspendUser($suspendUser);
            if ($response['success']) {
                $this->redirect('/admin/users');
            } else {
                $this->redirect('/error/500');
            }
        }
    }

    public function reactivate_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reactiveUser = new Input(POST, 'reactivate-confirm');
            $response = $this->adminModel->reactivateUser($reactiveUser);
            if ($response['success']) {
                $this->redirect('/admin/users');
            } else {
                $this->redirect('/error/500');
            }
        }
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
