<?php

class techController extends Controller
{
    private $currentUser;

    private $techModel;
    

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::TECH)) {
            $this->redirect('/error/dontHaveAccess');
        }

        $this->techModel = $this->model('tech');
    }

    public function index()
    {
        $this->render('index');
    }

    public function farmers()
    {
        require(ROOT . 'Models/tech.php');
        $tech = new Tech();
        $farmers = $tech->getFarmers();
        if (isset($farmers)) {
            $this->set(['ar' => $farmers]);
        } else {
            $this->set(['error' => "no farmers"]);
        }
        $this->render('farmers');
    }

    public function requests()
    {
        $props = [];

        $farmerRequests = $this->techModel->farmerRequest();
        if($farmerRequests['success']){
            $props['farmerRequests'] = $farmerRequests['data'];
        }

        $rejectedFarmerRequests = $this->techModel->getRejectedFarmerRequest();
        if($rejectedFarmerRequests['success']){
            $props['rejectedFarmerRequests'] = $rejectedFarmerRequests['data'];
        }
        $this->set($props);
        $this->render('requests');
    }

    public function farmerdetails()
    {
        $this->render('farmerdetails');
    }

    public function myaccount()
    {
        $this->render('myaccount');
    }


    public function accept_farmer_request(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $reqId = new Input(POST, 'acceptRequest-confirm');
            $res = $this->techModel->acceptRequest($reqId);
            if($res){
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully accepted request.');
                Session::set(['farmer_request_accept_alert' => $alert]);
            }else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'accept request failed.');
                Session::set(['farmer_request_accept_alert' => $alert]);
            }
            $this->redirect('/tech');
        }
    }

    public function reject_farmer_request(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $reqId = new Input(POST, 'rejectRequest-confirm');
            $res = $this->techModel->rejectRequest($reqId);
            if($res){
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully rejected request.');
                Session::set(['farmer_request_reject_alert' => $alert]);
            }else {
                $alert = new Alert($type = 'success', $icon = "", $message = 'reject request failed.');
                Session::set(['farmer_request_reject_alert' => $alert]);
            }
            $this->redirect('/tech');
        }
    }

}
