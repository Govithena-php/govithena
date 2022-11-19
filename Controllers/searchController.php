<?php

class searchController extends Controller
{

    function index()
    {
        require(ROOT . 'Models/search.php');
        $s = new Search();
        if (isset($_POST['search_text'])) {
            $key = $_POST['search_text'];

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

            $res = $s->search($terms);
            if (isset($res)) {
                $data['search'] = $res;
                $this->set($data);
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
