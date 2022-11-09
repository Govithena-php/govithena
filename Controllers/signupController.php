<?php

class signupController extends Controller
{

    public function index()
    {
        $this->render('index');
    }

    public function test()
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
                $this->redirect('/signup/a/email-already-exists');
            } else {
                $res = $user->create([
                    'username' => $username,
                    'password' => $password
                ]);
                // $this->redirect('/signin');
            }
        }

        $this->render('signin');
    }

    public function a()
    {
        $this->render('stest');
    }
}
