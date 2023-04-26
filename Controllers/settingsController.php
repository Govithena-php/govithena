<?php

class settingsController extends Controller
{
    private $currentUser;
    private $userModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->userModel = $this->model('user');
    }

    public function index()
    {
        $this->render('index');
    }

    public function change_password()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = new Input(POST, 'u-currentPassword');
            $currentPassword->sanatizePassword();

            $newPassword = new Input(POST, 'u-newPassword');
            $newPassword->sanatizePassword();

            $confirmNewPassword = new Input(POST, 'u-confirmNewPassword');
            $confirmNewPassword->sanatizePassword();

            if (!$newPassword->isValidPassword() || !$confirmNewPassword->isValidPassword()) {
                $this->redirect('/dashboard/settings/error/invalied-password');
                $error = 'Password must be 8 characters long and contain at least one number and one special character.';
                return;
            }

            if ($newPassword != $confirmNewPassword) {
                $this->redirect('/dashboard/settings/error/passwords-dont-match');
                return;
            }

            $uid = Session::get('user')->getUid();


            $response = $this->userModel->fetchByUid($uid);
            if ($response['success']) {
                if (password_verify($currentPassword, $response['data']['password'])) {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    echo $uid;
                    echo '<br>';
                    echo $passwordHash;
                    $response = $this->userModel->updatePasswordByUid($uid, $passwordHash);
                    if ($response['status']) {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully changed password.');
                    } else {
                        $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                    }
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Invalid password.');
                }
                Session::set(['password_changed_alert' => $alert]);
                $this->redirect('/settings');
            }
        }
    }


    public function change_email()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = new Input(POST, 'u-currentPassword');
            $currentPassword->sanatizePassword();

            $newEmail = new Input(POST, 'u-newEmail');
            $newEmail->sanatizeEmail();

            $uid = Session::get('user')->getUid();

            $response = $this->userModel->fetchByUid($uid);

            if ($response['success']) {
                if (password_verify($currentPassword, $response['data']['password'])) {
                    $response = $this->userModel->updateEmailByUid($uid, $newEmail);
                    if ($response['status']) {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully changed email.');
                    } else {
                        $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                    }
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Invalid password.');
                }
            }
            Session::set(['email_changed_alert' => $alert]);
            $this->redirect('/settings');
        }
    }

    public function delete_account()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = new Input(POST, 'd-currentPassword');
            $currentPassword->sanatizePassword();

            $uid = Session::get('user')->getUid();

            $response = $this->userModel->fetchByUid($uid);

            if ($response['success']) {
                if (password_verify($currentPassword, $response['data']['password'])) {
                    $response = $this->userModel->deleteByUid($uid);
                    if ($response['status']) {
                        $this->redirect('/auth/signout');
                    } else {
                        $this->redirect('/dashboard/settings/error/server-error');
                    }
                } else {
                    $this->redirect('/dashboard/settings/error/invalid-password');
                }
            }
        }
    }
}
