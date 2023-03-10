<?php

class profileController extends Controller
{
    private $currentUser;
    private $userModel;
    private $gigModel;
    private $reviewByInvestorModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');
        $this->userModel = $this->model('user');
        $this->gigModel = $this->model('gig');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');


        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }
    }

    public function index($params)
    {

        if (isset($params) && !empty($params[0])) {
            list($uid) = $params;

            $user = $this->userModel->getUserById($uid);
            if ($user['status']) {
                $props['user'] = $user['data'];

                $gigs = $this->gigModel->ALL($uid);

                if ($gigs) {
                    $props['gigs'] = $gigs;
                } else {
                    $props['gigs'] = [];
                }


                $reviews = $this->reviewByInvestorModel->fetchAllByFarmer($uid);

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

                    $props['farmerAvgStars'] = floatval($farmerAvgStars / $count);
                }


                $this->set($props);
                $this->render('index');
            } else {
                $this->redirect('/error');
            }
        } else {
            $this->redirect('/error');
        }
    }
}
