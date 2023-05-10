<?php

class techController extends Controller
{
    private $currentUser;

    private $progressImageHandler;

    private $techModel;
    private $progressModel;
    private $gigModel;
    private $techWithdrawalModel;
    private $bankAccountModel;


    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::TECH)) {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->progressImageHandler = new ImageHandler($folder = 'Uploads/progress');


        $this->techModel = $this->model('techAssistant');
        $this->progressModel = $this->model('progress');
        $this->gigModel = $this->model('gig');
        $this->techWithdrawalModel = $this->model('techWithdrawal');
        $this->bankAccountModel = $this->model('bankAccount');
    }

    public function index()
    {
        $this->render('index');
    }

    public function farmers()
    {
        $props = [];
        $farmers = $this->techModel->getFarmers();
        if ($farmers['success']) {
            $props['farmers'] = $farmers['data'];
        }
        $this->set($props);
        $this->render('farmers');
    }

    public function requests()
    {
        $props = [];

        $farmerRequests = $this->techModel->farmerRequest();
        if ($farmerRequests['success']) {
            $props['farmerRequests'] = $farmerRequests['data'];
        }

        $rejectedFarmerRequests = $this->techModel->getRejectedFarmerRequest();
        if ($rejectedFarmerRequests['success']) {
            $props['rejectedFarmerRequests'] = $rejectedFarmerRequests['data'];
        }
        $this->set($props);
        $this->render('requests');
    }

    public function farmerdetails()
    {
        $this->render('farmerdetails');
    }

    public function myaccount()
    {
        $this->render('myaccount');
    }


    public function accept_farmer_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reqId = new Input(POST, 'acceptRequest-confirm');
            $res = $this->techModel->acceptRequest($reqId);
            if ($res) {
                $data = $this->techModel->getRequestData($reqId);
                $this->techModel->addTechFarmer([
                    'techId' => $data[0]['technicalAssistantId'],
                    'farmerId' => $data[0]['farmerId']
                ]);
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully accepted request.');
                Session::set(['farmer_request_accept_alert' => $alert]);
            } else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'accept request failed.');
                Session::set(['farmer_request_accept_alert' => $alert]);
            }
            $this->redirect('/tech');
        }
    }

    public function reject_farmer_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reqId = new Input(POST, 'rejectRequest-confirm');
            $res = $this->techModel->rejectRequest($reqId);
            if ($res) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully rejected request.');
                Session::set(['farmer_request_reject_alert' => $alert]);
            } else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'reject request failed.');
                Session::set(['farmer_request_reject_alert' => $alert]);
            }
            $this->redirect('/tech');
        }
    }

    public function assignedGigs()
    {

        $props = [];

        $assignedGigs = $this->techModel->getAssignedGigs($this->currentUser->getUid());
        if ($assignedGigs['success']) {
            $props['assignedGigs'] = $assignedGigs['data'];
        }

        $this->set($props);
        $this->render('assignedGigs');
    }

    public function updateProgress()
    {
        $this->render('updateProgress');
    }

    public function assignedGig()
    {
        $props = [];
        $this->set($props);
        $this->render('assignedGig');
    }

    public function editGig($params = [])
    {
        $props = [];

        if (!empty($params)) $gigId = $params[0];

        $res = $this->techModel->checkGig($gigId);
        if ($res['success'] && $res['data'] == true) {
            $gig = $this->techModel->findGigById($gigId);
            if ($gig['success']) {
                $props['gig'] = $gig['data'];
            }
        } else {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->set($props);
        $this->render('editGig');
    }

    public function progress($params = [])
    {
        $props = [];

        if (!empty($params[0])) $gigId = $params[0];

        $res = $this->techModel->checkGig($gigId);
        if ($res['success'] && $res['data'] == true) {
            $progress = $this->techModel->getProgressById($gigId);
            if ($progress['success']) {

                $temp = $progress['data'];

                $imagesArray = [];
                foreach ($temp as $t) {
                    $images = $this->techModel->fetchImagesByProgressId($t['progressId']);
                    if ($images['success']) {
                        $a = [];
                        foreach ($images['data'] as $i) {
                            $a[] = $i['imageName'];
                        }

                        $imagesArray[$t['progressId']] = $a;
                    }
                }

                $props['gigId'] = $gigId;
                $props['progress'] = $temp;
                $props['images'] = $imagesArray;
            }
        } else {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->set($props);
        $this->render('progress');
    }


    public function delete_progress()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $progressId = new Input(POST, 'delete-confirm');
            $gigId = new Input(POST, 'gigId');

            $response = $this->progressModel->deleteProgress($progressId);

            if ($response['success']) {
                $res = $this->progressModel->deleteProgressImages($progressId);

                if ($res['success']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully deleted progress.');
                } else {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to delete progress.');
                }
            } else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to delete progress.');
            }

            Session::set(['delete_progress_alert' => $alert]);
        }

        $this->redirect('/tech/progress/' . $gigId);
    }

    public function newProgress($params = [])
    {
        $props = [];

        if (!empty($params[0])) $gigId = $params[0];

        $res = $this->techModel->checkGig($gigId);
        if ($res['success'] && $res['data'] == true) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $progressId = new UID(PREFIX::PROGRESS);
                $subject = new Input(POST, 'subject');
                $description = new Input(POST, 'description');

                $data = [
                    'progressId' => $progressId,
                    'gigId' => $gigId,
                    'userId' => $this->currentUser->getUid(),
                    'userType' => 'TECHASSISTANT',
                    'subject' => $subject,
                    'description' => $description
                ];

                // var_dump($data);

                $response = $this->progressModel->createNewProgress($data);
                // var_dump($response);die();
                if ($response['success']) {
                    $images = $this->progressImageHandler->upload('images');
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $res = $this->progressModel->saveProgressImage([
                                'progressId' => $progressId,
                                'imageName' => $image
                            ]);

                            if ($res['success']) {
                                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully added progress.');
                            } else {
                                $alert = new Alert($type = 'error', $icon = "", $message = 'Failed to add progress.');
                            }
                        }
                    } else {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to add progress.');
                    }
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Failed to add progress.');
                }
                Session::set(['progress_add_alert' => $alert]);
                $this->redirect('/tech/progress/' . $gigId);
            }
        } else {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->set($props);
        $this->render('newProgress');
    }

    public function update_progress($params = [])
    {
        if (!empty($params)) $gigId = $params[0];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $progressId = new Input(POST, 'u-editProgressBtn');

            $subject = new Input(POST, 'u-subject');
            $description = new Input(POST, 'u-description');

            $response = $this->progressModel->updateProgress([
                'progressId' => $progressId,
                'subject' => $subject,
                'description' => $description
            ]);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated progress.');
            } else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to update progress.');
            }
            Session::set(['gig_update_progress_alert' => $alert]);
        }
        $this->redirect('/tech/progress/' . $gigId);
    }

    public function update_gig_details()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gigId = new Input(POST, 'u-submitBtn');
            $res = $this->techModel->checkGig($gigId);
            if ($res['success'] && $res['data']) {

                $response = $this->gigModel->updateGigDetails([
                    'gigId' => $gigId,
                    'title' => new Input(POST, 'u-title'),
                    'category' => new Input(POST, 'u-category'),
                    'cropCycle' => new Input(POST, 'u-cropCycle'),
                    'landArea' => new Input(POST, 'u-landArea'),
                    'initialInvestment' => new Input(POST, 'u-initialInvestment'),
                    'profitMargin' => new Input(POST, 'u-profitMargin')
                ]);

                if ($response['success']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated gig details.');
                } else {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to update gig details.');
                }

                Session::set(['gig_update_details_alert' => $alert]);
            }
        }
        $this->redirect('/tech/editGig/' . $gigId);
    }

    public function update_gig_location_details()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gigId = new Input(POST, 'u-submitBtn');
            $res = $this->techModel->checkGig($gigId);
            if ($res['success'] && $res['data']) {

                $response = $this->gigModel->updateGigLocation([
                    'gigId' => $gigId,
                    'addressLine1' => new Input(POST, 'u-addressLine1'),
                    'addressLine2' => new Input(POST, 'u-addressLine2'),
                    'city' => new Input(POST, 'u-city'),
                    'district' => new Input(POST, 'u-district'),
                ]);

                if ($response['success']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated location details.');
                } else {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to update location details.');
                }
                Session::set(['gig_update_location_details_alert' => $alert]);
            }
        }
        $this->redirect('/tech/editGig/' . $gigId);
    }

    public function update_gig_description_details()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gigId = new Input(POST, 'u-submitBtn');
            $res = $this->techModel->checkGig($gigId);
            if ($res['success'] && $res['data']) {

                $response = $this->gigModel->updateGigDescription([
                    'gigId' => $gigId,
                    'description' => new Input(POST, 'u-description')
                ]);

                if ($response['success']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated gig description.');
                } else {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Failed to update gig description.');
                }

                Session::set(['update_gig_description_details_alert' => $alert]);
            }
        }
        $this->redirect('/tech/editGig/' . $gigId);
    }

    public function earnings()
    {
        $this->render('earnings');
    }

    public function withdrawal()
    {
        $props = [];

        $thisMonthTotalWithdrawals = $this->techWithdrawalModel->getThisMonthTotalWithdrawalsTechId($this->currentUser->getUid());
        if ($thisMonthTotalWithdrawals['success']) {
            $props['thisMonthTotalWithdrawals'] = $thisMonthTotalWithdrawals['data']['totalWithdrawal'];
        }

        $thisMonthTotalWithdrawals = $this->techWithdrawalModel->getTotalWithdrawalsTechId($this->currentUser->getUid());
        if ($thisMonthTotalWithdrawals['success']) {
            $props['totalWithdrawals'] = $thisMonthTotalWithdrawals['data']['totalWithdrawal'];
        }

        $techWithdrawal = $this->techWithdrawalModel->getWithdrawalByTechId($this->currentUser->getUid());
        if ($techWithdrawal['success']) {
            $props['techWithdrawal'] = $techWithdrawal['data'];
        }

        $bankAccounts = $this->bankAccountModel->getBankDetails($this->currentUser->getUid());
        if ($bankAccounts['success']) {
            $props['bankAccounts'] = $bankAccounts['data'];
        }

        $this->set($props);
        $this->render('withdrawal');
    }
}
