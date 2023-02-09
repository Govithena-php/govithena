<?php

class profileController extends Controller
{
    private $currentUser;
    private $userModel;
    private $gigModel;

    public function __construct()
    {
        $this->currentUser = Session::get('user');
        $this->userModel = $this->model('user');
        $this->gigModel = $this->model('gig');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }
    }

    public function index($params)
    {

        if (isset($params) && !empty($params[0])) {
            list($uid) = $params;

            $user = $this->userModel->getUserById($uid);
            if ($user['status']) {
                $props['user'] = $user['data'];

                $gigs = $this->gigModel->ALL($uid);

                if ($gigs) {
                    $props['gigs'] = $gigs;
                } else {
                    $props['gigs'] = [];
                }

                $this->set($props);
                $this->render('index');
            } else {
                $this->redirect('/error');
            }
        } else {
            $this->redirect('/error');
        }
    }
}
