<?php

class errorController extends Controller
{
    public function index()
    {
        $this->render('error');
    }

    public function accessDenied()
    {
        $this->render('accessDenied');
    }

    public function somethingWentWrong()
    {
        $this->render('somethingWentWrong');
    }
}
