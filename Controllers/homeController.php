<?php
class homeController extends Controller
{
    public function __construct()
    {
        // if (!isLoggedIn()) {
        //     $this->redirect('/');
        // }
    }
    function index()
    {
        $this->render("index");
    }
}
