<?php
class farmerController extends Controller
{
    private $currentUser;
    private $imageHandler;
    private $farmerModel;
    private $investorGigModel;
    private $gigModel;
    private $farmerProgressModel;

    // model ekat PRIVATE  variable ekak define kra
    private $abcModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');
        $this->imageHandler = new ImageHandler($folder = 'Uploads3');

        $this->farmerModel = $this->model('farmer');
        $this->investorGigModel = $this->model('investorGig');
        $this->gigModel = $this->model('gig');
        $this->farmerProgressModel = $this->model('farmerProgress');

        $this->abcModel = $this->model('abc'); //model eka import krann ('abc' file eke name)


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

            $gigId = uniqid();
            $title = $_POST['title'];
            $landArea = $_POST['landArea'];
            $capital = $_POST['capital'];
            $timePeriod = $_POST['timePeriod'];
            $location = $_POST['location'];
            $category = $_POST['category'];

            var_dump($_POST);
            var_dump($_FILES);
            die();

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


            $gig = new $this->gigModel();

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
        // require(ROOT . 'Models/gig.php');
        //require(ROOT . 'Models/farmer.php');
        // $gig = new $this->gigModel();
        
        $id = Session::get('user')->getUid(); //session eken user id eka gannawa
        $products = $this->gigModel->All($id);
        $d['products'] = $products;
        $this->set($d);


        // $farmer = new Farmer();
        $notifications = $this->farmerModel->getnotifications();
        //echo json_encode($notifications);
        $this->set(['notifications' => $notifications]);



        $this->render("index");
    }


    // view eke abc.php page eka
    function abc($params = []){
        
        // url eke controller/action eken passe / ghala den values tika okkom $params kiyn array eke tyenne.
        var_dump($params[0]);

        //select==============================
        $id = Session::get('user')->getUid(); //session eken data ganne mehema
        $gigslist = $this->abcModel->getAllGigs($id); // model eke thiyana adala funciton eka call krla output eka
        $props['gigs'] = $gigslist; //view ekata yawann one data tika props kiyal hri d kiyala hri passkrann one


        //insert=======================

        // forms adunragann vidiya

        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){ // submit button ekak click krlad kiyla --> POST method
           
        //     if(isset($_POST['form1'])){ // mona sumbit button eked click kale ---> mona form ekada
        //         echo "form 1";
        //     }

        //     if(isset($_POST['form2'])){
        //         echo "form 2";
        //     }  
        // }

        //=====================

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            if(isset($_POST['form1'])){
             
            $name = new Input(POST, 'uname'); // uname kiyla thiyana input filed eken value eka varibale ekata gannwa
            $p = new Input(POST, 'pass'); // pass kiyl thiyana input field eken value eka variable ekata gannawa.
            
            // model ekata insert karann one values pass kranna data object eka hadagann one.
             $data = [
                    'x' => $name,
                    'pass' => $p
                ];

            $this->abcModel->insertToTable($data);
            }
        }





        $this->set($props); // view ekata set kranne
        $this->render('abc');
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

    function progress($params)
    {
        $props = [];
        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];

            $gig = $this->gigModel->viewGig($gigId);
            $props['gig'] = $gig;

            $investor = $this->investorGigModel->fetchInvestorByGig($gigId);
            if ($investor['success']) {
                $props['investor'] = $investor['data'];
            }
            $this->set($props);
            $this->render('viewProgress');
        } else {

            $gigs = $this->investorGigModel->fetchAllByFarmer($this->currentUser->getUid());
            if ($gigs['success']) {
                $props['gigs'] = $gigs['data'];
            }
            $this->set($props);
            $this->render('progress');
        }
    }

    function newprogress($params)
    {

        $props = [];
        $gigId = "";
        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $progressId = new UID(PREFIX::PROGRESS);

            $data = [
                'progressId' => $progressId,
                'gigId' => $gigId,
                'subject' => new Input(POST, 'subject'),
                'description' => new Input(POST, 'description'),
                'farmerId' => $this->currentUser->getUid()
            ];


            $response = $this->farmerProgressModel->create($data);

            if ($response['success']) {

                try {
                    $images = $this->imageHandler->upload('images');
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $data = [
                                'progressId' => $progressId,
                                'imageName' => $image
                            ];
                            $res = $this->farmerProgressModel->saveProgressImage($data);
                            if (!$res['success']) {
                                $this->redirect('/farmer/newprogress/' . $res['error']);
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
                }
            } else {
                $this->redirect('/farmer/newprogress/' . $response['error']);
            }
        }

        $this->render('newProgress');
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

    function techassistantfirstcopy()
    {
        $this->render('techassistantfirstcopy');
    }
    function settings()
    {
        $this->render('settings');
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
