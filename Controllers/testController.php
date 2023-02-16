<?php
class testController extends Controller
{


    public function index()
    {
        $rating = new Rating(RATE::GIG);
        echo $rating;
    }

    // public function index($param)
    // {

    //     $email = new Input(GET, 'email');
    //     $name = new Input(GET, 'name');

    //     echo "<h1>" . $name . "</h1>";
    //     echo "<h2>" . $email . "</h2>";
    //     echo "<h3>" . $param[1] . "</h3>";
    //     echo "<h3>" . $param[2] . "</h3>";

    //     $this->render('index');
    // }

    public function func($param)
    {
        print_r($param);
        $this->render('func');
    }
}
