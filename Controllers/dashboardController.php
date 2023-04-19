<?php

class dashboardController extends Controller
{
    private $currentUser;

    private $investorGigModel;
    private $gigModel;
    private $userModel;
    private $fieldVisitModel;
    private $reviewByInvestorModel;
    private $farmerProgressModel;
    private $requestFarmerModel;
    private $investmentModel;
    private $bankAccountModel;
    private $widthdrawModel;
    private $profitModel;

    private $profilePictureHandler;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->investorGigModel = $this->model('investorGig');
        $this->gigModel = $this->model('gig');
        $this->userModel = $this->model('user');
        $this->fieldVisitModel = $this->model('fieldVisit');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');
        $this->farmerProgressModel = $this->model('farmerProgress');
        $this->requestFarmerModel = $this->model('requestFarmer');
        $this->investmentModel = $this->model('investment');
        $this->bankAccountModel = $this->model('bankAccount');
        $this->widthdrawModel = $this->model('widthrawl');
        $this->profitModel = $this->model('profit');

        $this->profilePictureHandler = new ImageHandler($folder = 'Uploads/profilePictures');
    }

    public function index()
    {
        $props = [];

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());
        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $totalWithdrawn = $this->widthdrawModel->getTotalWithdrawnByInvestor($this->currentUser->getUid());
        if ($totalWithdrawn['success']) {
            $props['totalWithdrawn'] = $totalWithdrawn['data']['totalWithdrawn'];
        }

        $totalProfit = $this->profitModel->getTotalProfitByInvestor($this->currentUser->getUid());
        if ($totalProfit['success']) {
            $props['totalProfit'] = $totalProfit['data']['totalProfit'];
        }
        $totalGain = $props['totalInvestment'] + $props['totalProfit'];
        $totalBalance = $totalGain - $props['totalWithdrawn'];
        $props['totalGain'] = $totalGain;
        $props['totalBalance'] = $totalBalance;


        $widthdrawals = $this->widthdrawModel->fetchAllBy($this->currentUser->getUid());
        if ($widthdrawals['success']) {
            $props['widthdrawals'] = $widthdrawals['data'];
        }

        $profits = $this->profitModel->fetchAllBy($this->currentUser->getUid());
        if ($profits['success']) {
            $props['profits'] = $profits['data'];
        }


        $props['investments'] = $this->investmentModel->fetchAllBy($this->currentUser->getUid());


        $this->set($props);
        $this->render('index');
    }

    public function gigs()
    {
        $props = [];
        // $investorGig = new $this->investorGigModel();
        // $gigs = $investorGig->fetchAllByInvestor($this->currentUser->getUid());
        // $this->set(['gigs' => $gigs]);


        $activeGigCount = $this->investorGigModel->countActiveGigByInvestor($this->currentUser->getUid());

        if ($activeGigCount['success']) {
            $props['activeGigCount'] = $activeGigCount['data']['count'];
        }

        $completedGigCount = $this->investorGigModel->countCompletedGigByInvestor($this->currentUser->getUid());

        if ($completedGigCount['success']) {
            $props['completedGigCount'] = $completedGigCount['data']['count'];
        }

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());

        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $activeGigs = $this->investorGigModel->fetchAllActiveGigByInvestor($this->currentUser->getUid());

        if ($activeGigs['success']) {
            $props['activeGigs'] = $activeGigs['data'];
        }

        $toReviewGigs = $this->investorGigModel->fetchAllToReviewGigByInvestor($this->currentUser->getUid());

        if ($toReviewGigs['success']) {
            $props['toReviewGigs'] = $toReviewGigs['data'];
        }

        $completedGigs = $this->investorGigModel->getCompletedGigsByInvestor($this->currentUser->getUid());

        if ($completedGigs['success']) {
            $props['completedGigs'] = $completedGigs['data'];
        }

        $this->set($props);
        $this->render('gigs');
    }

    public function gig($params)
    {
        $props = [];
        if (!isset($params[0]) || empty($params[0])) {
            $this->redirect('/error/dontHaveAccess/1');
        }
        $gigId = $params[0];

        $props['gig'] = $gig = $this->gigModel->fetchBy($gigId);
        if (!$props['gig']) {
            $this->redirect('/error/dontHaveAccess/2');
        }

        $gigImages  = $this->gigModel->fetchGigImages($gigId);
        if ($gigImages['success']) {
            $props['gigImages'] = $gigImages['data'];
        }

        $props['farmer'] = $this->userModel->fetchBy($gig['farmerId']);
        if (!$props['farmer']) {
            $this->redirect('/error/dontHaveAccess/3');
        }

        $fieldVisits = $this->fieldVisitModel->fetchAllByGig($gigId);
        if ($fieldVisits['success']) {
            $props['fieldVisits'] = $fieldVisits['data'];
        }

        $progress = $this->farmerProgressModel->fetchAllByGig($gigId);
        $props['progress'] = [];
        if ($progress['success']) {
            foreach ($progress['data'] as $pg) {
                $progressImages = [];
                $temp = $this->farmerProgressModel->fetchImagesByProgressId($pg['progressId']);
                foreach ($temp['data'] as $key => $value) {
                    $progressImages[$key] = $value['imageName'];
                }
                $pg['images'] = $progressImages;
                $props['progress'][] = $pg;
            }
        }

        $totalInvestment = $this->investorGigModel->getTotalInvestmentForGigByInvestor($this->currentUser->getUid(), $gigId);
        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $startedDate = $this->investorGigModel->getStartedDate($gigId);

        if ($startedDate['success']) {
            $start = new DateTime($startedDate['data']['startDate']);
            $end = new DateTime();
            $props['numberOfDaysLeft'] = $start->diff($end)->days;
        }

        $investments = $this->investmentModel->fetchByInvestorAndGig($this->currentUser->getUid(), $gigId);
        if ($investments['success']) {
            $props['investments'] = $investments['data'];
        }

        // accpted data
        // gig
        // farmer
        // progress
        // investment
        // expreses
        // profit
        // agrologist reports
        // messsages





        $this->set($props);
        $this->render('gig');
    }


    public function review($params)
    {
        $props = [];
        if (!isset($params[0]) || empty($params[0])) {
            $this->redirect('/error/dontHaveAccess/1');
        }
        $gigId = $params[0];
        Session::set(['gigId' => $gigId]);

        $props['gig'] = $gig = $this->gigModel->fetchBy($gigId);
        if (!$props['gig']) {
            $this->redirect('/error/dontHaveAccess/2');
        }

        $props['farmer'] = $this->userModel->fetchBy($gig['farmerId']);
        if (!$props['farmer']) {
            $this->redirect('/error/dontHaveAccess/3');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit_review'])) {
                $data = [
                    'reviewId' => new UID(PREFIX::REVIEW),
                    'investorId' => $this->currentUser->getUid(),
                    'gigId' => Session::pop('gigId'),
                    'q1' => new Input(POST, 'q1'),
                    'q2' => new Input(POST, 'q2'),
                    'q3' => new Input(POST, 'q3'),
                    'q4' => new Input(POST, 'q4'),
                    'q5' => new Input(POST, 'q5'),
                    'q6' => new Input(POST, 'q6'),
                    'q7' => new Input(POST, 'q7'),
                    'q8' => new Input(POST, 'q8'),
                    'q9' => new Input(POST, 'q9'),
                ];

                $response = $this->reviewByInvestorModel->save($data);
                if ($response['success']) {
                    $res = $this->investorGigModel->markAsCompleted($gigId);
                    if ($res['success']) {
                        $this->redirect('/dashboard/gigs/');
                    }
                }
            }
        }



        $this->set($props);
        $this->render('review');
    }

    public function myinvestments()
    {
        $props = [];

        $investments = $this->investmentModel->fetchAllBy($this->currentUser->getUid());
        if (isset($investments)) {
            $props['investments'] = $investments;
        } else {
            $props['error'] = "no investments found";
        }

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());

        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $joinedDate = $this->userModel->getJoinedDate($this->currentUser->getUid());
        if ($joinedDate['success']) {
            $start = new DateTime($joinedDate['data']['createdAt']);
            $end = new DateTime();
            $diff = date_diff($end, $start);
            $months = $diff->format('%m');
            $props['monthSinceJoined'] = $months;
        }

        $thisMonthInvestment = $this->investmentModel->getThisMonthTotalByInvestor($this->currentUser->getUid());

        if ($thisMonthInvestment['success']) {
            $thisMonth = $thisMonthInvestment['data']['thisMonthInvestment'];
            $lastMonthInvestment = $this->investmentModel->getLastMonthTotalByInvestor($this->currentUser->getUid());
            if ($lastMonthInvestment['success']) {
                $lastMonth = $lastMonthInvestment['data']['lastMonthInvestment'];
                if ($lastMonth == 0) {
                    $lastMonth = 1;
                }
                $precentage = round(((intval($thisMonth) - intval($lastMonth)) / intval($lastMonth) * 100), 2);
                $props['precentage'] = $precentage;
                $props['lastMonthInvestment'] = $lastMonth;
            }
            $props['thisMonthInvestment'] = $thisMonth;
        }

        $completedGigs = $this->investorGigModel->getCompletedGigCount($this->currentUser->getUid());
        if ($completedGigs['success']) {
            $activeGigs = $this->investorGigModel->getActiveGigCount($this->currentUser->getUid());
            if ($activeGigs['success']) {
                $props['totalGigs'] = intval($activeGigs['data']['gigCount']) + intval($completedGigs['data']['gigCount']);
                $props['activeGigs'] = $activeGigs['data']['gigCount'];
            }
        }





        $this->set($props);
        $this->render('myinvestments');
    }

    public function withdraw()
    {
        $props = [];

        $withdrawls = $this->widthdrawModel->fetchAllBy($this->currentUser->getUid());

        if ($withdrawls['success']) {
            $props['withdrawls'] = $withdrawls['data'];
        }


        $this->set($props);
        $this->render('withdraw');
    }


    public function myrequests()
    {

        $uid = Session::get('user')->getUid();


        $requests = $this->requestFarmerModel->getRequestsByInvestor($uid);
        $pendingRequests = [];
        $acceptedRequests = [];
        $rejectedRequests = [];
        if (isset($requests)) {
            foreach ($requests as $request) {
                if ($request['state'] == 'ACCEPTED') {
                    array_push($acceptedRequests, $request);
                } else if ($request['state'] == 'PENDING') {
                    array_push($pendingRequests, $request);
                } else if ($request['state'] == 'REJECTED') {
                    array_push($rejectedRequests, $request);
                }
            }

            $this->set(['pr' => $pendingRequests, 'ar' => $acceptedRequests, 'rr' => $rejectedRequests]);
        } else {
            $this->set(['error' => "no requests found"]);
        }


        $this->render('myrequests');
    }

    public function myaccount()
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
        $this->render('myaccount');
    }

    public function settings()
    {
        $this->render('settings');
    }

    public function myrequest_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestId = new Input(POST, 'deleteRequest-confirm');
            $response = $this->requestFarmerModel->delete($requestId);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully deleted request.');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error deleting request.');
            }
            Session::set(['myrequest_delete_alert' => $alert]);
            $this->redirect('/dashboard/myrequests');
        }
    }

    public function resend_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestId = new Input(POST, 'request-resend');
            $offer = new Input(POST, 'resendOffer');
            $message = new Input(POST, 'resendMessage');

            $data = [
                'id' => $requestId,
                'offer' => $offer,
                'message' => $message
            ];

            $response = $this->requestFarmerModel->resend($data);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully resent.');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error resending.');
            }
            Session::set(['resend_request_alert' => $alert]);
            $this->redirect('/dashboard/myrequests');
        }
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
            $this->redirect('/dashboard/myaccount');
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
            $this->redirect('/dashboard/myaccount');
        }
    }

    public function add_new_bank_account()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user' => new Input(POST, 'n-userId'),
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
            $this->redirect('/dashboard/myaccount');
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
            $this->redirect('/dashboard/myaccount');
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
                $this->redirect('/dashboard/myaccount/ok');
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated bank account');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error updating bank account');
            }
            Session::set(['edit_bank_account_alert' => $alert]);
            $this->redirect('/dashboard/myaccount');
        }
    }
}
