<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/govithena/") {
            $request->controller = "home";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            // die();
            $request->controller = $explode_url[0];

            if (empty($explode_url[1]) || str_starts_with($explode_url[1], '?')) {
                $request->action = "index";
                $request->setParams(array_slice($explode_url, 1));
            } else {
                $request->action = $explode_url[1];
                $request->setParams(array_slice($explode_url, 2));
            }
        }
    }
}
