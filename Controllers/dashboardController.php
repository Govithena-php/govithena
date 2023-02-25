<?php

class dashboardController extends Controller
{
    private $currentUser;
    private $investorGigModel;

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
    }

    public function index()
    {
        $this->render('index');
    }

    public function myfarmers()
    {
        $this->render('myfarmers');
    }

    public function withdraw()
    {
        $this->render('withdraw');
    }

    public function activegigs()
    {
        $investorGig = new $this->investorGigModel();
        $gigs = $investorGig->fetchAllByInvestor($this->currentUser->getUid());
        $this->set(['gigs' => $gigs]);
        $this->render('activegigs');
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

    public function myrequests()
    {
        require(ROOT . 'Models/requestFarmer.php');
        $uid = Session::get('user')->getUid();
        $r = new RequestFarmer();

        $requests = $r->getRequestsByInvestor($uid);
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
}
