<?php

class searchController extends Controller
{
    private $searchModel;

    public function __construct()
    {

        $this->searchModel = $this->model('search');

        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }
    function index()
    {


        // if (!isset($_POST['search_text'])) {
        //     $this->redirect('/');
        // }
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $terms = new Input(GET, 'terms');

            if (isset($terms)) {
                $key = $terms;
                $data['terms'] = $key;
                $terms = array(
                    'key' => '%' . $key . '%'
                );

                if (isset($_POST['location']) && $_POST['location'] != "") {
                    $terms['location'] = $_POST['location'];
                }

                if (isset($_POST['category']) && $_POST['category'] != "") {
                    $terms['category'] = $_POST['category'];
                }

                if (isset($_POST['price_range']) && $_POST['price_range'] != "") {
                    $terms['price_range'] = $_POST['price_range'];
                }

                $res = $this->searchModel->searchGigs($terms);

                if (isset($res)) {
                    $data['searchResult'] = $res;
                    $this->set($data);
                }
            }
        }
        $this->render('index');
    }


    function a()
    {
        print_r($_GET);

        echo "<button type='button' onclick='window.history.go(-1)'>Back</button>";
    }
}
