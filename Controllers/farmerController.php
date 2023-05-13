<?php
class farmerController extends Controller
{
    private $currentUser;

    private $progressImageHandler;

    private $gigImageHandler;

    private $farmerModel;
    private $gigModel;
    private $progressModel;

    // model ekat PRIVATE  variable ekak define kra
    private $abcModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');


        // <input type="file" name="name eke"
        //image ekk upload kranna imsgeHandler->upload('name eka')

        $this->progressImageHandler = new ImageHandler($folder = 'Uploads/progress');
        $this->gigImageHandler = new ImageHandler($folder = "Uploads");

        $this->farmerModel = $this->model('farmer');
        $this->gigModel = $this->model('gig');
        $this->progressModel = $this->model('progress');

        $this->progressModel = $this->model('progress');

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
            $gigId = new UID(PREFIX::GIG);
            $title = new Input(POST, 'title');
            $landArea = new Input(POST, 'landArea');
            $capital = new Input(POST, 'capital');
            $profitMargin = new Input(POST, 'profitMargin');
            $timePeriod = new Input(POST, 'timePeriod');
            $location = new Input(POST, 'location');
            $category = new Input(POST, 'category');
            $description = $_POST['description'];
            $farmerId = Session::get('user')->getUid();

            $images = $this->gigImageHandler->upload('images');
            if(empty($images)){
                $this->redirect('/farmer/createGig/error/1');
            }else {
                $thumbnail = $images[0];
                unset($images[0]);
                $data = [
                    'gigId' => $gigId,
                    'title' => $title,
                    'description' => $description,
                    'category' => $category,
                    'thumbnail' => $thumbnail,
                    'capital' => $capital,
                    'profitMargin' => $profitMargin,
                    'cropCycle' => $timePeriod,
                    'city' => $location,
                    'landArea' => $landArea,
                    'farmerId' => $farmerId
                ];

                $response = $this->gigModel->create($data);
                if($response['success']){
                    foreach($images as $image){
                        $temp = [
                            'image' => $image,
                            'gigId' => $gigId
                        ];
                        $response = $this->gigModel->saveGigImage($temp);
                        if(!$response['success']){
                            $this->redirect('/farmer/createGig/error/2');
                        }
                    }
                    $this->redirect('/farmer/');
                }else{
                    $this->redirect('/farmer/createGig/error/3');
                }

            }
        }
        $this->render("createGig");
    }

    public function gigView($params = [])
    {
        $props = [];
        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];
            $gig = $this->gigModel->fetchBy($gigId);
            $props['gig'] = $gig['data'];
            // $gigimg=$this->gigModel->gigimg($gigId);
            // $props['gigimgs'] = $gigimg['data'];



                
            $progressImages = [];
            $temp = $this->gigModel->gigimg($gigId);
            // die();
            foreach ($temp['data'] as $key => $value) {
                $progressImages[$key] = $value['image'];
            }
            // var_dump($progressImages);
            // die();

            $props['gigimgs'] = $progressImages;
    
        }


        $this->set($props);
        $this->render("gigView");
    }

    public function editGig($params = [])
    {
        $props = [];
        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];
            $gig = $this->gigModel->editGig($gigId);
            $props['gig'] = $gig['data'];
   
        }


        $this->set($props);
        $this->render("editGig");
    }

    public function updateGig($params = [])
    {
        // if (isset($params[0]) && !empty($params[0])) {
            
        //     $res = $this->gigModel->updateGig($gigId);
        //     if ($res['status']) {
        //         $this->render("index");
        //     } else {
        //         $this->redirect('/error/somethingWentWrong');
        //     }
        // }



        if (isset($_POST['updateGig'])) {



            $gigId = new Input(POST, 'updateGig');

            $title = new Input(POST, 'title');
            $landArea = new Input(POST, 'landArea');
            $capital = new Input(POST, 'capital');
            $profitMargin = new Input(POST, 'profitMargin');
            $timePeriod = new Input(POST, 'timePeriod');
            $location = new Input(POST, 'location');
            $category = new Input(POST, 'category');


            // $file_name = $_FILES['image']['name'];
            // $file_size = $_FILES['image']['size'];
            // $tmp_name = $_FILES['image']['tmp_name'];
            // $error = $_FILES['image']['error'];

            // if ($error == 0) {

            //     $fileType = pathinfo($file_name, PATHINFO_EXTENSION);
            //     $fileType_lc = strtolower($fileType);

            //     $allowedFileTypes = array("jpg", "jpeg", "png");

            //     if (in_array($fileType, $allowedFileTypes)) {

            //         $new_img_name = uniqid("IMG-", true) . '.' . $fileType_lc;
            //         $img_upload_path = ROOT . 'Webroot/uploads/' . $new_img_name;

            //         move_uploaded_file($tmp_name, $img_upload_path);
            //     }
            // }



            $description = $_POST['description'];
            $farmerId = Session::get('user')->getUid();


            $data = [
                'id' => $gigId,
                'title' => $title,
                'description' => $description,
                'category' => $category,
                // 'image' => $new_img_name,
                'capital' => $capital,
                'profitMargin' => $profitMargin,
                'cropCycle' => $timePeriod,
                'city' => $location,
                'landArea' => $landArea,
                // 'farmerId' => $farmerId
            ];
            // var_dump($data);
            // die();


            // $gig = new $this->gigModel();

            // $res = $gig->create($data);
            $res = $this->gigModel->updateDetails($data);


            if (!$res) {
                $this->redirect('/farmer/editGig');
                return;
            }
            $this->redirect('/farmer/');
            // $this->redirect('/farmer/');
        }
        
    }


    function complete_gig()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gigId = new Input(POST, 'gigId');
            $confirm = new Input(POST, 'confirm');

            if ($confirm == "on") {
                $response = $this->gigModel->markAsCompleted($gigId);
                if ($response['success']) {
                    if ($response['data']) {
                        $alert = new Alert($type = 'success', $icon = '', $message = 'Gig completed successfully');
                    } else {
                        $alert = new Alert($type = 'error', $icon = '', $message = 'Something went wrong');
                    }
                    Session::set(['compelete_gig_alert' =>  $alert]);
                    $this->redirect('/farmer/');
                } else {
                    $this->redirect('/error/somethingWentWrong');
                }
            }
        }
    }

    function index()
    {
        // require(ROOT . 'Models/gig.php');
        //require(ROOT . 'Models/farmer.php');
        // $gig = new $this->gigModel();
        $props = [];

        $id = $this->currentUser->getUid(); //session eken user id eka gannawa activeUser.php file eke tiyenne
        $products = $this->gigModel->All($id);
        $props['products'] = $products;


        // $farmer = new Farmer();
        $notifications = $this->farmerModel->getnotifications();
        //echo json_encode($notifications);

        $props['notifications'] = $notifications;


        $this->set($props);
        $this->render("index");
    }
    function gigprogress()
    {

        $props = [];

        $id = $this->currentUser->getUid(); //session eken user id eka gannawa activeUser.php file eke tiyenne
        $products = $this->gigModel->Allgig($id);
        // var_dump($products);die();
        $props['products'] = $products;



        $notifications = $this->farmerModel->getnotifications();

        $props['notifications'] = $notifications;


        $this->set($props);
        $this->render("gigprogress");
    }

    function progressUpdate($params = [])
    {
        // require(ROOT . 'Models/gig.php');
        //require(ROOT . 'Models/farmer.php');
        // $gig = new $this->gigModel();
        $props = [];
        if (isset($params[0]) && !empty($params[0])) {
            $gigId = $params[0];
            $gig = $this->gigModel->fetchBy($gigId);
            $props['gig'] = $gig['data'];

            // $progs = $this->gigModel->viewPro($gigId);

            // foreach($progs as $pro){

            //      $progimgs = $this->gigModel->viewProimg($pro['progressId']);
            //      $props['progimgs'] = $progimgs;
            // }

            // if (!empty($progs)){
            //     $props['progs'] = $progs;
            // }


            $progress = $this->progressModel->fetchAllByGigId($gigId);
            // var_dump($progress); die();

            $props['progress'] = [];
            if ($progress['success']) {
                foreach ($progress['data'] as $pg) {
                    $progressImages = [];
                    $temp = $this->progressModel->fetchImagesByProgressId($pg['progressId']);
                    foreach ($temp['data'] as $key => $value) {
                        $progressImages[$key] = $value['image'];
                    }
                    $pg['images'] = $progressImages;
                    $props['progress'][] = $pg;
                }
            }
        }

        // $id = $this->currentUser->getUid(); //session eken user id eka gannawa activeUser.php file eke tiyenne
        // $products = $this->gigModel->fetchBy($id);
        // $props['products'] = $products;


        // $farmer = new Farmer();
        $notifications = $this->farmerModel->getnotifications();
        //echo json_encode($notifications);

        $props['notifications'] = $notifications;


        $this->set($props);
        $this->render("progressUpdate");
    }


    // view eke abc.php page eka
    function abc($params = [])
    {

        // url eke controller/action eken passe / ghala den values tika okkom $params kiyn array eke tyenne.
        var_dump($params[0]);

        //select==============================
        $id = Session::get('user')->getUid(); //session eken data ganne mehema
        $gigslist = $this->abcModel->getAllGigs($id); // model eke thiyana adala funciton eka call krla output eka
        $props['gigs'] = $gigslist; //view ekata yawann one data tika props kiyal hri d kiyala hri passkrann one
        $props['aaaa'] = 1233;

        //insert=======================

        // forms adunragann vidiya

        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){ // submit button ekak click krlad kiyla --> POST method
        // <input type="submit" name="form1">

        //     if(isset($_POST['form1'])){ // mona sumbit button eked click kale ---> mona form ekada
        //         echo "form 1";
        //     }

        // <button type="submit" name="form2">click</button>

        //     if(isset($_POST['form2'])){
        //         echo "form 2";
        //     }
        // }
        //=====================

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['form1'])) {

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
        $this->render('abc'); // file eke nama denn one () athule
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
        }
        

        
        $reqinvestors = $this->farmerModel->reqinvestors([
            'farmerId' => $this->currentUser->getUid(),
            'state' => STATUS::ACCEPTED
        ]);
        if ($reqinvestors['status']) {
            $props['reqinvestors'] = $reqinvestors['data'];
        }

        $investorlist = $this->farmerModel->investorlist([
            'farmerId' => $this->currentUser->getUid(),
            'status' => STATUS::PAID
        ]);
        if ($investorlist['status']) {
            $props['investorlists'] = $investorlist['data'];
        }
        
        // var_dump($reqinvestors); die();


        

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     if (isset($_POST['accept_investor'])) {
        //         $this->acceptInvestor($params[0]);
        //     }
        // }


        $this->set($props);
        $this->render('investors');
    }

    public function acceptInvestor($params = [])
    {
        if (isset($params[0]) && !empty($params[0])) {
            $requestId = $params[0];
            
            $res = $this->farmerModel->acceptInvestor([
                'requestId' => $requestId,
                'status' => STATUS::ACCEPTED
            ]);
            if ($res['status']) {
                $this->redirect('/farmer/investors');
            } else {
                $this->redirect('/error/somethingWentWrong');
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
        $props = [];
        $myTech = $this->farmerModel->getAcceptedTechByFarmer($this->currentUser->getUId());
        if ($myTech['status']) {
            $props['myTech'] = $myTech['data'];
        }

        $pendingTech = $this->farmerModel->getPendingTechByFarmer($this->currentUser->getUId());

        if ($pendingTech['status']) {
            $props['pendingTech'] = $pendingTech['data'];
        }

        $declinedTech = $this->farmerModel->getDeclinedTechByFarmer($this->currentUser->getUId());
        if ($declinedTech['status']) {
            $props['declinedTech'] = $declinedTech['data'];
        }

        foreach($myTech['data'] as $myTechone){

    
            $response = $this->farmerModel->monthpayTechassistant([
                'userId' => $myTechone['technicalAssistantId'],
                'farmerId' => $myTechone['farmerId']
            ]);

            if($response['status']){
                $props['dateDiff'] = $response['data']['dateDiff'];
            }else {
                $props['dateDiff'] = 30;
            }
        }  

        $this->set($props);
        $this->render('techassistant');
    }

    function techassistantPay($params = [])
    {
        $props = [];
        $techassistantId = $params[0];
        $id = $this->currentUser->getUid();

        $data = [
            'technicalAssistantId' => $techassistantId,
            'farmerId' => $id
        ];
        $techReqTwo=$this->farmerModel->getPayTechassistantsTwo($data);
        
        if($techReqTwo['status']){
            $props['offer_techassistant'] = $techReqTwo['data'];
        }


        $techReqOne=$this->farmerModel->getPayTechassistantsone($techassistantId);
        
        if($techReqOne['status']){
            $props['techassistant'] = $techReqOne['data'];
        }
     
        $this->set($props);
        $this->render('techassistantPay');
    }



    function techassistantAftertPay($params = [])
    {
        
        $props = [];
        $technicalAssistantId = $params[0];
        $id = $this->currentUser->getUid();

        $dataone = [
            'technicalAssistantId' => $technicalAssistantId,
            'farmerId' => $id
        ];
        $techReqTwo=$this->farmerModel->getPayTechassistantstwo($dataone);


        $data = [
            'incomeId' => new UID(PREFIX::PAYMENT),
            'userId' => $technicalAssistantId,
            'farmerId' => $id,
            'amount' =>  $techReqTwo['data']['offer']
        ];

        $this->farmerModel->afterPaytechassistant($data);
        // $this->set($props);
        $this->redirect('/farmer/techassistant');
    }


    function techassistantfirst($params = [])
    {

        if (!empty($params)) {
            $props['message'] = $params[0];
        }

        $location = new Input(GET, 'location');
        $search = new Input(GET, 'term');

        if ($search != "") {
            $techAssistants = $this->farmerModel->searchTechAssistant($search);
            if ($techAssistants['status']) {
                $props['techAssistants'] = $techAssistants['data'];
            }
        } else if ($location != "") {
            $techAssistants = $this->farmerModel->searchTechAssistantsByLocation($location);
            if ($techAssistants['status']) {
                $props['techAssistants'] = $techAssistants['data'];
            }
        } else {
            $techAssistants = $this->farmerModel->techAssistants();
            if ($techAssistants['status']) {
                $props['techAssistants'] = $techAssistants['data'];
            }
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


            $investor = $this->gigModel->fetchInvestorByGig($gigId);
            if ($investor['success']) {
                $props['investor'] = $investor['data'];
            }
            $this->set($props);
            $this->render('viewProgress');
        } else {

            $gigs = $this->gigModel->fetchAllByFarmer($this->currentUser->getUid());
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
                'userId' => $this->currentUser->getUid()
            ];


            $response = $this->progressModel->create($data);

            if ($response['success']) {

                try {
                    $images = $this->progressImageHandler->upload('images');
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $data = [
                                'progressId' => $progressId,
                                'image' => $image
                            ];
                            $res = $this->progressModel->saveProgressImage($data);
                            if (!$res['success']) {
                                $this->redirect('/farmer/newprogress/' . $res['error']);
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
                }
                $this->redirect('/farmer/progressUpdate/' . $gigId);
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



    // here
    //============================
    //============================
    //============================
    //============================
    //============================

    function agrologist($params = [])
    {
        $props = [];
        $id = $this->currentUser->getUid();

        $myagrologists = $this->farmerModel->getAcceptedAgrologistByFarmer($this->currentUser->getUId());
        if ($myagrologists['status']) {
            $props['myagrologists'] = $myagrologists['data'];
        }

        $pendingAgrologists = $this->farmerModel->getPendingAgrologistByFarmer($this->currentUser->getUId());
        if ($pendingAgrologists['status']) {
            $props['pendingAgrologists'] = $pendingAgrologists['data'];
        }

        $declinedAgrologists = $this->farmerModel->getDeclinedAgrologistByFarmer($this->currentUser->getUId());
        if ($declinedAgrologists['status']) {
            $props['declinedAgrologists'] = $declinedAgrologists['data'];
        }

        if(isset($params[0]) && !empty($params[0])){

            $agrologistId = $params[0];
            $id = $this->currentUser->getUid();
        
        $dataone = [
            'agrologistId' => $agrologistId,
            'farmerId' => $id
        ];

        $this->farmerModel->getPayAgrologistsUpdate($dataone);
        }


        // var_dump($myagrologists);

        foreach($myagrologists['data'] as $myagrologist){

            $response = $this->farmerModel->monthpayAgrologist([
                'agrologistId' => $myagrologist['agrologistId'],
                'farmerId' => $myagrologist['farmerId']
            ]);

            if($response['status']){
                $props['dateDiff'] = $response['data']['dateDiff'];
            }else {
                $props['dateDiff'] = 30;
            }
        }           
        //     $agrologistId = $myagrologist['agrologistId'];
        //     $id = $this->currentUser->getUid();
        
        // $datatwo = [
        //     'agrologistId' => $agrologistId,
        //     'farmerId' => $id
        // ];
        // meka array ekakat gnna.... $this->farmerModel->monthpayAgrologist($datatwo);

        


        // }



        $this->set($props);
        $this->render('agrologist');
    }



    function newAgrologist($params = [])
    {
        $props = [];

        if (!empty($params)) {
            $props['message'] = $params[0];
        }

        $location = new Input(GET, 'location');
        $search = new Input(GET, 'term');

        if ($search != "") {
            $agrologists = $this->farmerModel->searchAgrologists($search);
            if ($agrologists['status']) {
                $props['agrologists'] = $agrologists['data'];
            }
        } else if ($location != "") {
            $agrologists = $this->farmerModel->searchAgrologistsByLocation($location);
            if ($agrologists['status']) {
                $props['agrologists'] = $agrologists['data'];
            }
        } else {
            $agrologists = $this->farmerModel->agrologists();
            if ($agrologists['status']) {
                $props['agrologists'] = $agrologists['data'];
            }
        }

        $this->set($props);
        $this->render('newAgrologist');
    }


    function cancel_agrologist_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestId = new Input(POST, 'requestId');
            $response = $this->farmerModel->cancelAgrologistRequest($requestId);
            if ($response['status']) {

                if ($response['data']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = "Request cancelled successfully");
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = "Request cancelled failed");
                }
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = "Request cancelled failed");
            }
            Session::set(['cancel_agrologist_request_alert' => $alert]);
            $this->redirect('/farmer/agrologist');
        }
    }



// here
// ==================================
// ==================================
// ==================================
// ==================================

    function agrologistPay($params = [])
    {
        $props = [];
        $agrologistId = $params[0];
        $id = $this->currentUser->getUid();

        $data = [
            'agrologistId' => $agrologistId,
            'farmerId' => $id
        ];
        $agroReqTwo=$this->farmerModel->getPayAgrologistsTwo($data);
        
        if($agroReqTwo['status']){
            $props['offer_agrologist'] = $agroReqTwo['data'];
        }


        $agroReqOne=$this->farmerModel->getPayAgrologistsone($agrologistId);
        
        if($agroReqOne['status']){
            $props['agrologist'] = $agroReqOne['data'];
        }
     
        $this->set($props);
        $this->render('agrologistPay');
    }


    function agrologisAftertPay($params = [])
    {
        
        $props = [];
        $agrologistId = $params[0];
        $id = $this->currentUser->getUid();

        $dataone = [
            'agrologistId' => $agrologistId,
            'farmerId' => $id
        ];
        $agroReqTwo=$this->farmerModel->getPayAgrologistsTwo($dataone);


        $data = [
            'paymentId' => new UID(PREFIX::PAYMENT),
            'agrologistId' => $agrologistId,
            'farmerId' => $id,
            'Payment' =>  $agroReqTwo['data']['offer']
        ];



        $res = $this->farmerModel->afterPayAgrologists($data);
        // var_dump($res);
        // die();
        // $this->farmerModel->afterPayAgrologistsUpdate($dataone);
        // if($agroReqTwo['status']){
        //     $props['payed'] = $agroReqTwo['data'];
        // }
        


        // $this->set($props);
        $this->redirect('/farmer/agrologist');
    }



    function cancel_techassistant_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestId = new Input(POST, 'requestId');
            $response = $this->farmerModel->cancelTechRequest($requestId);
            if ($response['status']) {

                if ($response['data']) {
                    $alert = new Alert($type = 'success', $icon = "", $message = "Request cancelled successfully");
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = "Request cancelled failed");
                }
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = "Request cancelled failed");
            }
            Session::set(['cancel_techassitant_request_alert' => $alert]);
            $this->redirect('/farmer/techassistant');
        }
    }

    function agrologistprofile()
    {
        $this->render('agrologistprofile');
    }

    public function agrologist_request()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'requestId' => new UID(PREFIX::REQUEST),
                'agrologistId' => new Input(POST, 'agrologistId'),
                'farmerId' => $this->currentUser->getUid(),
                'offer' => new Input(POST, 'offer'),
                'timePeriod' => new Input(POST, 'timePeriod'),
                'message' => new Input(POST, 'message'),
            ];

            $agrRequestReview = [
                'reviewId' => new UID(PREFIX::REVIEW),
                'agrologistId' => new Input(POST, 'agrologistId'),
                'farmerId' => $this->currentUser->getUid()
            ];

            $response = $this->farmerModel->sendAgrologistRequest($data);
            $this->farmerModel->sendAgrologistRequestRating($agrRequestReview);

            if ($response['status']) {
                $alert = new Alert($type = 'success', $icon = "", $message = "Request sent successfully");
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = "Request sent failed");
            }
            Session::set(['agrologist_request_alert' => $alert]);
            $this->redirect('/farmer/agrologist');
        }
    }

    public function tech_assistant_request()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'requestId' => new UID(PREFIX::REQUEST),
                'technicalAssistantId' => new Input(POST, 'technicalAssistantId'),
                'farmerId' => $this->currentUser->getUid(),
                'offer' => new Input(POST, 'offer'),
                'message' => new Input(POST, 'message'),
            ];
            $response = $this->farmerModel->sendTechRequest($data);

            if ($response['status']) {
                $alert = new Alert($type = 'success', $icon = "", $message = "Request sent successfully");
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = "Request sent failed");
            }
            Session::set(['techassitant_request_alert' => $alert]);
            $this->redirect('/farmer/techassistant');
        }
    }

    function settings()
    {
        $this->render('settings');
    }

    public function deleteGig($params)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $gigId = new Input(POST, 'deletegig-confirm');

            $res = $this->farmerModel->delete_gig($gigId);
            if($res['success']){
                $this->redirect('/farmer/');
            }else {
                $this->redirect('/farmer/');
            }

        }
    }


    public function deposite_gig(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $gigId = new Input(POST, 'gigId');

            $res = $this->gigModel->markedAsDeposited($gigId);
            if($res['success']){
                $this->redirect('/farmer/');
            }else {
                $this->redirect('/farmer/');
            }

        }
    }

}
