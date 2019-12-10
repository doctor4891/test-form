<?php


namespace helper;


/**
 * Class Http
 * @package helper
 */
class Http
{
    /**
     * @param $url
     * Simple redirect
     */
    public static function redirect($url){
        header("Location: $url");
        die;
    }
}