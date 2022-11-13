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



            $username = $_POST['username'];
            $password = $_POST['password'];
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];


            $password = password_hash($password, PASSWORD_DEFAULT);


            $user = new User();
            $res = $user->findByEmail($username);

            if (!empty($res)) {
                echo "User already exists";
                $this->redirect('/signup/error/user-already-exists');
            } else {
                $uid = uniqid();
                // secho $uid;
                $res = $user->create([
                    'uid' => $uid,
                    'username' => $username,
                    'password' => $password,

                ]);
                if ($res) {

                    $res = $user->createUser([
                        'uid' => $uid,
                        'fName' => $fName,
                        'lName' => $lName,
                    ]);

                    $this->redirect('/signin');
                } else {
                    $this->redirect('/signup/error/unknown');
                }
                // $this->redirect('/signin');
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
