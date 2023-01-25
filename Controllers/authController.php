<?php

class authController extends Controller
{
    private $currentUser;

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

        // $email = new Input(GET, 'email'); // this is how GET is used
        // echo $email; 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $email = new Input(POST, 'email');
            $password = new Input(POST, 'password');

            $email->sanatizeEmail();
            $password->sanatizePassword();

            $user = new User();
            $res = $user->findByEmail($email);

            if (!empty($res)) {

                if (password_verify($password, $res['password'])) {

                    $this->currentUser = new ActiveUser(
                        $res['uid'],
                        $res['username'],
                        "first name",
                        "last name",
                        $res['userType'],
                        true
                    );
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
            $uid = (new UID(USER, INVESTOR));

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

            if ($password != $confirmPassword) {
                $this->redirect('/signup/error/4'); //passwords do not match
                return;
            }

            $password = password_hash($password, PASSWORD_DEFAULT);

            $user = new User();

            $res = $user->findByEmail($email);

            if (!isset($res)) {
                $this->redirect('/servererror');
                return;
            }
            if (!empty($res)) {
                $this->redirect('auth/signup/error/1'); //username already exists
            } else {
                $res = $user->create([
                    'uid' => $uid,
                    'username' => $email,
                    'password' => $password,

                ]);
                if (!isset($res)) {
                    $this->redirect('/servererror');
                    return;
                }
                $res = $user->createUser([
                    'uid' => $uid,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
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
        Session::unset(['user']);
        Session::destroy();
        $this->redirect('/');
    }
}
