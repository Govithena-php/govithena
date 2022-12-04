<?php


class requestController extends Controller
{

    function farmer()
    {
        if (isset($_POST['offer'])) {
            echo $_POST['offer'];
        }
        // $this->render('farmer');
    }
}
