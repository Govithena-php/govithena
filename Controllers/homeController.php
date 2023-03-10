<?php
class homeController extends Controller
{
    private $currentUser;
    private $gigModal;
    public function __construct()
    {
        $this->currentUser = Session::get('user');

        require(ROOT . 'Models/gig.php');
        $this->gigModal = new Gig();

        // if (!Session::isLoggedIn()) {
        //     $this->redirect('/auth/signin');
        // }

        // if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
        //     $this->redirect('/error/dontHaveAccess');
        // }
    }
    function index()
    {
        $response = $this->gigModal->fetchAll($order = "DESC", $limit = 8);

        if ($response['status']) {
            $props['gigs'] = $response['data'];
        } else {
            $props['gigs'] = null;
        }

        $this->set($props);
        $this->render("index");
    }

    public function contact()
    {
        $this->render("contact");
    }

    public function about()
    {
        $this->render("about");
    }
}
