<?php
class customerDashboardController extends Controller{
    function myorders(){
        require(ROOT . 'Models/customer_dashboard.php');
        $customer = new customer_dashboard();
        $d['customer'] = $customer->get_order_details();
        $this->set($d);
        $this->render("myorders");
    }

    function dashboard(){
        // require(ROOT . 'Models/customer_dashboard.php');
        // $customer = new customer_dashboard();
        // $d['customer'] = $customer->get_order_details();
        // $this->set($d);
        $this->ren   der("dashboard");
    }
}


?>