<?php

class profileController extends Controller
{
    private $currentUser;
    private $userModel;
    private $gigModel;
    private $reviewByInvestorModel;
    private $investorGigModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');
        $this->userModel = $this->model('user');
        $this->gigModel = $this->model('gig');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');
        $this->investorGigModel = $this->model('investorGig');


        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }
    }

    public function index($params)
    {
        $props = [];

        if (isset($params) && !empty($params[0])) {
            list($uid) = $params;

            $previousWorks = $this->investorGigModel->getCompletedGigsByFarmer($uid);
            if ($previousWorks['success']) {
                $props['previousWorks'] = $previousWorks['data'];
            }

            $user = $this->userModel->getUserById($uid);

            $WorkedWith = $this->investorGigModel->getWorkedWith($uid);
            if ($WorkedWith['success']) {
                $props['WorkedWith'] = $WorkedWith['data']['investorCount'];
            } else {
                $props['WorkedWith'] = 0;
            }

            $investmentsSum = $this->investorGigModel->getInvestmentsSumByFarmer($uid);
            if ($investmentsSum['success']) {
                $sum = $investmentsSum['data']['totalInvestment'];
            } else {
                $sum = 0;
            }
            $tot = $sum;
            $rounding_factor = 1;
            while ($tot >= 10) {
                $rounding_factor *= 10;
                $tot = floor($tot / 10);
            }
            $props['accequerdOver'] = floor($sum / $rounding_factor) * $rounding_factor;

            $reviewCount = $this->reviewByInvestorModel->getReviewCountByFarmer($uid);
            $qCounts = $this->reviewByInvestorModel->getQuestionsCountsByFarmer($uid);
            if ($reviewCount['success']) {
                $totalReviews = $reviewCount['data']['totalReviewCount'];
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
                $props['reviewCount'] = 0;
                foreach ($qCounts['data'] as $qKey => $qCount) {
                    $props['qPrecentages'][$qKey] = 0;
                }
            }



            // die(var_dump($props['qPrecentages']));
            // die();

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
