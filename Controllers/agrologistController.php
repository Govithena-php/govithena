<?php

class agrologistController extends Controller
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

    public function farmers()
    {
        $this->render('farmers');
    }

    public function reviews()
    {
        $this->render('reviews');
    }

    public function requests()
    {
        require(ROOT . 'Models/agrologist.php');
        $agr = new Agrologist();
        $requests = $agr->farmerRequest();
        
        if (isset($requests)) {
            $this->set(['ar' => $requests]);
        } else {
            $this->set(['error' => "no requests found"]);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['accept'])){  
                echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>" . $_POST['requestId'] . "</h1>";
                $agr->acceptRequest($_POST['requestId']);
                $this->redirect("/agrologist/farmers");
            }
            else{
                echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>nope</h1>";
    
            }
        }
       // echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>hi</h1>";

      
        
        $this->render('requests');
    }

    public function myaccount()
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();
        $uid = $_SESSION['uid'];
        $d['agrologist'] = $agrologist->getAgrologistDetails();
        

        if (isset($_POST['edit_details_btn'])) {

            $firstName = new Input(POST, 'firstName');
            $lastName = new Input(POST, 'lastName');
            $city = new Input(POST, 'city');
            $phoneNumber = new Input(POST, 'phoneNumber');

            $agrologist->edit_user_details([
                'uid' => $uid,
                'firstName' => $firstName->get(),
                'lastName' => $lastName->get(),
                'city' => $city->get(),
                'phoneNumber' => $phoneNumber->get(),
            ]);
        }

        $this->set($d);
        $this->render('myaccount');
    }

    public function requestdetails()
    {
        $this->render('requestdetails');
    }

    
}
