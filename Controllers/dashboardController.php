<?php

class dashboardController extends Controller
{
    private $currentUser;

    private $gigModel;
    private $userModel;
    private $fieldVisitModel;
    private $reviewByInvestorModel;
    private $progressModel;
    private $gigRequestModel;
    private $investmentModel;
    private $investorWidthdrawModel;
    private $profitModel;
    private $recentActivityModel;
    private $earningsModel;
    private $investorBalanceModel;
    private $bankAccountModel;


    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/accessDenied');
        }

        $this->gigModel = $this->model('gig');
        $this->userModel = $this->model('user');
        $this->fieldVisitModel = $this->model('fieldVisit');
        $this->reviewByInvestorModel = $this->model('reviewByInvestor');
        $this->progressModel = $this->model('progress');
        $this->gigRequestModel = $this->model('gigRequest');
        $this->investmentModel = $this->model('investment');
        $this->investorWidthdrawModel = $this->model('investorWithdrawal');
        $this->profitModel = $this->model('profit');
        $this->recentActivityModel = $this->model('recentActivity');
        $this->earningsModel = $this->model('earnings');
        $this->investorBalanceModel = $this->model('investorBalance');
        $this->bankAccountModel = $this->model('bankAccount');
    }

    public function index()
    {
        $props = [];

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());
        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        } else {
            $props['totalInvestment'] = 0;
        }

        $totalEarnings = $this->earningsModel->getTotalEarningsByInvestor($this->currentUser->getUid());
        if ($totalEarnings['success']) {
            $props['totalEarnings'] = $totalEarnings['data']['totalEarnings'];
        } else {
            $props['totalEarnings'] = 0;
        }

        $totalWithdrawn = $this->investorWidthdrawModel->getTotalWithdrawnByInvestor($this->currentUser->getUid());
        if ($totalWithdrawn['success']) {
            $props['totalWithdrawn'] = $totalWithdrawn['data']['totalWithdrawn'];
        } else {
            $props['totalWithdrawn'] = 0;
        }

        $withdrawableBalance = $this->investorBalanceModel->getBalanceByInvestor($this->currentUser->getUid());
        if ($withdrawableBalance['success']) {
            $props['withdrawableBalance'] = $withdrawableBalance['data'];
        } else {
            $props['withdrawableBalance'] = 0;
        }

        $investments = $this->investmentModel->fetchByInvestoIdFroDashboard($this->currentUser->getUid());
        if ($investments['success']) {
            $props['investments'] = $investments['data'];
        } else {
            $props['investments'] = [];
        }

        $widthdrawals = $this->investorWidthdrawModel->fetchAllByForDashboard($this->currentUser->getUid());
        if ($widthdrawals['success']) {
            $props['widthdrawals'] = $widthdrawals['data'];
        } else {
            $props['widthdrawals'] = [];
        }

        $earnings = $this->earningsModel->fetchEarningsByForDashboard($this->currentUser->getUid());
        if ($earnings['success']) {
            $props['earnings'] = $earnings['data'];
        } else {
            $props['earnings'] = [];
        }

        $reservedGigs = $this->gigModel->fetchReservedGigsForDashboard($this->currentUser->getUid());
        if ($reservedGigs['success']) {
            $props['reservedGigs'] = $reservedGigs['data'];
        } else {
            $props['reservedGigs'] = [];
        }


        $this->set($props);
        $this->render('index');
    }

    public function gigs()
    {
        $props = [];

        $activeGigCount = $this->gigModel->countActiveGigByInvestor($this->currentUser->getUid());
        if ($activeGigCount['success']) {
            $props['activeGigCount'] = $activeGigCount['data']['count'];
        }

        $completedGigCount = $this->gigModel->countCompletedGigByInvestor($this->currentUser->getUid());
        if ($completedGigCount['success']) {
            $props['completedGigCount'] = $completedGigCount['data']['count'];
        }

        $totalInvestment = $this->investmentModel->getTotalInvestmentByInvestor($this->currentUser->getUid());
        if ($totalInvestment['success']) {
            $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
        }

        $totalInvestmentPerGig = $this->investmentModel->getTotalInvestmentPerGigByInvestor($this->currentUser->getUid());
        if ($totalInvestmentPerGig['success']) {
            $temp = [];
            foreach ($totalInvestmentPerGig['data'] as $key => $value) {
                $temp[$value['gigId']] = $value['totalInvestment'];
            }
            $props['totalInvestmentPerGig'] = $temp;
        }

        $withdrawableBalance = $this->investorBalanceModel->getBalanceByInvestor($this->currentUser->getUid());
        if ($withdrawableBalance['success']) {
            $props['withdrawableBalance'] = $withdrawableBalance['data'];
        } else {
            $props['withdrawableBalance'] = 0;
        }

        $activeGigs = $this->gigModel->fetchAllReservedGigByInvestor($this->currentUser->getUid());
        if ($activeGigs['success']) {
            $props['activeGigs'] = $activeGigs['data'];

            $temp = [];
            foreach ($activeGigs['data'] as $activeGig) {
                $startedDate = $this->gigModel->getStartedDate($activeGig['gigId']);
                if ($startedDate['success']) {
                    $start = new DateTime($startedDate['data']['startDate']);
                    $end = new DateTime();
                    $temp[$activeGig['gigId']] = $start->diff($end)->days;
                }
            }

            $progressCounts = [];
            foreach ($activeGigs['data'] as $activeGig) {
                $progressCount = $this->progressModel->countByGigId($activeGig['gigId']);
                if ($progressCount['success']) {
                    $progressCounts[$activeGig['gigId']] = $progressCount['data']['count'];
                }
            }

            $agrologistProgressCount = [];
            foreach ($activeGigs['data'] as $activeGig) {
                $progressCount = $this->fieldVisitModel->countByGigId($activeGig['gigId']);
                if ($progressCount['success']) {
                    $agrologistProgressCount[$activeGig['gigId']] = $progressCount['data']['count'];
                }
            }

            $props['agrologistProgressCount'] = $agrologistProgressCount;
            $props['progressCounts'] = $progressCounts;
            $props['daysSinceStarted'] = $temp;
        }

        $completedGigs = $this->gigModel->getCompletedGigsByInvestor($this->currentUser->getUid());
        if ($completedGigs['success']) {
            $props['completedGigs'] = $completedGigs['data'];
        }

        $recentActivities = $this->recentActivityModel->getRecentActivityByInvestor($this->currentUser->getUid());

        if ($recentActivities['success']) {
            if ($recentActivities['data']) {
                $props['recentActivities'] = $recentActivities['data'];

                $temp = [];
                foreach ($recentActivities['data'] as $recentActivity) {
                    $gig = $this->gigModel->viewGig($recentActivity['gigId']);
                    if ($gig['success']) {
                        $temp[$recentActivity['gigId']] = $gig['data']['title'];
                    }
                }
                $props['gigTitles'] = $temp;
            } else {
                $props['recentActivities'] = [];
            }
        } else {
            $props['recentActivities'] = [];
        }

        $this->set($props);
        $this->render('gigs');
    }

    public function gig_mark_as_under_review()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gigId = new Input('POST', 'gigId');
            $response = $this->gigModel->markAsUnderReview($gigId);
            if ($response['success']) {
                if ($response['data']) {
                    $alert = new Alert($type = "success", $icon = "", $message = "Successfully completed the gig. Please make sure to review the gig.");
                    Session::set(['gig_mark_as_under_review_alert' => $alert]);
                    $this->redirect('/dashboard/gigs');
                } else {
                    $this->redirect('/error/somethingWentWrong');
                }
            } else {
                $this->redirect('/error/somethingWentWrong');
            }
        }
    }

    public function gig($params = [])
    {
        $props = [];

        if (!empty($params)) {
            $gigId = $params[0];
            $props['gigId'] = $gigId;
        } else {
            $this->redirect('/error/pageNotFound');
        }

        $farmerId = $this->gigModel->getfarmerIdByGigId($gigId);

        if ($farmerId['success']) {
            if ($farmerId['data']) {
                $farmerId = $farmerId['data']['farmerId'];

                $gig = $this->gigModel->fetchBy($gigId);
                if ($gig['success']) {
                    $props['gig'] = $gig['data'];
                } else {
                    $this->redirect('/error/somethingWentWrong/1');
                }

                $gigImages  = $this->gigModel->fetchGigImages($gigId);
                if ($gigImages['success']) {
                    $props['gigImages'] = $gigImages['data'];
                } else {
                    $this->redirect('/error/somethingWentWrong/2');
                }

                $farmer = $this->userModel->fetchBy($farmerId);

                // var_dump($farmer);
                // die();
                if ($farmer['success']) {
                    $props['farmer'] = $farmer['data'];
                } else {
                    $this->redirect('/error/somethingWentWrong/3');
                }

                $fieldVisits = $this->fieldVisitModel->fetchAllByGigId($gigId);
                if ($fieldVisits['success']) {
                    $props['fieldVisits'] = $fieldVisits['data'];
                }

                $totalInvestment = $this->investmentModel->getTotalInvestmentForGigByInvestor($this->currentUser->getUid(), $gigId);
                if ($totalInvestment['success']) {
                    $props['totalInvestment'] = $totalInvestment['data']['totalInvestment'];
                }

                $startedDate = $this->gigModel->getStartedDate($gigId);
                if ($startedDate['success']) {
                    $start = new DateTime($startedDate['data']['startDate']);
                    $end = new DateTime();
                    $props['numberOfDaysLeft'] = $start->diff($end)->days;
                }

                $filter = new Filter([], ['fromDate', 'toDate']);

                $investments = $this->investmentModel->getInvestmentsByGigId($gigId, $filter);
                if ($investments['success']) {
                    $props['investments'] = $investments['data'];
                }

                $progress = $this->progressModel->fetchAllByGigId($gigId);

                $props['progress'] = [];
                if ($progress['success']) {
                    foreach ($progress['data'] as $pg) {
                        $progressImages = [];
                        $temp = $this->progressModel->fetchImagesByProgressId($pg['progressId']);
                        foreach ($temp['data'] as $key => $value) {
                            $progressImages[$key] = $value['image'];
                        }
                        $pg['images'] = $progressImages;
                        $props['progress'][] = $pg;
                    }
                } else {
                    $this->redirect('/error/somethingWentWrong/5');
                }
                $recentActivities = $this->recentActivityModel->getRecentActivityByGigId($gigId);
                // var_dump($recentActivities);
                // die();
                if ($recentActivities['success']) {
                    if ($recentActivities['data']) {
                        $props['recentActivities'] = $recentActivities['data'];
                    } else {
                        $props['recentActivities'] = [];
                    }
                } else {
                    $props['recentActivities'] = [];
                }
            } else {
                $this->redirect('/error/accessDenied');
            }
        } else {
            $this->redirect('/error/somethingWentWrong/6');
        }

        $this->set($props);
        $this->render('gig');
    }


    public function review($params)
    {
        $props = [];

        if (!empty($params)) {
            $gigId = $params[0];
            $props['gigId'] = $gigId;
        } else {
            $this->redirect('/error/pageNotFound');
        }

        Session::set(['gigId' => $gigId]);

        $farmerId = $this->gigModel->checkBeforeReview($gigId, $this->currentUser->getUid());
        if ($farmerId['success']) {
            if ($farmerId['data']) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit_review'])) {
                        $data = [
                            'reviewId' => new UID(PREFIX::REVIEW),
                            'farmerId' => $farmerId['data']['farmerId'],
                            'investorId' => $this->currentUser->getUid(),
                            'gigId' => $gigId,
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
                            $res = $this->gigModel->markAsCompleted($gigId);
                            if ($res['success']) {
                                $alert = new Alert($type = 'success', $icon = '', $message = 'Review submitted successfully!');
                                Session::set(['farmer_review_by_investor_alert' => $alert]);
                                $this->redirect('/dashboard/gigs/');
                            } else {
                                $this->redirect('/error/somethingWentWrong');
                            }
                        }
                    }
                }
            } else {
                $this->redirect('/error/accessDenied');
            }
        } else {
            $this->redirect('/error/pageNotFound');
        }
        $this->set($props);
        $this->render('review');
    }

    public function investments()
    {
        $props = [];

        $category = new Input(POST, 'category');
        $fromDate = new Input(POST, 'fromDate');
        $toDate = new Input(POST, 'toDate');

        $investments = $this->investmentModel->fetchAllByUsingFilters($this->currentUser->getUid(), $category, $fromDate, $toDate);

        if ($investments['success']) {
            $props['investments'] = $investments['data'];
        } else {
            $this->redirect('/error/somethingWentWrong');
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
                $precentage = min("100", round(((intval($thisMonth) - intval($lastMonth)) / intval($lastMonth) * 100), 2));
                $props['precentage'] = $precentage;
                $props['lastMonthInvestment'] = $lastMonth;
            }
            $props['thisMonthInvestment'] = $thisMonth;
        }

        $completedGigs = $this->gigModel->getCompletedGigCount($this->currentUser->getUid());
        if ($completedGigs['success']) {
            $activeGigs = $this->gigModel->getReservedGigCount($this->currentUser->getUid());
            if ($activeGigs['success']) {
                $props['totalGigs'] = intval($activeGigs['data']['gigCount']) + intval($completedGigs['data']['gigCount']);
                $props['activeGigs'] = $activeGigs['data']['gigCount'];
            }
        }

        $this->set($props);
        $this->render('investments');
    }

    public function newInvestment($params = [])
    {
        $props = [];

        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];
            $response = $this->gigModel->checkGigBelongToInvestor($gigId, $this->currentUser->getUid());
            if ($response['success']) {
                if ($response['data']) {
                    $props['oneGigId'] = $response['data'];
                } else {
                    $this->redirect('/error/pageNotFound');
                }
            } else {
                $this->redirect('/error/pageNotFound');
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $gigId = new Input(POST, 'gigId');
            $amount = new Input(POST, 'amount');
            $description = new Input(POST, 'description');

            $farmerId = $this->gigModel->getfarmerIdByGigId($gigId);

            if ($farmerId['success']) {
                $farmerId = $farmerId['data'];
            } else {
                $this->redirect('/error/somethingWentWrong/1');
            }

            $response = $this->investmentModel->save([
                'id' => new UID(PREFIX::INVESTMENT),
                'investorId' => $this->currentUser->getUid(),
                'gigId' => $gigId,
                'farmerId' => $farmerId['farmerId'],
                'amount' => $amount,
                'description' => $description
            ]);

            if ($response['success']) {
                $this->redirect('/dashboard/investments');
            } else {
                $this->redirect('/error/somethingWentWrong/2');
            }
        }


        $investmentGigs = $this->gigModel->fetchAllReservedGigByInvestor($this->currentUser->getUid());
        if ($investmentGigs['success']) {
            $props['investmentGigs'] = $investmentGigs['data'];
        } else {
            $this->redirect('/error/somethingWentWrong/3');
        }

        $this->set($props);
        $this->render('newInvestment');
    }

    public function withdrawals()
    {
        $props = [];

        $status = new Input(POST, 'status');
        $fromDate = new Input(POST, 'fromDate');
        $toDate = new Input(POST, 'toDate');

        $withdrawls = $this->investorWidthdrawModel->fetchAllByFilter($this->currentUser->getUid(), $status, $fromDate, $toDate);

        if ($withdrawls['success']) {

            $props['withdrawls'] = $withdrawls['data'];

            $withdrawalBalance = $this->earningsModel->getWithdrawalBalance($this->currentUser->getUid());
            if ($withdrawalBalance['success']) {
                $props['withdrawalBalance'] = $withdrawalBalance['data']['withdrawalBalance'];
            } else {
                $props['withdrawalBalance'] = 0;
            }

            $totalWithdrawn = $this->investorWidthdrawModel->getTotalWithdrawn($this->currentUser->getUid());
            if ($totalWithdrawn['success']) {
                $props['totalWithdrawn'] = $totalWithdrawn['data']['totalWithdrawn'];
            } else {
                $props['totalWithdrawn'] = 0;
            }

            $thisMonthTotalWithdrawn = $this->investorWidthdrawModel->getThisMonthTotalWithdrawn($this->currentUser->getUid());
            if ($thisMonthTotalWithdrawn['success']) {
                $props['thisMonthTotalWithdrawn'] = $thisMonthTotalWithdrawn['data']['thisMonthTotalWithdrawn'];
            } else {
                $props['thisMonthTotalWithdrawn'] = 0;
            }

            $clearingWithdrawal = $this->investorWidthdrawModel->getclearingWithdrawal($this->currentUser->getUid());
            if ($clearingWithdrawal['success']) {
                $props['clearingWithdrawal'] = $clearingWithdrawal['data']['clearingWithdrawal'];
            } else {
                $props['clearingWithdrawal'] = 0;
            }

            $withdrawalBalance = $this->investorBalanceModel->getBalanceByInvestor($this->currentUser->getUid());
            if ($withdrawalBalance['success']) {
                $props['withdrawalBalance'] = $withdrawalBalance['data'];
            } else {
                $props['withdrawalBalance'] = 0;
            }

            $bankAccounts = $this->bankAccountModel->getBankDetails($this->currentUser->getUid());
            if ($bankAccounts['success']) {
                $props['bankAccounts'] = $bankAccounts['data'];
            }
        } else {
            var_dump($withdrawls);
            die();
            $this->redirect('/error/somethingWentWrong');
        }
        $this->set($props);
        $this->render('withdrawals');
    }

    public function process_withdrawal()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = new Input(POST, 'amount');
            $account = new Input(POST, 'account');

            $response = $this->investorWidthdrawModel->newWithdrawal([
                'id' => new UID(PREFIX::WITHDRAWAL),
                'investorId' => $this->currentUser->getUid(),
                'amount' => $amount,
                'bankAccount' => $account
            ]);
            if ($response['success']) {
                $this->redirect('/dashboard/withdrawals');
                $alert = new Alert($type = "success", $icon = "", $message = "Withdrawal ongoing. Please wait for approval.");
                Session::set(['withdrawal_request_alert' => $alert]);
            } else {
                $this->redirect('/error/somethingWentWrong');
            }
        }
    }


    public function requests()
    {
        $uid = Session::get('user')->getUid();

        $requests = $this->gigRequestModel->getRequestsByInvestor($uid);

        $pendingRequests = [];
        $acceptedRequests = [];
        $rejectedRequests = [];
        if (isset($requests)) {
            foreach ($requests as $request) {
                if ($request['status'] == 'ACCEPTED') {
                    array_push($acceptedRequests, $request);
                } else if ($request['status'] == 'PENDING') {
                    array_push($pendingRequests, $request);
                } else if ($request['status'] == 'REJECTED') {
                    array_push($rejectedRequests, $request);
                }
            }

            $this->set(['pr' => $pendingRequests, 'ar' => $acceptedRequests, 'rr' => $rejectedRequests]);
        } else {
            $this->set(['error' => "no requests found"]);
        }


        $this->render('requests');
    }



    public function myrequest_delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestId = new Input(POST, 'deleteRequest-confirm');
            $response = $this->gigRequestModel->delete($requestId);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully deleted request.');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error deleting request.');
            }
            Session::set(['myrequest_delete_alert' => $alert]);
            $this->redirect('/dashboard/requests');
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

            $response = $this->gigRequestModel->resend($data);

            if ($response['success']) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully resent.');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Error resending.');
            }
            Session::set(['resend_request_alert' => $alert]);
            $this->redirect('/dashboard/requests');
        }
    }

    public function earnings()
    {
        $props = [];

        $status = new Input(POST, 'status');
        $fromDate = new Input(POST, 'fromDate');
        $toDate = new Input(POST, 'toDate');

        $earnings = $this->earningsModel->getEarningsByInvestorByFilter($this->currentUser->getUid(), $status, $fromDate, $toDate);
        if ($earnings['success']) {
            $props['earnings'] = $earnings['data'];

            $totalEarning = $this->earningsModel->getTotalEarningsByInvestor($this->currentUser->getUid());
            if ($totalEarning['success']) {
                $props['totalEarnings'] = $totalEarning['data']['totalEarnings'];
            } else {
                $props['totalEarnings'] = 0;
            }

            $thisMonthEarning = $this->earningsModel->getThisMonthEarningsByInvestor($this->currentUser->getUid());
            if ($thisMonthEarning['success']) {
                $props['thisMonthEarnings'] = $thisMonthEarning['data']['thisMonthTotalEarnings'];
            } else {
                $props['thisMonthEarnings'] = 0;
            }

            $totalClearing = $this->earningsModel->getTotalClearingByInvestor($this->currentUser->getUid());
            if ($totalClearing['success']) {
                $props['totalClearings'] = $totalClearing['data']['totalClearings'];
            } else {
                $props['totalClearings'] = 0;
            }

            $withdrawalBalance = $this->investorBalanceModel->getBalanceByInvestor($this->currentUser->getUid());
            if ($withdrawalBalance['success']) {
                $props['withdrawalBalance'] = $withdrawalBalance['data'];
            } else {
                $props['withdrawalBalance'] = 0;
            }
        } else {
            $this->redirect('/error/somethingWentWrong');
        }


        $this->set($props);
        $this->render('earnings');
    }
}
