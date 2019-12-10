<?php


namespace helper;


/**
 * Class Cookies
 * @package helper
 */
class Cookies
{
    /**
     * @var
     */
    private static $_instance;

    //singleton Cookies

    /**
     * Cookies constructor.
     */
    private function __construct()
    {
        session_start();
    }

    /**
     * @return Cookies
     */
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param $csrf
     */
    public function setCSRF($csrf)
    {
        setcookie('csrf', $csrf, time() + 600, "/");
    }

    /**
     * set user cookie
     * @return false|string
     */
    public function setUser():string
    {
        $cookie = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 20);
        setcookie('user', $cookie, time() + 3600);
        return $cookie;
    }

    /**
     * @param $paramName
     */
    public function removeParam($paramName)
    {
        setcookie($paramName, time() - 3600);
    }

    /**
     * @param $paramName
     * @return bool|mixed
     */
    public function getParam($paramName)
    {
        return $_COOKIE[$paramName] ?? false;
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }
}