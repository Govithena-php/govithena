<?php
class homeController extends Controller
{
    public function __construct()
    {
    }
    function index()
    {
        $this->render("index");
    }
}
