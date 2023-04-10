<?php
require(ROOT . "Config/db.php");
require(ROOT . "Core/Constants.php");
require(ROOT . "Core/Sessions.php");
require(ROOT . "Core/Input.php");
require(ROOT . "Core/Uid.php");
require(ROOT . "Core/Model.php");
require(ROOT . "Core/Controller.php");
require(ROOT . "Core/ActiveUser.php");
require(ROOT . "Core/Image.php");
require(ROOT . "Core/ImageHandler.php");
require(ROOT . "Core/Mailer.php");

date_default_timezone_set('Asia/Kolkata');
Session::init();
