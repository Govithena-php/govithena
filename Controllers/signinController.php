<?php

class signinController extends Controller
{

    public function __construct()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function login()
    {
        require(ROOT . 'Models/user.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            $res = $user->findByEmail($username);

            if (!empty($res)) {
                if (password_verify($password, $res['password'])) {

                    Session::set([
                        'uid' => $res['uid'],
                        'username' => $res['username']
                    ]);
                    $this->redirect('/');
                } else {
                    $this->redirect('/signin/error/invalied-username-or-password');
                }
            } else {
                $this->redirect('/signin/error/invalied-username-or-password');
            }
        }
        // $this->render('home');
    }

    public function error($msg)
    {
        $this->set(['msg' => $msg]);
        $this->render('index');
    }
}
