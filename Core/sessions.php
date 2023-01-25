<?php

class Session
{

    public static function init()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) return $_SESSION[$key];
        return null;
    }

    public static function unset($keys)
    {
        foreach ($keys as $key) {
            unset($_SESSION[$key]);
        }
    }

    public static function isLoggedIn()
    {
        if (self::get('user') !== null) {
            return true;
        } else {
            return false;
        }
    }

    public static function destroy()
    {
        session_destroy();
    }
}
