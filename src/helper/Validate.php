<?php


namespace helper;


use model\User;

/**
 * Class Validate
 * @package helper
 * Easiest Director-Builder class for form validation
 */
class Validate
{
    /**
     * @return bool
     * Validate register form
     */
    public static function registerForm()
    {
        if (
            !isset($_POST['login']) or
            !isset($_POST['password']) or
            !isset($_POST['email']) or
            !isset($_POST['csrf']) or
            !isset($_FILES['userpic']) or
            !self::validateBuilderRegisterForm()
        ) {
            Errors::$jar[] = 'AllFieldsRequired';
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private static function validateBuilderRegisterForm()
    {
        if (
            self::validateCSRF() and
            self::validateLogin() and
            self::validatePassword() and
            self::validateEmail() and
            !self::userExistByLogin() and
            !self::emailExist() and
            self::validateUserPicMimeType() and
            self::validateUserPicSize()
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     * validate login form
     */
    public static function loginForm()
    {
        if (
            !isset($_POST['login']) or
            !isset($_POST['password']) or
            !isset($_POST['csrf']) or
            !self::validateBuilderLoginForm()
        ) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private static function validateBuilderLoginForm()
    {
        if (
            self::validateCSRF() and
            self::validateLogin() and
            self::validatePassword() and
            self::userExistByLoginAndPassword()
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function validateCSRF()
    {
        if (CSRF::verify($_POST['csrf'])) {
            return true;
        } else {
            Errors::$jar[] = 'CsrfError';
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function validateLogin()
    {
        if (preg_match("~[a-z0-9]+~", $_POST['login'])) {
            return true;
        } else {
            Errors::$jar[] = 'BadLogin';
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function validatePassword()
    {
        if (preg_match("~[a-z0-9]+~", $_POST['login'])) {
            return true;
        } else {
            Errors::$jar[] = 'BadPassword';
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function validateEmail()
    {
        if (preg_match("~[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$~", $_POST['email'])) {
            return true;
        } else {
            Errors::$jar[] = 'BadEmail';
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function userExistByLogin()
    {
        if (User::getInstance()->ifUserExistByLogin($_POST['login'])) {
            Errors::$jar[] = 'UserExist';
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function emailExist()
    {
        if (User::getInstance()->ifEmailExist($_POST['email'])) {
            Errors::$jar[] = 'EmailExist';
            return true;
        } else return false;
    }

    /**
     * @return bool
     */
    private static function validateUserPicMimeType()
    {
        $isValid = in_array($_FILES['userpic']['type'], UserPic::$formats);
        if (!$isValid) {
            Errors::$jar[] = 'badMimeType';
        }
        return $isValid;
    }

    /**
     * @return bool
     */
    private static function validateUserPicSize()
    {
        if ($_FILES['userpic']['size'] < UserPic::$maxFileSize) {
            return true;
        } else {
            Errors::$jar[] = 'BigPic';
            return false;
        }
    }

    /**
     * @return bool
     */
    private static function userExistByLoginAndPassword()
    {
        $user = User::getInstance()->getUserByLogin($_POST['login']);
        $password = Password::verify($_POST['password'], $user['UserPassword']);
        if ($password) {
            return true;
        } else {
            Errors::$jar[] = 'UserNotExist';
            return false;
        }
    }
}