<?php

class authController extends Controller
{
    private $currentUser;

    private $mailer;

    private $userModel;
    private $otpModel;


    public function __construct()
    {

        $this->mailer = new Mailer(SMTPACCOUNT, SMTPPASSWORD, SMTPNAME);

        $this->userModel = $this->model('User');
        $this->otpModel = $this->model('Otp');
    }

    public function index()
    {
        $this->signin();
    }

    public function reset()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resetEmail = new Input(POST, 'resetEmail');
            $resetEmail->sanatizeEmail();

            $response = $this->userModel->fetchByEmail($resetEmail);
            if ($response['status'] = true) {
                if ($response['data'] == false) {
                    $this->redirect('/auth/reset/error/user-does-not-exist');
                    return;
                } else {
                    $user_name = $response['data']['firstName'];
                    $otp = rand(100000, 999999);
                    $otpHash = hash('sha256', $otp);

                    Session::unset(['email', 'user_name', 'otpHash']);
                    Session::set(['email' => $resetEmail, 'user_name' => $user_name, 'otpHash' => $otpHash]);

                    $response = $this->otpModel->saveOtp($resetEmail, $otpHash);
                    if ($response['status'] == true) {
                        // email otp

                        $body = $this->mailer->loadTemplate('otpMail', ['user' => $user_name, 'otp' => $otp]);
                        $subject = 'Your Password Reset OTP';

                        $res = $this->mailer->send($resetEmail, $subject, $body);
                        if ($res) {
                            echo 'sent';
                            $this->redirect('/auth/verify');
                        } else {
                            $this->redirect('/auth/reset/error/server-error');
                        }
                    } else {
                        $this->redirect('/auth/reset/error/server-error');
                    }
                }
            }
            var_dump($response);
            die();
        }

        $this->render('reset');
    }


    public function verify()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

        if (!Session::has('otpHash') && !Session::get('email')) {
            $this->redirect('/auth');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $otp = new Input(POST, 'otp');
            $otp->sanatizePassword();
            // echo $otp;
            // echo '<br>';
            $email = Session::get('email');
            $user_name = Session::get('user_name');

            $response = $this->otpModel->fetchOtpByEmail($email);

            if ($response['status'] == true) {
                $now = new DateTime();
                $created_at = new DateTime($response['data']['createdAt']);
                $diff = $now->getTimestamp() - $created_at->getTimestamp();

                if ($diff > 300) {
                    $this->redirect('/auth/reset/error/otp-expired');
                } else {
                    if (hash('sha256', $otp) == $response['data']['otpHash']) {
                        Session::unset(['otpHash']);
                        Session::set(['otpHash' => $response['data']['otpHash']]);
                        $this->redirect('/auth/newpwd');
                    } else {
                        $this->redirect('/auth/reset/error/invalid-otp');
                    }
                }
            }
        }

        $this->render('verify');
    }

    public function newpwd()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

        if (!Session::has('otpHash') && !Session::get('email')) {
            $this->redirect('/auth');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $password = new Input(POST, 'newPassword');
            $password->sanatizePassword();

            $confirmPassword = new Input(POST, 'confirmPassword');
            $confirmPassword->sanatizePassword();

            if (!$password->isValidPassword() || !$confirmPassword->isValidPassword()) {
                $this->redirect('/auth/newpwd/error/invalied-password');
                $error = 'Password must be 8 characters long and contain at least one number and one special character.';
                return;
            }

            if ($password != $confirmPassword) {
                $this->redirect('/auth/newpwd/error/passwords-dont-match');
                return;
            }

            $email = Session::get('email');
            $password = password_hash($password, PASSWORD_DEFAULT);
            $response = $this->userModel->updatePassword($email, $password);
            if ($response['status'] == true) {
                Session::unset(['email', 'user_name', 'otpHash']);
                $this->redirect('/auth/signout');
            } else {
                $this->redirect('/auth/newpwd/error/server-error');
            }
        }
        $this->render('newpwd');
    }


    public function resend()
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

        if (!Session::has('otpHash') && !Session::get('email')) {
            $this->redirect('/auth');
            return;
        }

        $email = Session::get('email');
        $user_name = Session::get('user_name');
        $otp = rand(100000, 999999);
        $otpHash = hash('sha256', $otp);

        Session::unset(['otpHash']);
        Session::set(['otpHash' => $otpHash]);

        $response = $this->otpModel->saveOtp($email, $otpHash);
        if ($response['status'] == true) {
            // email otp

            $body = $this->mailer->loadTemplate('otpMail', ['user' => $user_name, 'otp' => $otp]);
            $subject = 'Your Password Reset OTP';

            $res = $this->mailer->send($email, $subject, $body);
            if ($res) {
                echo 'sent';
                $this->redirect('/auth/verify');
            } else {
                $this->redirect('/auth/reset/error/server-error');
            }
        } else {
            $this->redirect('/auth/reset/error/server-error');
        }
    }


    public function signin($params = null)
    {

        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

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
                echo $response['data'];
                die();
                $this->redirect('/auth/signin/error');
                return;
            }

            if ($response['data'] == false) {
                $this->redirect('/auth/signin/error');
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
                $this->redirect('/auth/signin/error');
            }
        }

        $this->set($props);
        $this->render('signin');
    }

    public function servey()
    {
        $this->render('servey');
    }

    public function signup($params = [])
    {
        if (Session::isLoggedIn()) {
            $this->redirect('/');
        }

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
