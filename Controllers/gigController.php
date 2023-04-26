<?php

class gigController extends Controller
{
    private $currentUser;
    private $gigModel;
    private $requestModel;
    private $reviewByInvestorModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        $this->gigModel = $this->model('gig');
        $this->requestModel = $this->model('requestFarmer');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');

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


            $reviews = $this->reviewByInvestorModel->fetchAllByGig($gigId);
            if ($reviews['success']) {
                $props['noOfReviews'] = count($reviews['data']);
                $props['reviews'] = $reviews['data'];

                $stars = [
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0
                ];
                $gigTotalStars = 0;
                $count = 0;

                foreach ($reviews['data'] as $review) {
                    $gigTotalStars += $review['q1'];
                    $count++;
                    $stars[$review['q1']]++;
                }

                foreach ($stars as $key => $value) {
                    $stars[$key] = ($value / $count) * 100;
                }

                $props['stars'] = $stars;

                $props['gigAvgStars'] = floatval($gigTotalStars / $count);
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

            if ($result) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully sent. Please wait for the farmer to respond.');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error sending request. Please try again later.');
            }
            Session::set(['send_gig_request_alert' => $alert]);
            $this->redirect('/gig/' . $gigId);
        }
    }
}
