<?php

class techController extends Controller
{

    public function index()
    {
        $this->render('index');
    }

    public function farmers(){
        $this->render('farmers');
    }

    public function requests(){
        $this->render('requests');
    }

    public function farmerdetails(){
        $this->render('farmerdetails');
    }

    public function myaccount(){
        $this->render('myaccount');
    }

    public function dashboard(){
        $this->render('dashboard');
    }
  

}