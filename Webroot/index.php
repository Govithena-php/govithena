<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"])); // /govithena/
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"])); // C:/xampp/htdocs/govithena/
define('URLROOT', 'http://localhost'); // http://localhost/govithena

define('COMPONENTS', ROOT . 'Views/components/'); // C:/xampp/htdocs/govithena/Views/components/
define('IMAGES', URLROOT . '/Webroot/images/'); // http://localhost/govithena/Webroot/images/
define('UPLOADS', URLROOT . '/Webroot/Uploads/'); // http://localhost/govithena/Webroot/uploads/
define('UPLOADS3', URLROOT . '/Webroot/Uploads3/'); // http://localhost/govithena/Webroot/uploads3/
define('CSS', URLROOT . '/Webroot/css/'); // http://localhost/govithena/Webroot/css/
define('JS', URLROOT . '/Webroot/js/'); // http://localhost/govithena/Webroot/js/

define('POST', 'POST');
define('GET', 'GET');

require(ROOT . 'Config/core.php');
require(ROOT . 'dispatcher.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');


$dispatch = new Dispatcher();
$dispatch->dispatch();
