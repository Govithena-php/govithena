<?php

class gigController extends Controller
{
    private $currentUser;
    private $gigModel;
    private $requestModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        $this->gigModel = $this->model('gig');
        $this->requestModel = $this->model('requestFarmer');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    function index($params)
    {
        $gigId = $params[0];
        isset($params[1]) ? $state = $params[1] : "";

        if (isset($state)) $props['state'] = $state;


        $gig = $this->gigModel->viewGig($gigId);

        if (isset($gig)) {

            $farmerId = $gig['farmerId'];
            Session::set([
                'farmerId' => $farmerId,
                'gigId' => $gigId
            ]);

            require(ROOT . 'Models/user.php');
            $f = new User();
            $farmer = $f->fetchBy($farmerId);

            if (isset($farmer)) {
                $props['farmer'] = $farmer;
            }

            $props['gig'] = $gig;
        } else {
            $props['error'] = "no gig found";
        }
        $this->set($props);
        $this->render('index');
    }


    function request()
    {
        $farmerId = Session::pop('farmerId');
        $gigId = Session::pop('gigId');


        if (isset($_POST['offerAmount']) && isset($_POST['message'])) {

            $reqId = new UID(PREFIX::REQUEST);
            $message = new Input(POST, 'message');
            $offer = new Input(POST, 'offerAmount');

            $result = $this->requestModel->createFarmerRequest([
                'gigId' => $gigId,
                'farmerId' => $farmerId,
                'investorId' => $this->currentUser->getUid(),
                'state' => 'PENDING',
                'offer' => $offer,
                'message' => $message
            ]);
            if (!$result) {
                $this->redirect("/gig/" . $gigId . "/error");
            }
            $this->redirect("/gig/" . $gigId . "/success");
        } else {
            $this->redirect("/gig/" . $gigId . "/error");
        }
    }
}
