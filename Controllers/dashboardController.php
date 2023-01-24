<?php

class dashboardController extends Controller
{
    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function myfarmers()
    {
        $this->render('myfarmers');
    }

    public function myinvestments()
    {
        $this->render('myinvestments');
    }

    public function myrequests()
    {
        require(ROOT . 'Models/requestFarmer.php');
        $r = new RequestFarmer();

        $requests = $r->getRequestsByInvestor(Session::get('uid'));

        if (isset($requests)) {
            $this->set(['pr' => $requests]);
        } else {
            $this->set(['error' => "no requests found"]);
        }


        $this->render('myrequests');
    }
}
