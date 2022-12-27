<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"])); // /govithena/
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"])); // C:/xampp/htdocs/govithena/
define('URLROOT', 'http://localhost/govithena'); // http://localhost/govithena

define('COMPONENTS', ROOT . 'Views/components/'); // C:/xampp/htdocs/govithena/Views/components/
define('IMAGES', URLROOT . '/Webroot/images/'); // http://localhost/govithena/Webroot/images/
define('UPLOADS', URLROOT . '/Webroot/uploads/'); // http://localhost/govithena/Webroot/uploads/
define('CSS', URLROOT . '/Webroot/css/'); // http://localhost/govithena/Webroot/css/
define('JS', URLROOT . '/Webroot/js/'); // http://localhost/govithena/Webroot/js/

define('POST', $_POST);
define('GET', $_GET);

require(ROOT . 'Config/core.php');
require(ROOT . 'dispatcher.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');


$dispatch = new Dispatcher();
$dispatch->dispatch();
