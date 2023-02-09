<?php

class techController extends Controller
{

    public function index()
    {
        $this->render('index');
    }

    public function farmers(){
        $this->render('farmers');
    }

    public function requests(){
        require(ROOT . 'Models/tech.php');
            $tech = new Tech();
            $requests = $tech->farmerRequest();

            if (isset($requests)) {
                $this->set(['ar' => $requests]);
            } else {
                $this->set(['error' => "no requests found"]);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['accept'])) {
                    var_dump($_POST['accept']);
                    //echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>" . $_POST['accept'] . "</h1>";
                    $tech->acceptRequest($_POST['accept']);
                    //$this->redirect("/agrologist/farmers");
                } else {
                    echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>nope</h1>";

                }
            }
           
        $this->render('requests');
    }

    public function farmerdetails(){
        $this->render('farmerdetails');
    }

    public function myaccount(){
        $this->render('myaccount');
    }

    public function dashboard(){
        $this->render('dashboard');
    }
  

}