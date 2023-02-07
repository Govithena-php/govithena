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
        require(ROOT . 'Models/agrologist.php');
        $agr = new Agrologist();
        $farmers = $agr->getFarmers();
        if (isset($farmers)) {
            $this->set(['ar' => $farmers]);
        } else {
            $this->set(['error' => "no requests found"]);
        }
        $this->render('farmers');
    }

    public function reviews()
    {
        $this->render('reviews');
    }

    public function requests($params)
    {
        if(!empty($params)){
            //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>". $params[0]. "</h1>";
            $this->requestdetails($params[0]);
        }
        else{
            require(ROOT . 'Models/agrologist.php');
            $agr = new Agrologist();
            $requests = $agr->farmerRequest();

            if (isset($requests)) {
                $this->set(['ar' => $requests]);
            } else {
                $this->set(['error' => "no requests found"]);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['accept'])) {
                    var_dump($_POST['accept']);
                    //echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>" . $_POST['accept'] . "</h1>";
                    $agr->acceptRequest($_POST['accept']);
                    //$this->redirect("/agrologist/farmers");
                } else {
                    echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>nope</h1>";

                }
            }
            $this->render('requests');
        }
        

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

    public function requestdetails($id)
    {
        return $this->render('requestdetails');
    }

    public function farmerdetails($id)
    {
        return $this->render('farmerdetails');
    }

    public function farmergigs($id)
    {
        return $this->render('farmergigs');
    }


}