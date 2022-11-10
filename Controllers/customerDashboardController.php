<?php
class customerDashboardController extends Controller
{

    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
    }

    function myorders()
    {
        require(ROOT . 'Models/customer_dashboard.php');
        $customer = new customer_dashboard();
        $d['customer'] = $customer->get_order_details();
        $this->set($d);
        $this->render("myorders");
    }

    function index()
    {
        // require(ROOT . 'Models/customer_dashboard.php');
        // $customer = new customer_dashboard();
        // $d['customer'] = $customer->get_order_details();
        // $this->set($d);
        $this->render("dashboard");
    }
}
