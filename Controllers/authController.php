<?php

class authController extends Controller
{
    public function __construct()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }
    }

    public function index()
    {
        $this->signin();
    }

    public function signin()
    {
        require(ROOT . 'Models/user.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = new Input(POST, 'email');
            $password = new Input(POST, 'password');

            $email->sanatizeEmail();
            $password->sanatizePassword();

            $user = new User();
            $res = $user->findByEmail($email->get());

            if (!empty($res)) {

                if (password_verify($password->get(), $res['password'])) {

                    Session::set([
                        'uid' => $res['uid'],
                        'username' => $res['username']
                    ]);
                    $this->redirect('/');
                } else {
                    $this->redirect('/signin/error/1');
                }
            } else {
                $this->redirect('/signin/error/2');
            }
        }
        $this->render('signin');
    }


    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            require(ROOT . 'Models/user.php');
            $uid = (new UID(USER, INVESTOR))->get();

            $firstName = new Input(POST, 'firstName');
            $lastName = new Input(POST, 'lastName');
            $email = new Input(POST, 'email');
            $password = new Input(POST, 'password');
            $confirmPassword = new Input(POST, 'confirmPassword');

            $email->sanatizeEmail();
            $password->sanatizePassword();
            $confirmPassword->sanatizePassword();

            if ($firstName->isEmpty() || $lastName->isEmpty() || $email->isEmpty() || $password->isEmpty() || $confirmPassword->isEmpty()) {
                $this->redirect('/signup/error/2'); //all fields are required
                return;
            }

            if (!$password->isValidPassword() || !$confirmPassword->isValidPassword()) {
                $this->redirect('/signup/error/3'); //password must be 8 characters long and contain at least one number and one special character
                return;
            }

            if ($password->get() != $confirmPassword->get()) {
                $this->redirect('/signup/error/4'); //passwords do not match
                return;
            }

            $password = password_hash($password->get(), PASSWORD_DEFAULT);

            $user = new User();

            $res = $user->findByEmail($email->get());

            if (!isset($res)) {
                $this->redirect('/servererror');
                return;
            }
            if (!empty($res)) {
                $this->redirect('auth/signup/error/1'); //username already exists
            } else {
                $res = $user->create([
                    'uid' => $uid,
                    'username' => $email->get(),
                    'password' => $password,

                ]);
                if (!isset($res)) {
                    $this->redirect('/servererror');
                    return;
                }
                $res = $user->createUser([
                    'uid' => $uid,
                    'firstName' => $firstName->get(),
                    'lastName' => $lastName->get(),
                ]);
                if (!isset($res)) {

                    $this->redirect('/servererror');
                    return;
                }
                $this->redirect('/auth/signin');
            }
        }

        $this->render('signup');
    }


    public function signout()
    {
        Session::unset(['uid', 'username']);
        Session::destroy();
        $this->redirect('/');
    }
}
