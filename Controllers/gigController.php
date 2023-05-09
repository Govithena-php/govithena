<?php

class gigController extends Controller
{
    private $currentUser;
    private $gigModel;
    private $requestModel;
    private $reviewByInvestorModel;
    private $userModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        $this->gigModel = $this->model('gig');
        $this->requestModel = $this->model('gigRequest');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');
        $this->userModel = $this->model('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    function index($params = [])
    {

        $props = [];
        if (isset($params[0])) $gigId = $params[0];

        $gig = $this->gigModel->viewGig($gigId);
        if ($gig['success'] && $gig['data'] != false) {

            $props['gig'] = $gig['data'];

            $farmerId = $gig['data']['farmerId'];
            Session::set(['farmerId' => $farmerId, 'gigId' => $gigId]);

            $farmer = $this->userModel->fetchBy($farmerId);

            if ($farmer['success']) {
                $props['farmer'] = $farmer['data'];
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
        } else {
            $this->redirect('/error/pageNotFound');
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
                'requestId' => $reqId,
                'gigId' => $gigId,
                'farmerId' => $farmerId,
                'investorId' => $this->currentUser->getUid(),
                'status' => 'PENDING',
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
