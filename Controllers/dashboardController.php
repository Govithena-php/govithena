<?php

class dashboardController extends Controller
{
    private $currentUser;
    private $investorGigModel;
    private $gigModal;
    private $userModal;
    private $fieldVisitModel;
    private $reviewByInvestorModel;
    private $farmerProgressModel;
    private $requestFarmerModel;
    private $investmentModel;

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
        $this->gigModal = $this->model('gig');
        $this->userModal = $this->model('user');
        $this->fieldVisitModel = $this->model('fieldVisit');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');
        $this->farmerProgressModel = $this->model('farmerProgress');
        $this->requestFarmerModel = $this->model('requestFarmer');
        $this->investmentModel = $this->model('investment');
    }

    public function index()
    {
        $this->render('index');
    }

    public function gigs()
    {
        $investorGig = new $this->investorGigModel();
        $gigs = $investorGig->fetchAllByInvestor($this->currentUser->getUid());
        $this->set(['gigs' => $gigs]);
        $this->render('gigs');
    }

    public function gig($params)
    {
        $props = [];
        if (!isset($params[0]) || empty($params[0])) {
            $this->redirect('/error/dontHaveAccess/1');
        }
        $gigId = $params[0];

        $props['gig'] = $gig = $this->gigModal->fetchBy($gigId);
        if (!$props['gig']) {
            $this->redirect('/error/dontHaveAccess/2');
        }

        $props['farmer'] = $this->userModal->fetchBy($gig['farmerId']);
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

        $props['gig'] = $gig = $this->gigModal->fetchBy($gigId);
        if (!$props['gig']) {
            $this->redirect('/error/dontHaveAccess/2');
        }

        $props['farmer'] = $this->userModal->fetchBy($gig['farmerId']);
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

                $reviewByInvestor = new $this->reviewByInvestorModel();
                $response = $reviewByInvestor->save($data);
                // if($response['success']){}
            }
        }



        $this->set($props);
        $this->render('review');
    }

    public function myinvestments()
    {
        require(ROOT . 'Models/investment.php');
        $uid = Session::get('user')->getUid();
        $i = new Investment();

        $investments = $i->fetchAllBy($uid);
        if (isset($investments)) {
            $this->set(['investments' => $investments]);
        } else {
            $this->set(['error' => "no investments found"]);
        }
        $this->render('myinvestments');
    }

    public function withdraw()
    {
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
                $this->redirect('/dashboard/myrequests/ok');
            } else {
                $this->redirect('/dashboard/myrequests/error');
            }
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
                $this->redirect('/dashboard/myrequests/ok');
            } else {
                $this->redirect('/dashboard/myrequests/error');
            }
        }
    }
}
