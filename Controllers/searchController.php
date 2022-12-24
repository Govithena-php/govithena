<?php

class searchController extends Controller
{
    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }
    function index()
    {

        if (!isset($_POST['search_text'])) {
            $this->redirect('/');
        }
        require(ROOT . 'Models/search.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {


            $s = new Search();

            // $key = "rice";

            if (isset($_POST['search_text'])) {
                $key = $_POST['search_text'];

                $terms = array(
                    'key' => '%' . $key . '%'
                );

                if (isset($_POST['locatio   n']) && $_POST['location'] != "") {
                    $terms['location'] = $_POST['location'];
                }

                if (isset($_POST['category']) && $_POST['category'] != "") {
                    $terms['category'] = $_POST['category'];
                }

                if (isset($_POST['price_range']) && $_POST['price_range'] != "") {
                    $terms['price_range'] = $_POST['price_range'];
                }

                $res = $s->searchGigs($terms);
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
