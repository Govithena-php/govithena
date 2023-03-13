<?php

class authController extends Controller
{
    private $currentUser;
    private $userModel;
    public function __construct()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $this->signin();
    }

    public function signin($params = null)
    {
        $props = ['error' => false];

        if (isset($params[0])) {
            if ($params[0] == 'error') {
                $props['error'] = true;
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $email = new Input(POST, 'email');
            $password = new Input(POST, 'password');

            $email->sanatizeEmail();
            $password->sanatizePassword();

            $response = $this->userModel->fetchByEmail($email);

            if ($response['status'] == false) {
                $this->redirect('/auth/signin/error/server-error');
                return;
            }

            if ($response['data'] == false) {
                $this->redirect('/auth/signin/error/user-does-not-exist');
                return;
            }

            $data = $response['data'];

            if (password_verify($password, $data['password'])) {

                if (!isset($data['image']) || empty($data['image']))
                    $data['image'] = 'default.jpg';

                $this->currentUser = new ActiveUser(
                    $data['uid'],
                    $data['username'],
                    $data['firstName'],
                    $data['lastName'],
                    $data['userType'],
                    $data['image'],
                    true
                );

                $this->goto($data['userType']);
            } else {
                $this->redirect('/auth/signin/error/password-mismatch');
            }
        }

        $this->set($props);
        $this->render('signin');
    }

    public function servey()
    {
        $this->render('servey');
    }

    public function signup2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $actor = "";
            if (isset($_POST['actor'])) {
                $actor = new Input(POST, 'actor');
                Session::set(['actor' => $actor]);
                $this->render('signup');
                return;
            }

            require(ROOT . 'Models/user.php');

            $uid = new UID(PREFIX::USER);
            $firstName = new input(POST, 'firstName');
            $lastName = new input(POST, 'lastName');
            $email = new input(POST, 'email');
            $password = new input(POST, 'password');
            $confirmPassword = new input(POST, 'confirmPassword');

            $actor = Session::get('actor');

            $email->sanatizeEmail();
            $password->sanatizePassword();
            $confirmPassword->sanatizePassword();

            if ($firstName->isEmpty() || $lastName->isEmpty() || $email->isEmpty() || $password->isEmpty() || $confirmPassword->isEmpty()) {
                $this->redirect('/signup/error/all fields are required'); //all fields are required
                return;
            }

            if (!$password->isValidPassword() || !$confirmPassword->isValidPassword()) {
                $this->redirect('/signup/error/password must be 8 characters long and contain at least one number and one special character'); //password must be 8 characters long and contain at least one number and one special character
                return;
            }

            if ($password != $confirmPassword) {
                $this->redirect('/signup/error/passwords do not match'); //passwords do not match
                return;
            }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = new User();

            $response = $user->checkByEmail($email);

            if ($response['status'] == false || $response['data'] == true) {
                $this->redirect('/servererror');
                return;
            }

            $response = $user->createUser([
                'uid' => $uid,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'username' => $email,
                'password' => $password,
                'userType' => ACTOR::get($actor),
            ]);

            if ($response['status'] == false || $response['data'] == false) {
                $this->redirect('/servererror');
                return;
            }
            if ($response['data']) {
                $this->redirect('/auth/signin/ok');
            }
        } else {
            $this->render('actor');
        }
    }


    public function signup($params = [])
    {
        $props = [];
        if (!isset($params[0]) || empty($params[0])) {
            $this->render('actor');
        } else {
            $actor = $params[0];
            $props['actor'] = $actor;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $uid = new UID(PREFIX::USER);
                $firstName = new input(POST, 'firstName');
                $lastName = new input(POST, 'lastName');
                $email = new input(POST, 'email');
                $password = new input(POST, 'password');
                $confirmPassword = new input(POST, 'confirmPassword');

                $email->sanatizeEmail();
                $password->sanatizePassword();
                $confirmPassword->sanatizePassword();


                $error = "";
                if ($password != $confirmPassword) {
                    $error = 'Passwords do not match.';
                }
                if (!$password->isValidPassword() || !$confirmPassword->isValidPassword()) {
                    $error = 'Password must be 8 characters long and contain at least one number and one special character.';
                }
                if ($firstName->isEmpty() || $lastName->isEmpty() || $email->isEmpty() || $password->isEmpty() || $confirmPassword->isEmpty()) {
                    $error = 'All fields are required.';
                }
                $response = $this->userModel->checkByEmail($email);
                if ($response['status'] == false || $response['data'] == true) {
                    $error = 'This email is already in use.';
                }


                if ($error == "") {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $response = $this->userModel->createUser([
                        'uid' => $uid,
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'username' => $email,
                        'password' => $password,
                        'userType' => ACTOR::get(strtoupper($actor)),
                    ]);
                    if ($response['data']) {
                        $this->redirect('/auth/signin/ok');
                    }
                } else {
                    $props['error'] = $error;
                }
            }

            $this->set($props);
            $this->render('signup');
        }
    }

    public function signout()
    {
        Session::unset(['user']);
        Session::destroy();
        $this->redirect('/');
    }
}
