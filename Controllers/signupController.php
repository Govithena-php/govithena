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

            $firstName = new Input($_POST['firstName']);
            $lastName = new Input($_POST['lastName']);
            $email = new Input($_POST['email']);
            $password = new Input($_POST['password']);
            $confirmPassword = new Input($_POST['confirmPassword']);

            $firstName->sanatizeText();
            $lastName->sanatizeText();
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
            echo $email->get();

            if (!isset($res)) {
                $this->redirect('/servererror');
                return;
            }

            if ($res > 0) {
                $this->redirect('/signup/error/1'); //username already exists
            } else {
                $uid = uniqid();
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

                $this->redirect('/signin');
            }
        }
        $this->render('index');
    }

    public function error($msg)
    {

        switch ($msg) {
            case 1:
                $msg = "Email already exists";
                break;
            case 2:
                $msg = "All fields are required";
                break;
            case 3:
                $msg = "Password must be 8 characters long and contain at least one number and one special character";
                break;
            case 4:
                $msg = "Passwords do not match";
                break;
            default:
                $msg = "Unknown error";
                break;
        }
        $this->set(['msg' => $msg]);
        $this->render('index');
    }
}
