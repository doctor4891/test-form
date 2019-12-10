<?php


namespace helper;


/**
 * Class CSRF
 * @package helper
 * Working with CSRF protection
 */
class CSRF
{
    /**
     * @param bool $setCookie
     * @return false|string
     */
    public static function generate($setCookie = true):string
    {
        $csrf = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 20);
        if ($setCookie) Cookies::getInstance()->setCSRF($csrf);
        return $csrf;
    }

    /**
     * @param $csrf
     * @return bool
     */
    public static function verify($csrf):bool
    {
        if (Cookies::getInstance()->getParam('csrf') == $csrf) {
            return true;
        } else {
            return false;
        }
    }
}