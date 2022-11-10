<?php

class signupController extends Controller
{
    public function __construct()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }
    }

    public function index()
    {
        require(ROOT . 'Models/user.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);


            $user = new User();
            $res = $user->findByEmail($username);

            if (!empty($res)) {
                echo "User already exists";
                $this->redirect('/signup/error/user-already-exists');
            } else {
                $res = $user->create([
                    'username' => $username,
                    'password' => $password
                ]);
                $this->redirect('/signin');
            }
        }
        $this->render('index');
    }

    public function error($msg)
    {
        $this->set(['msg' => $msg]);
        $this->render('index');
    }
}
