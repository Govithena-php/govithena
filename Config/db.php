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
            // self::$bdd = new PDO("mysql:host=localhost;dbname=govithenadatabase", "root", "");
            self::$bdd = new PDO("mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_c3eec8327e81f84", "b6ccb3c6eba504", "6d1b0706");
        }
        return self::$bdd;
    }
}
