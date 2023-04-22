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
}
