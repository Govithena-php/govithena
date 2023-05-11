<?php

class apiController extends Controller
{
    private $currentUser;
    private $adminModel;
    private $investmentModel;
    private $earningsModel;
    private $gigModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        $this->adminModel = $this->model('admin');
        $this->investmentModel = $this->model('investment');
        $this->earningsModel = $this->model('earnings');
        $this->gigModel = $this->model('gig');
    }

    public function gigPieChart()
    {
        $gigsCount = $this->adminModel->getGigsCount();

        echo json_encode($gigsCount);
    }

    public function investmentsVsEarningsLineChart()
    {

        $last10MonthANDThisMonthANDNextMonth = genarateListOfMonthNamesFromToday();

        $monthlyInvestments = $this->investmentModel->getMonthlyInvestmentByInvestor($this->currentUser->getUid());
        $arrayForInvestments = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        if ($monthlyInvestments['success']) {
            foreach ($monthlyInvestments['data'] as $value) {
                $idx = array_search($value['month'], $last10MonthANDThisMonthANDNextMonth);
                $arrayForInvestments[$idx] = $value['totalInvestment'];
            }
        }

        $monthlyEarnings = $this->earningsModel->getMonthlyEarningsByInvestor($this->currentUser->getUid());
        $arrayForEarnings = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        if ($monthlyEarnings['success']) {
            foreach ($monthlyEarnings['data'] as $value) {
                $idx = array_search($value['month'], $last10MonthANDThisMonthANDNextMonth);
                $arrayForEarnings[$idx] = $value['totalEarnings'];
            }
        }
        $data = [
            'labels' => $last10MonthANDThisMonthANDNextMonth,
            'datasets' => [
                [
                    'label' => 'Investments',
                    'backgroundColor' => ' rgb(29, 154, 95)',
                    'borderColor' => ' rgb(29, 154, 95)',
                    'borderWidth' => 3,
                    'data' => $arrayForInvestments
                ],
                [
                    'label' => 'Earnings',
                    'backgroundColor' => 'rgb(52, 100, 211)',
                    'borderColor' => 'rgb(52, 100, 211)',
                    'borderWidth' => 3,
                    'data' => $arrayForEarnings
                ]
            ]
        ];

        echo json_encode($data);
    }

    public function categoryVsGigsChart()
    {
        $categoryVsEarningsChart = $this->gigModel->getCategoryVsGigsByInvestor($this->currentUser->getUid());
        if ($categoryVsEarningsChart['success']) {
            $labels = [];
            $counts = [];

            foreach ($categoryVsEarningsChart['data'] as $value) {
                $labels[] = ucwords($value['category']);
                $counts[] = $value['count'];
            }

            $data = [
                'labels' => $labels,
                'data' => $counts,
            ];

            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function categoryVsInvestments()
    {
        $categoryVsInvestments = $this->investmentModel->getCategoryVsInvestmentsByInvestor($this->currentUser->getUid());
        if ($categoryVsInvestments['success']) {
            $labels = [];
            $sums = [];

            foreach ($categoryVsInvestments['data'] as $value) {
                $labels[] = ucwords($value['category']);
                $sums[] = $value['totalInvestment'];
            }

            $data = [
                'labels' => $labels,
                'data' => $sums,
            ];

            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function categoryVsEarnings()
    {
        $categoryVsEarnings = $this->earningsModel->getCategoryVsEarningsByInvestor($this->currentUser->getUid());
        if ($categoryVsEarnings['success']) {
            $labels = [];
            $sums = [];

            foreach ($categoryVsEarnings['data'] as $value) {
                $labels[] = ucwords($value['category']);
                $sums[] = $value['totalEarnings'];
            }

            $data = [
                'labels' => $labels,
                'data' => $sums,
            ];

            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }
}
