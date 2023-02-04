<?php
class farmerController extends Controller
{

    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/');
        }
    }

    //     function myorders()
    //     {
    //         require(ROOT . 'Models/customer.php');
    //         $customer = new Customer();
    //         $d['customer'] = $customer->get_order_details();
    //         $this->set($d);
    //         $this->render("myorders");
    //     }

    // // ------------------------------------------
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
            $farmerId = Session::get('uid');

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

        $gig = new Gig();
        $id = Session::get('uid');

        $products = $gig->All($id);


        $d['products'] = $products;
        $this->set($d);
        $this->render("index");
    }


    function investors (){
        $this->render('investors');
    }

    function techassistant(){
        $this->render('techassistant');
    }

    function techassistantfirst(){
        $this->render('techassistantfirst');
    }


}
