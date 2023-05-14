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

            $gigImages = $this->gigModel->viewGigImages($gigId);
            if ($gigImages['success']) {
                $props['gigImages'] = $gigImages['data'];
            } else {
                $props['gigImages'] = [];
            }


            $checkGigRequest = $this->requestModel->checkGigRequest($gigId, $this->currentUser->getUid());
            if ($checkGigRequest['success']) {
                if ($checkGigRequest['data']) {
                    $props['gigRequest'] = 'disabled';
                } else {
                    $props['gigRequest'] = '';
                }
            } else {
                $props['gigRequest'] = '';
            }


            Session::set(['farmerId' => $farmerId, 'gigId' => $gigId]);

            $farmer = $this->userModel->fetchBy($farmerId);

            if ($farmer['success']) {
                $props['farmer'] = $farmer['data'];
            }


            $reviewCount = $this->reviewByInvestorModel->getReviewCountByFarmer($farmerId);
            $qCounts = $this->reviewByInvestorModel->getQuestionsCountsByFarmer($farmerId);
            if ($reviewCount['success']) {
                $totalReviews = $reviewCount['data']['totalReviewCount'];
                if ($totalReviews > 0) {
                    if ($qCounts['success']) {
                        foreach ($qCounts['data'] as $qKey => $qCount) {
                            $props['qPrecentages'][$qKey] = ($qCount / $totalReviews) * 100;
                        }
                    } else {
                        foreach ($qCounts['data'] as $qKey => $qCount) {
                            $props['qPrecentages'][$qKey] = 0;
                        }
                    }
                } else {
                    foreach ($qCounts['data'] as $qKey => $qCount) {
                        $props['qPrecentages'][$qKey] = 0;
                    }
                }
            } else {
                $props['reviewCount'] = 0;
                foreach ($qCounts['data'] as $qKey => $qCount) {
                    $props['qPrecentages'][$qKey] = 0;
                }
            }

            $reviews = $this->reviewByInvestorModel->fetchAllByFarmer($farmerId);

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
                $farmerAvgStars = 0;
                $count = 0;

                foreach ($reviews['data'] as $review) {
                    $farmerAvgStars += $review['q2'];
                    $count++;
                    $stars[$review['q2']]++;
                }

                foreach ($stars as $key => $value) {
                    $stars[$key] = ($value / $count) * 100;
                }

                $props['stars'] = $stars;

                $props['farmerAvgStars'] = $farmerAvgStars / $count;
            } else {
                $props['noOfReviews'] = 0;
                $props['reviews'] = [];
                $props['stars'] = [
                    '1' => 0,
                    '2' => 0,
                    '3' => 0,
                    '4' => 0,
                    '5' => 0
                ];
                $props['farmerAvgStars'] = 0;
            }

            // $reviews = $this->reviewByInvestorModel->fetchAllByGig($gigId);
            // if ($reviews['success']) {
            //     $props['noOfReviews'] = count($reviews['data']);
            //     $props['reviews'] = $reviews['data'];

            //     $stars = [
            //         '1' => 0,
            //         '2' => 0,
            //         '3' => 0,
            //         '4' => 0,
            //         '5' => 0
            //     ];
            //     $gigTotalStars = 0;
            //     $count = 0;

            //     foreach ($reviews['data'] as $review) {
            //         $gigTotalStars += $review['q2'];
            //         $count++;
            //         $stars[$review['q2']]++;
            //     }

            //     foreach ($stars as $key => $value) {
            //         $stars[$key] = ($value / $count) * 100;
            //     }

            //     $props['stars'] = $stars;

            //     $props['gigAvgStars'] = floatval($gigTotalStars / $count);
            // }
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
