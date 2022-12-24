<?php

class gigController extends Controller
{
    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }

    function index($gigId, $state = "")
    {

        if (isset($state)) $props['state'] = $state;

        require(ROOT . 'Models/gig.php');
        $g = new Gig();
        $gig = $g->viewGig($gigId);

        if (isset($gig)) {

            $farmerId = $gig['farmerId'];
            Session::set([
                'farmerId' => $farmerId,
                'gigId' => $gigId
            ]);

            require(ROOT . 'Models/user.php');
            $f = new User();
            $farmer = $f->viewFarmer($farmerId);

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
        $farmerId = Session::get('farmerId');
        $gigId = Session::get('gigId');
        Session::unset(['farmerId', 'gigId']);

        if (isset($_POST['offerAmount']) && isset($_POST['message'])) {
            $message = $_POST['message'];
            $offer = $_POST['offerAmount'];
            require(ROOT . 'Models/requestFarmer.php');
            $r = new RequestFarmer();
            $result = $r->createFarmerRequest([
                'gigId' => $gigId,
                'farmerId' => $farmerId,
                'investorId' => Session::get('uid'),
                'status' => 'pending',
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
