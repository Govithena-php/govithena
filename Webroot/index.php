<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

define('URLROOT', 'http://localhost/govithena');

define('COMPONENTS', ROOT . 'Views/components/');
define('IMAGES', URLROOT . '/Webroot/images');
define('CSS', URLROOT . '/Webroot/css');
define('JS', URLROOT . '/Webroot/js');

require(ROOT . 'Config/core.php');

require(ROOT . 'dispatcher.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');


$dispatch = new Dispatcher();
$dispatch->dispatch();
