<?php


namespace helper;


/**
 * Class Password
 * @package helper
 */
class Password
{
    /**
     * @param $pass
     * @return string
     */
    public static function encrypt($pass): string
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    /**
     * @param $pass
     * @param $hash
     * @return bool
     */
    public static function verify($pass, $hash): bool
    {
        return password_verify($pass, $hash);
    }
}