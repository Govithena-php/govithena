<?php

class accountController extends Controller
{
    private $currentUser;

    private $userModel;
    private $investmentModel;
    private $bankAccountModel;
    private $profitModel;


    private $profilePictureHandler;
    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if ($this->currentUser->hasAccess(ACTOR::ADMIN)) {
            $this->redirect('/error/dontHaveAccess');
        }


        $this->userModel = $this->model('user');
        $this->bankAccountModel = $this->model('bankAccount');
        $this->investmentModel = $this->model('investment');
        $this->profitModel = $this->model('profit');

        $this->profilePictureHandler = new ImageHandler($folder = 'Uploads/profilePictures');
    }

    public function index()
    {
        $props = [];

        $personalDetails = $this->userModel->getPersonalDetails($this->currentUser->getUid());
        if ($personalDetails['success']) {
            $props['personalDetails'] = $personalDetails['data'];
        }

        $bankDetails = $this->bankAccountModel->getBankDetails($this->currentUser->getUid());
        if ($bankDetails['success']) {
            $props['bankAccounts'] = $bankDetails['data'];
        }


        $joinedDate = $this->userModel->getJoinedDate($this->currentUser->getUid());
        if ($joinedDate['success']) {
            $start = new DateTime($joinedDate['data']['createdAt']);
            $end = new DateTime();
            $diff = date_diff($end, $start);
            $months = $diff->format('%m');
            $props['monthSinceJoined'] = $months;
        }

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());
        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $this->set($props);
        $this->render('index');
    }
    public function update_user_details()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'uid' => new Input(POST, 'u-submitBtn'),
                'firstName' => new Input(POST, 'u-firstName'),
                'lastName' => new Input(POST, 'u-lastName'),
                'phone' => new Input(POST, 'u-phone'),
                'addressLine1' => new Input(POST, 'u-addressLine1'),
                'addressLine2' => new Input(POST, 'u-addressLine2'),
                'postalCode' => new Input(POST, 'u-postalCode'),
                'city' => new Input(POST, 'u-city'),
                'district' => new Input(POST, 'u-district'),
            ];

            $response = $this->userModel->update($data);
            if ($response['success']) { 
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated your details');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error updating your details');
            }
            Session::set(['update_user_details_alert' => $alert]);
            $this->redirect('/account');
        }
    }


    public function change_profile_picture()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uid = new Input(POST, 'u-submitBtn');
            try {
                $profilePicture = $this->profilePictureHandler->upload('u-profilePicture');

                $this->currentUser->setImage($profilePicture[0]);
                Session::unset(['user']);
                Session::set(['user' => $this->currentUser]);
                $data = [
                    'uid' => $uid,
                    'profilePicture' => $profilePicture[0]
                ];

                $response = $this->userModel->updateProfilePicture($data);
                if ($response['success']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully changed your profile picture');
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Error changing your profile picture');
                }
            } catch (Exception $e) {
                $alert = new Alert($type = 'error', $icon = "", $message =  $e->getMessage());
            }
            Session::set(['change_profile_picture_alert' => $alert]);
            $this->redirect('/account');
        }
    }

    public function add_new_bank_account()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'userId' => new Input(POST, 'n-userId'),
                'bank' => new Input(POST, 'n-bank'),
                'accountNumber' => new Input(POST, 'n-accountNumber'),
                'branch' => new Input(POST, 'n-branch'),
                'branchCode' => new Input(POST, 'n-branchCode'),
            ];


            $response = $this->bankAccountModel->add($data);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully added new bank account');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error adding new bank account');
            }
            Session::set(['add_new_bank_account_alert' => $alert]);
            $this->redirect('/account');
        }
    }


    public function delete_bank_account()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $accountNumber =  new Input(POST, 'deleteBankAccount-confirm');

            $response = $this->bankAccountModel->delete($accountNumber);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully deleted bank account');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error deleting bank account');
            }
            Session::set(['delete_bank_account_alert' => $alert]);
            $this->redirect('/account');
        }
    }

    public function edit_bank_account()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'oldAccountNumber' => new Input(POST, 'u-oldAccountNumber'),
                'bank' => new Input(POST, 'u-bank'),
                'accountNumber' => new Input(POST, 'u-accountNumber'),
                'branch' => new Input(POST, 'u-branch'),
                'branchCode' => new Input(POST, 'u-branchCode'),
            ];

            $response = $this->bankAccountModel->update($data);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated bank account');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error updating bank account');
            }
            Session::set(['edit_bank_account_alert' => $alert]);
            $this->redirect('/account');
        }
    }
}
