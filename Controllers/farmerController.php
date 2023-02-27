<?php
class farmerController extends Controller
{
    private $currentUser;
    private $farmerModel;
    public function __construct()
    {
        $this->currentUser = Session::get('user');
        $this->farmerModel = $this->model('farmer');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::FARMER)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }
    function createGig()
    {
        if (isset($_POST['createGig'])) {
            require(ROOT . 'Models/gig.php');

            $gigId = uniqid();
            $title = $_POST['title'];
            $landArea = $_POST['landArea'];
            $capital = $_POST['capital'];
            $timePeriod = $_POST['timePeriod'];
            $location = $_POST['location'];
            $category = $_POST['category'];


            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error == 0) {

                $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
                $fileType_lc = strtolower($fileType);

                $allowedFileTypes = array("jpg", "jpeg", "png");

                if (in_array($fileType, $allowedFileTypes)) {

                    $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
                    $img_upload_path = ROOT . 'Webroot/uploads/' . $new_img_name;

                    move_uploaded_file($tmp_name, $img_upload_path);
                }
            }



            $description = $_POST['description'];
            $farmerId = Session::get('user')->getUid();

            $data = [
                'gigId' => $gigId,
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'image' => $new_img_name,
                'capital' => $capital,
                'timePeriod' => $timePeriod,
                'location' => $location,
                'landArea' => $landArea,
                'farmerId' => $farmerId
            ];


            $gig = new Gig();

            $res = $gig->create($data);

            if (!$res) {
                $this->redirect('/farmer/createGig');
                return;
            }
            $this->redirect('/farmer/');
        }
        $this->render("gigs");
    }

    function index()
    {
        require(ROOT . 'Models/gig.php');
        //require(ROOT . 'Models/farmer.php');

        $gig = new Gig();
        $id = Session::get('user')->getUid();

        $products = $gig->All($id);


        $d['products'] = $products;
        $this->set($d);

        
        // $farmer = new Farmer();
        $notifications = $this->farmerModel->getnotifications();
        //echo json_encode($notifications);
        $this->set(['notifications' => $notifications]);



        $this->render("index");
    }


    function investors($params = [])
    {
        $props = [];
        if (!empty($params)) {
            $props['message'] = $params[0];
        }

        $investors = $this->farmerModel->investors([
            'farmerId' => $this->currentUser->getUid(),
            'state' => STATUS::PENDING
        ]);
        if ($investors['status']) {
            $props['investors'] = $investors['data'];
            $this->set($props);
        }
        $this->set($props);
        $this->render('investors');
    }

    public function acceptInvestor($params)
    {
        if (isset($params)) {
            list($requestId) = $params;
            $res = $this->farmerModel->acceptInvestor([
                'requestId' => $requestId,
                'state' => STATUS::ACCEPTED
            ]);

            if ($res['status']) {
                $this->redirect('/farmer/investors');
            } else {
                $this->redirect('/farmer/investors/' . $res['message']);
            }
        }
    }
    public function declineInvestor($params)
    {
        if (isset($params)) {
            list($requestId) = $params;
            $res = $this->farmerModel->declineInvestor([
                'requestId' => $requestId,
                'state' => STATUS::REJECTED
            ]);

            if ($res['status']) {
                $this->redirect('/farmer/investors');
            } else {
                $this->redirect('/farmer/investors/' . $res['message']);
            }
        }
    }

    function techassistant()
    {
        $this->render('techassistant');
    }

    function techassistantfirst($params = [])
    {

        if (!empty($params)) {
            $props['message'] = $params[0];
        }

        $techAssistants = $this->farmerModel->techAssistants();
        if ($techAssistants['status']) {
            $props['techAssistants'] = $techAssistants['data'];
            $this->set($props);
        }
        $this->set($props);
        $this->render('techassistantfirst');
    }

    function progress()
    {
        $this->render('progress');
    }

    function progressform()
    {
        $this->render('progressform');
    }

    function agrologist($params = [])
    {

        if (!empty($params)) {
            $props['message'] = $params[0];
        }

        $agrologists = $this->farmerModel->agrologists();
        if ($agrologists['status']) {
            $props['agrologists'] = $agrologists['data'];
            $this->set($props);
        }
        $this->set($props);
        $this->render('agrologist');
    }

    function agrologistprofile()
    {
        $this->render('agrologistprofile');
    }

    public function send($params)
    {

        list($agrologistId) = $params;
        $data = [
            'requestId' => new UID(PREFIX::REQUEST),
            'agrologistId' => $agrologistId,
            'farmerId' => $this->currentUser->getUid(),
            'message' => 'This is test message',
            'status' => 'Pending'
        ];
        $response = $this->farmerModel->sendAgrologistRequest($data);
        if ($response['status']) {
            if ($response['data']) $this->redirect('/farmer/agrologist/ok');
            else $this->redirect('/farmer/agrologist/already');
        } else {
            $this->redirect('/farmer/agrologist/error');
        }
    }

    public function request($params)
    {

        list($technicalAssistantId) = $params;
        $data = [
            'requestId' => new UID(PREFIX::REQUEST),
            'technicalAssistantId' => $technicalAssistantId,
            'farmerId' => $this->currentUser->getUid(),
            'message' => 'This is test message',
            'status' => 'Pending'
        ];
        $response = $this->farmerModel->sendTechRequest($data);
        if ($response['status']) {
            if ($response['data']) $this->redirect('/farmer/techassistantfirst/ok');
            else $this->redirect('/farmer/techassistantfirst/already');
        } else {

            $this->redirect('/farmer/techassistantfirst/error');
        }
    }


    public function deleteGig($params)
    {
        if (isset($params)) {

            list($gigId) = $params;

            $res = $this->farmerModel->delete_Gig($gigId);

            if ($res['status']) {
                $this->redirect('/farmer/');
            } else {
                $this->redirect('/farmer/' . $res['message']);
            }
        }
    }
}
