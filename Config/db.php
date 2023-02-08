<?php

class Database
{
    // private $db_host = "localhost";
    // private $db_user = "root";
    // private $db_password = "";
    // private $db_name = "govithena";
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {

        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=govithenadatabase", "root", "");
        }
        return self::$bdd;
    }
}
