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

            $email = new Input($_POST['email']);
            $password = new Input($_POST['password']);

            $email->sanatizeEmail();
            $password->sanatizePassword();

            $user = new User();
            $res = $user->findByEmail($email->get());

            if (!empty($res)) {
                echo "in";
                if (password_verify($password->get(), $res['password'])) {

                    Session::set([
                        'uid' => $res['uid'],
                        'username' => $res['username']
                    ]);
                    $this->redirect('/');
                } else {
                    $this->redirect('/signin/error');
                }
            } else {
                $this->redirect('/signin/error');
            }
        }
        // $this->render('home');
    }

    public function error()
    {

        $this->set(['msg' => "Invalied email or password"]);
        $this->render('index');
    }
}
