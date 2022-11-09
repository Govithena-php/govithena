<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
define('URLROOT', 'http://localhost/govithena');

require(ROOT . 'Config/core.php');

require(ROOT . 'dispatcher.php');
require(ROOT . 'router.php');
require(ROOT . 'request.php');


$dispatch = new Dispatcher();
$dispatch->dispatch();
