<?php
class customerController extends Controller
{

    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }

    function myorders()
    {
        require(ROOT . 'Models/customer.php');
        $customer = new Customer();
        $d['customer'] = $customer->get_order_details();
        $this->set($d);
        $this->render("myorders");
    }

    function createOrder() {
        require(ROOT . 'Models/customer.php');
        $customer = new Customer();
        
        //===========
    }

    function productList()
    {
        require(ROOT . 'Models/customer.php');
        $customer = new Customer();
        //$d['customer'] = $customer->get_product_list();
        //$this->set($d);
        $this->render("productList");
    }

    function index()
    {
        $this->render("index");
    }
}
