<?php

class AlertHandler extends Alert
{
    private $alerts = array();

    public function __construct()
    {
        Session::set('alerts', $this->alerts);
    }

    public function create_new_alert($type, $message)
    {
        $alert = new Alert($type, $message);
        array_push($this->alerts, $alert);
        Session::set('alerts', $this->alerts);
    }

    public function show_alerts()
    {
        $alerts = Session::get('alerts');
        if (isset($alerts)) {
            foreach ($alerts as $alert) {
                $alert->show();
            }
        }
    }
}
