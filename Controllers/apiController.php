<?php

class apiController extends Controller
{
    private $currentUser;
    private $adminModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        $this->adminModel = $this->model('admin');
    }

    public function gigPieChart()
    {
        $gigsCount = $this->adminModel->getGigsCount();
        echo json_encode($gigsCount);
    }
}
