<?php

class agrologistController extends Controller
{
    private $currentUser;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::AGROLOGIST)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function farmers($params)
    {
        
        if (!empty($params)) {
            //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>". count($params) . "</h1>";
            require(ROOT . 'Models/agrologist.php');
            $agrologist = new Agrologist();
            if (count($params) == 1) {
                $this->farmergigs($agrologist, $params[0]);
            } else {
                // require(ROOT . 'Models/agrologist.php');
                // $agrologist = new Agrologist();
                $uid = Session::get('user')->getUid();
                if (isset($_POST['update_details_btn'])) {
                    $week = new Input(POST, 'week');
                    $date = new Input(POST, 'date');
                    // $update_file = new Input(POST, 'update_file');
                    $description = new Input(POST, 'description');
                    if (move_uploaded_file($_FILES['update_img']['tmp_name'], "Uploads/" . basename($_FILES['update_img']['name']))) {
                        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file uploaded  </h1>";
                        $agrologist->insertFieldVisit([
                            'week' => $week->get(),
                            'gigId' => $params[1],
                            'agrologistId' => $uid,
                            'farmerId' => $params[0],
                            'fieldVisitDetails' => $description->get(),
                            'fieldVisitImage' => basename($_FILES['update_img']['name']),
                            'visitDate' => $date->get(),
                        ]);
                        // echo "file uploaded";
                    } else {
                        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file not uploaded  </h1>";

                        //echo "file not uploaded";
                    }

                    //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $Session::get('uid') . "</h1>";
                }

                $this->farmerdetails($agrologist, $params[0], $params[1]);
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $Session::get('uid') . "</h1>";
            }


        } else {

            require(ROOT . 'Models/agrologist.php');
            $agr = new Agrologist();
            $farmers = $agr->getFarmers();
            if (isset($farmers)) {
                $this->set(['ar' => $farmers]);
            } else {
                $this->set(['error' => "no farmers"]);
            }
            $this->render('farmers');
        }
    }

    public function reviews()
    {
        $this->render('reviews');
    }

    public function requests($params)
    {
        if (!empty($params)) {
            //echo "<h1 style='color: black; margin-top: 1500px; margin-left: 1000px'>". $params[0]. "</h1>";
            $this->requestdetails($params[0]);
        } else {
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
                    //var_dump($_POST['accept']);
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
        $uid = Session::get('user')->getUid();
        $d['agrologist'] = $agrologist->getAgrologistDetails();
        //var_dump($d['agrologist']);
        // die();

        if (isset($_POST['edit_details_btn'])) {

            $firstName = new Input(POST, 'firstName');
            $lastName = new Input(POST, 'lastName');
            $city = new Input(POST, 'city');
            $phoneNumber = new Input(POST, 'phoneNumber');
            $nic = new Input(POST, 'NIC');
            $addressLine1 = new Input(POST, 'addressLine1');
            $addressLine2 = new Input(POST, 'addressLine2');
            $district = new Input(POST, 'district');
            $postalCode = new Input(POST, 'postalCode');

            if (move_uploaded_file($_FILES['profile_img']['tmp_name'], "Uploads/" . basename($_FILES['profile_img']['name']))) {
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file uploaded  </h1>";
                Session::get('user')->setImage(basename($_FILES['profile_img']['name']));

                $agrologist->edit_user_details([
                    'uid' => $uid,
                    'firstName' => $firstName->get(),
                    'lastName' => $lastName->get(),
                    'city' => $city->get(),
                    'phoneNumber' => $phoneNumber->get(),
                    'nic' => $nic->get(),
                    'addressLine1' => $addressLine1->get(),
                    'addressLine2' => $addressLine2->get(),
                    'district' => $district->get(),
                    'postalCode' => $postalCode->get(),
                    'profileImage' => basename($_FILES['profile_img']['name'])
                ]);
                // echo "file uploaded";
            } else {
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file not uploaded  </h1>";

                //echo "file not uploaded";
            }
            
        }

        $this->set($d);
        $this->render('myaccount');
    }

    public function requestdetails($id)
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();   
        $d['requestDetails'] = $agrologist->farmerRequest();
        // echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $d['message'] . "</h1>";

        $this->set($d);
        return $this->render('requestdetails');
    }

    public function farmerdetails($agrologist, $fid, $gid)
    {
        // require(ROOT . 'Models/agrologist.php');
        // $agrologist = new Agrologist();
        $uid = Session::get('user')->getUid();
        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $uid . "</h1>";

        $d['fieldVisit'] = $agrologist->getFieldVisitDetails($fid, $gid);
        $d['fid'] = $fid;
        $d['gid'] = $gid;
        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $uid . "</h1>";

        if (isset($_POST['update_details_btn'])) {
            $week = new Input(POST, 'week');
            $date = new Input(POST, 'date');
            // $update_file = new Input(POST, 'update_file');
            $description = new Input(POST, 'description');
            if (move_uploaded_file($_FILES['update_img']['tmp_name'], "Uploads/" . basename($_FILES['update_img']['name']))) {
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file uploaded  </h1>";
                $agrologist->insertFieldVisit([
                    'week' => $week->get(),
                    'gigId' => $gid,
                    'agrologistId' => $uid,
                    'farmerId' => $fid,
                    'fieldVisitDetails' => $description->get(),
                    'fieldVisitImage' => basename($_FILES['update_img']['name']),
                    'visitDate' => $date->get(),
                ]);
                // echo "file uploaded";
            } else {
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file not uploaded  </h1>";

                //echo "file not uploaded";
            }

            //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $Session::get('uid') . "</h1>";
        }

        $this->set($d);
        return $this->render('farmerdetails');
    }

    public function farmergigs($agrologist, $id)
    {
        // require(ROOT . 'Models/agrologist.php');
        // $agrologist = new Agrologist();
        $d['gigDetails'] = $agrologist->getFarmerGigs(['farmerId' => $id]);
        
        $this->set($d);
        return $this->render('farmergigs');
    }


}